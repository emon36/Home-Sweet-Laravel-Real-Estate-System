@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item" aria-current="page"> <a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item " aria-current="page"> <a href="{{route('admin.expenditures')}}">Manage Expenses</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Expense</li>
        </ol>
    </nav>
    <div class="container-fluid mt-5">

    <div class="row mt-3">

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body mb-5">
                    <h4 class="header-title mb-3">Project Information</h4>

                    <h5>Project Name: {{$expense->projects->project_name}} </h5>

                    <abbr title="Location">Location:</abbr> {{$expense->projects->location}} <br>

                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-2">Expense Information</h4>

                    <ul class="list-unstyled mb-0">
                        <li>
                            <p class="mb-2"><span class="fw-bold me-2">Details:</span>{{$expense->description}} </p>
                            <p class="mb-2"><span class="fw-bold me-2">Date:</span>{{$expense->date}} </p>
                            <p class="mb-2"><span class="fw-bold me-2">Amount:</span>{{$expense->amount}} </p>
                            <p class="mb-2"><span class="fw-bold me-2">Submitted by:</span>{{$expense->submitted_by}} </p>
                            @if($expense->image != null)
                                <a href="{{asset('/storage/expense/'.$expense->image)}}"download>Download Document</a>
                            @else
                            @endif

                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
