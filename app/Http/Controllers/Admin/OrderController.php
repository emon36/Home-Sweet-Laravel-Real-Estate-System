<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use PDF;

class OrderController extends Controller
{
    public function index()
    {

        return view('admin.order.index');
    }


    public function getOrders(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('orders')
                ->join('users','orders.user_id','=','users.id')
                ->join('projects','orders.project_id','=','projects.id')
                ->join('properties','orders.property_id','=','properties.id')
                ->select('orders.*','users.name','users.phone','projects.project_name','properties.property_name')
                ->latest();
            return DataTables::of($data)
                ->addColumn('payment_status', function ($data) {
                    if ($data->payment_status == 1) {
                        return '<span class="p-2 badge badge-success-lighten">Paid</span>';
                    } else {
                        return '<span class="p-2 badge badge-danger-lighten">Due</span>';
                    }
                })
                ->addColumn('order_status', function ($data) {
                    if ($data->order_status == 1) {
                        return '<span class="p-2 badge badge-info-lighten">Running</span>';
                    } elseif($data->order_status == 2) {
                        return '<span class="p-2 badge badge-success-lighten">Completed</span>';
                    }else{
                        return '<span class="p-2 badge badge-danger-lighten">Canceled</span>';
                    }
                })
                ->addColumn('action', function($row){
                    $btn = '<a href ="'.route('admin.order.view',$row->id).'" title="view" data-toggle="tooltip"  data-placement="bottom" class="btn btn-success btn-sm"><i class="mdi mdi-eye"></i> </a> ';
                    $btn .= '<a href="'.route('admin.order.invoice',$row->id).'"  title="download invoice" data-toggle="tooltip"  data-placement="bottom" class="edit btn btn-primary btn-sm"><i class=" mdi mdi-download"></i></a> ';
                    $btn .= '<a href="'.route('admin.order.confirmation',$row->id).'"  title="send confirmation" data-toggle="tooltip"  data-placement="bottom" class="edit btn btn-primary btn-sm"><i class="mdi mdi-message"></i></a> ';
                    $btn .= ' <a href="javascript:void(0)"  data-id="'.$row->id.'" title="delete" data-toggle="tooltip"  data-placement="bottom" class="btn btn-danger btn-sm deleteOrder"><i class="mdi mdi-delete"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','payment_status','order_status'])
                ->toJson();
        }

    }

    public function show($id)
    {
        $order = Order::with('users','projects','properties')->find($id);

        return view('admin.order.show',['order'=>$order]);
    }

    public function create()
    {
        $customers = User::where('role_id',2)->get();
        $projects = Project::where('status',1)->get();
        return view('admin.order.create',['customers'=>$customers,'projects'=>$projects]);
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'customer' => 'required',
            'address' => 'required',
            'project'=> 'required',
            'property'=> 'required',
            'booking_amount' => 'required',
            'date' => 'required|string'
        ]);

        $property = Property::find($request->property);

        $order = new Order();

        $order->user_id = $request->customer;
        $order->customer_address = $request->address;
        $order->project_id = $request->project;
        $order->property_id = $request->property;
        $order->price = $property->price;
        $order->booking_amount = $request->booking_amount;
        $order->due = $property->price - $request->booking_amount;
        $order->paid_amount = $request->booking_amount;
        $order->submitted_by = auth()->user()->name;
        $order->order_code = mt_rand(100000,999999);
        $order->order_date = date("d-m-Y",strtotime($request->date));
        $order->save();

        Property::where('id',$request->property)->update(array( 'status'=> 0));


        return redirect()->route('admin.orders')->with('success','Order Placed Succesfully');

    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $order = Order::find($id);
        $order->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Order Deleted Successfully.'
        ]);

    }

    public function getProperty($project_id)
    {
        $property = Property::where('project_id',$project_id)->where('status',1)->where('approved_status',1)->get();

        return json_encode($property);
    }

    public function getOrderInvoice($id)
    {
        $order = Order::where('id',$id)->with('users','projects','properties')->get();

        $pdf = PDF::loadView('admin.order.invoice',['order'=>$order]);

        foreach ($order as $row)
        {
            $file_name = $row->order_code;
        }

        return $pdf->download($file_name.'.pdf');
    }

    public function changeOrderStatus(Request $request,$id)
    {
        if ($request->order_status == 1)
        {
            DB::table('orders')->where('id',$id)->update(['order_status'=>1]);
        }
        elseif ($request->order_status == 2)
        {
            DB::table('orders')->where('id',$id)->update(['order_status'=>2]);
        }
        else{
            DB::table('orders')->where('id',$id)->update(['order_status'=>3]);
        }
        return redirect()->back()->with('success', 'Order Status has been updated');

    }
    public function changePaymentStatus(Request $request,$id)
    {
        if ($request->payment_status == 1)
        {
            DB::table('orders')->where('id',$id)->update(['payment_status'=>1]);
        }
        else{
            DB::table('orders')->where('id',$id)->update(['payment_status'=>0]);
        }
        return redirect()->back()->with('success', 'Order Payment Status has been Updated');

    }

    public function active()
    {
        return view('admin.order.active_order');
    }

    public function activeOrders(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('orders')
                ->join('users','orders.user_id','=','users.id')
                ->join('projects','orders.project_id','=','projects.id')
                ->join('properties','orders.property_id','=','properties.id')
                ->where('order_status',1)
                ->where('payment_status',0)
                ->select('orders.*','users.name','users.phone','projects.project_name','properties.property_name')
                ->latest();
            return DataTables::of($data)
                ->addColumn('payment_status', function ($data) {
                    if ($data->payment_status == 1) {
                        return '<span class="p-2 badge badge-success-lighten">Paid</span>';
                    } else {
                        return '<span class="p-2 badge badge-info-lighten">Due</span>';
                    }
                })

                ->addColumn('action', function($row){
                    $btn = '<a href ="'.route('admin.transaction.create',$row->id).'" title="view" data-toggle="tooltip"  data-placement="bottom" class="btn btn-success btn-sm">Add Payment</a> ';
                    return $btn;
                })
                ->rawColumns(['action','payment_status'])
                ->toJson();
        }
    }


    public function sendConfirmation($id)
    {
        $order = Order::where('id',$id)->with('users')->get();

        $url = "http://66.45.237.70/api.php";
        $number = '';
        $text = '';
        foreach ($order as $row)
        {
            $number = $row->users->phone;
            $text = "Dear Customer, your flat booking is confirmed and you have paid-" .$row->booking_amount." Tk for the booking; Order ID is-".$row->order_code.". Regards Yeasin City Housing Limited";

        }
        $data= array(
            'username'=>"01974738512",
            'password'=>"TZFSHM69",
            'number'=>"$number",
            'message'=>"$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendstatus = $p[0];

        return redirect()->back()->with('success','Message sent Succesfully ');

    }


}
