@extends('admin.layouts.master')
@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item" aria-current="page"> <a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item " aria-current="page"> <a href="{{route('admin.contacts')}}">Manage Contacts</a></li>
            <li class="breadcrumb-item active" aria-current="page">View Contact</li>
        </ol>
    </nav>
    <div class="container-fluid mt-5">


        <div class="row">

            <div class="col-lg-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="header-title mb-2">Details</h4>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <p class="mb-2"><span class="fw-bold me-2">Name:</span>{{$contact->name}} </p>
                                <p class="mb-2"><span class="fw-bold me-2">Phone:</span>{{$contact->phone}} </p>
                                <p class="mb-2"><span class="fw-bold me-2">Email:</span>{{$contact->email}} </p>
                                <p class="mb-2"><span class="fw-bold me-2">Subject:</span>{{$contact->subject}}</p>
                                <p class="mb-2"><span class="fw-bold me-2">Message:</span>{{$contact->message}}</p>
                            </li>
                        </ul>



                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">

            <div class="col-sm-4 col-md-4">
                <form method="POST" action="{{route('admin.contact.status',$contact->id)}}">
                    @csrf
                    <label for="status-select" class="col-form-label">Status*</label>
                    <div class="input-group">
                        <select class="form-select" id="inputGroupSelect04" name="status" aria-label="Example select with button addon">
                            @if ($contact->is_viewed == 0) {
                            <option value="0" selected>Unread</option>
                            <option value="1">Read</option>
                            @else
                                <option value="0">Unread</option>
                                <option value="1"selected>Read</option>
                            @endif
                        </select>
                        <button class="btn btn-outline-secondary" type="sumbit">Sumbit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


@endsection

