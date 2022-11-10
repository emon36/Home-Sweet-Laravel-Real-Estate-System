@extends('admin.layouts.master')

@section('content')

    <div class="row">

        <div class="col-10 mx-auto mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">Add Expense</div>
                    <form class="form-horizontal" action="{{route('admin.expense.store')}}"  method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="inputRole" class="col-3 col-form-label">Project Name</label>
                            <div class="col-9">
                                <select id="projectSelect"  class="@error('project') is-invalid @enderror" name="project">
                                    <option value="" >Select Project</option>
                                    @foreach($projects as $project)
                                        <option value="{{$project->id}}">{{$project->project_name}}</option>
                                    @endForeach
                                </select>
                                @error('project')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputRole" class="col-3 col-form-label">Description</label>
                            <div class="col-9">
                                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" />
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputRole" class="col-3 col-form-label">Amount</label>
                            <div class="col-9">
                                <input type="number"  class="form-control @error('amount') is-invalid @enderror" name="amount"  />
                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputFile" class="col-3 col-form-label">Image</label>
                            <div class="col-9">
                                <input type="file" id="example-fileinput" class="form-control" name="image">
                            </div>

                        </div>

                        <div class="row mb-3">
                            <label for="inputRole" class="col-3 col-form-label">Date</label>
                            <div class="col-4">
                                <input type="date" id="example-date"  class="form-control @error('date') is-invalid @enderror" name="date" />
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>

                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('scripts')

    <script>



        $(document).ready(function(){

            $('#projectSelect').select2();

        });


    </script>

@endsection
