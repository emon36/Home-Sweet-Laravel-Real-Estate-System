@extends('admin.layouts.master')

@section('content')

    <div class="row">

        <div class="col-10 mx-auto mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">Create Project</div>
                    <form class="form-horizontal" action="{{route('admin.project.store')}}"  method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label">Project Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control  @error('project_name') is-invalid @enderror" id="inputName"  placeholder="Enter project Name" name="project_name" value="{{ old('project_name') }}">
                                @error('project_name')
                                <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-3 col-form-label">Short Description</label>
                            <div class="col-9">
                                <textarea id="summernote" cols="3" name="short_description" class="form-control  @error('short_description') is-invalid @enderror" ></textarea>
                                @error('short_description')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-3 col-form-label">Long Description</label>
                            <div class="col-9">
                                <textarea id="summernote1" cols="5" name="long_description" class="form-control @error('long_description') is-invalid @enderror" ></textarea>
                                @error('long_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                     </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputFile" class="col-3 col-form-label">Image</label>
                            <div class="col-9">
                                <div class="fallback">
                                    <input name="images[]" type="file" class="form-control" multiple />
                                    @error('images')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>

                           </div>

                            </div>

                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label">City</label>
                            <div class="col-9">
                                <input type="text" class="form-control  @error('city') is-invalid @enderror" id="inputName"  placeholder="Enter City Name" name="city" value="{{ old('city') }}">
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label">Location</label>
                            <div class="col-9">
                                <input type="text" class="form-control  @error('location') is-invalid @enderror" id="inputName"  placeholder="Enter Project Location" name="location" value="{{ old('location') }}">
                                @error('location')
                                <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label">Number Of Blocks</label>
                            <div class="col-9">
                                <input type="number" class="form-control  @error('number_of_blocks') is-invalid @enderror" id="inputName"  placeholder="Enter Number of Blocks" name="number_of_blocks" value="{{ old('number_of_blocks') }}">
                                @error('number_of_blocks')
                                <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label">Number Of Floors</label>
                            <div class="col-9">
                                <input type="number" class="form-control  @error('number_of_floors') is-invalid @enderror" id="inputName"  placeholder="Enter Number of Floors" name="number_of_floors" value="{{ old('number_of_floors') }}">
                                @error('number_of_floors')
                                <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label">Number Of Flats</label>
                            <div class="col-9">
                                <input type="number" class="form-control  @error('number_of_flats') is-invalid @enderror" id="inputName"  placeholder="Enter Number of Flats" name="number_of_flats" value="{{ old('number_of_flats') }}">
                                @error('number_of_flats')
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
