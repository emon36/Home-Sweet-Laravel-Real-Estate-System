<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Expenditure;
use App\Models\Project;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{

    public function index()
    {
        $customers =  User::where('role_id',2)->count();
        $sellers =  User::where('role_id',3)->count();
        $orders = Order::where('order_status',1)->get();
        $properties = Property::count();
        $revenue = Project::with('orders')->get();
        $expenses = Project::with('projectWiseExpense')->get();
        $expense = Expenditure::where('status',0)->select('amount')->get();
        $employee = Employee::all();
        return view('admin.dashboard',
            ['customers'=>$customers,
            'orders'=>$orders,
            'sellers'=>$sellers,
            'properties'=>$properties,
            'revenue'=>$revenue,
            'expenses'=>$expenses,
            'expense'=>$expense,
            'employee'=>$employee]);
    }
}
