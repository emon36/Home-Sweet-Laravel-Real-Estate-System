<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Project;
use App\Models\Property;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use PDF;
class TransactionController extends Controller
{
    public function index()
    {

        return view('admin.transaction.index');
    }


    public function getTransactions(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('transactions')
                ->join('orders', 'transactions.order_id','=', 'orders.id')
                ->join('users', 'transactions.user_id', '=','users.id')
                ->join('properties', 'transactions.property_id', '=','properties.id')
                ->select('transactions.*','orders.order_code', 'users.name','properties.property_name')
                ->latest();
            return DataTables::of($data)
                ->addColumn('action', function($row){
                    $btn = '<a href ="'.route('admin.transaction.show',$row->id).'" title="view" data-toggle="tooltip"  data-placement="bottom" class="btn btn-success btn-sm"><i class="mdi mdi-eye"></i> </a> ';
                    $btn .= '<a href="'.route('admin.payment.invoice',$row->id).'"  title="download invoice" data-toggle="tooltip"  data-placement="bottom" class="edit btn btn-primary btn-sm"><i class=" mdi mdi-download"></i></a> ';
                    $btn .= '<a href="'.route('admin.payment.confirmation',$row->id).'"  title="send confirmation" data-toggle="tooltip"  data-placement="bottom" class="edit btn btn-primary btn-sm"><i class=" mdi mdi-message "></i></a> ';
                    $btn .= ' <a href="javascript:void(0)" data-id="'.$row->id.'"   title="delete" data-toggle="tooltip"  data-placement="bottom" class="btn btn-danger btn-sm deleteTransaction"><i class="mdi mdi-delete"></i></a>';
                    return $btn;
                })

                ->rawColumns(['action'])
                ->toJson();
        }

    }


    public function show($id)
    {
        $transaction = Transaction::with('users','properties','orders')->find($id);

        return view('admin.transaction.show',['transaction'=>$transaction]);
    }

    public function create($id)
    {
        $order = Order::find($id);
        return view('admin.transaction.create',['order'=>$order]);
    }

    public function store(Request $request)
    {

        $request->validate([

            'order_id' => 'required',
            'user_id' => 'required',
            'property_id' => 'required',
            'description' => 'required|string',
            'pay_amount' => 'required|numeric',
            'payment_date' => 'required|string',
            'image.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg',
        ]);

        $transaction = new Transaction();

        $transaction->order_id = $request->order_id;
        $transaction->user_id = $request->user_id;
        $transaction->submitted_by = auth()->user()->name;
        $transaction->property_id = $request->property_id;
        $transaction->description = $request->description;
        $transaction->pay_amount = $request->pay_amount;
        $transaction->payment_date = date("d-m-Y",strtotime($request->payment_date));
        $transaction->transaction_code =  mt_rand(100000,999999);
        $transaction->save();

        $order = Order::find($request->order_id);
        $order->paid_amount += $request->pay_amount;
        $order->due = $order->price - $order->paid_amount;
        $order->update();

        return redirect()->route('admin.transactions')->with('success','Payment added Succesfully');

    }

    public function paymentInvoice($id)
    {
        $transaction = Transaction::where('id',$id)->with('users','properties','orders')->get();
        $pdf = PDF::loadView('admin.transaction.invoice',['transaction'=>$transaction]);

        foreach ($transaction as $row)
        {
            $file_name = $row->transaction_code;
        }
        return $pdf->download($file_name.'.pdf');

    }

    public  function paymentConfirmation($id)
    {
        $transaction = Transaction::where('id',$id)->with('users')->get();

        $url = "http://66.45.237.70/api.php";
        $number = '';
        $text = '';
        foreach ($transaction as $row)
        {
            $number = $row->users->phone;
            $text = "Dear Customer,your payment has been received and you have paid" .$row->pay_amount." Tk to Yeasin City Housing Limited; Your Transaction code is-".$row->transaction_code;

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

        return redirect()->back()->with('success','Message sent Succesfully');
    }


    public function delete($id)
    {
        $transactions = Transaction::where('id',$id)->with('orders')->get();

        foreach ($transactions as $row)
        {
             $new_paid_amount = $row->orders->paid_amount - $row->pay_amount;
             $new_due_amount = $row->orders->price - $new_paid_amount;

           DB::table('orders')->where('id',$row->order_id)->update(['paid_amount'=>$new_paid_amount,'due'=>$new_due_amount]);
        }

        $payment = Transaction::find($id);

        $payment->delete();

        return response()->json([
            'status'=>200,
            'message'=>'Payment Deleted Successfully.'
        ]);


    }



}
