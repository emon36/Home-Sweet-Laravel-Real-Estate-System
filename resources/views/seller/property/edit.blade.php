@extends('seller.layouts.master')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item" aria-current="page"> <a href="{{route('seller.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item " aria-current="page"> <a href="{{route('seller.properties')}}">Manage Properties</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Property</li>
        </ol>
    </nav>

    <div class="row">

        <div class="col-12  mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">Create Property</div>
                    <form class="form-horizontal" action="{{route('seller.property.update',$property->id)}}"  method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="inputRole" class="col-3 col-form-label">Property Status</label>
                            <div class="col-9">
                                <select id="roleSelect"  class="form-control @error('status') is-invalid @enderror" name="status">
                                    <option value="1" {{$property->status == 1 ? 'selected': ''}} >Selling</option>
                                    <option value="0" {{$property->status == 0 ? 'selected': ''}}>Sold</option>

                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputRole" class="col-3 col-form-label">Project Name</label>
                            <div class="col-9">
                                <select id="roleSelect"  class="form-control select2  @error('project') is-invalid @enderror" name="project" data-toggle="select2">
                                    <option value="" >Select Project</option>
                                    @foreach($projects as $project)
                                        <option value="{{$project->id}}" {{$project->id == $property->project_id ? 'selected': ''}}>{{$project->project_name}}</option>
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
                            <label for="inputName" class="col-3 col-form-label">Property Name</label>
                            <div class="col-9">
                                <input type="text" class="form-control  @error('property_name') is-invalid @enderror" id="inputName"  placeholder="Enter property Name" name="property_name" value="{{ $property->property_name }}">
                                @error('property_name')
                                <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-3 col-form-label">Short Description</label>
                            <div class="col-9">
                                <textarea id="summernote" cols="3" name="short_description" class="form-control  @error('short_description') is-invalid @enderror" >{{$property->short_description}}</textarea>
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
                                <textarea id="summernote1" cols="5" name="long_description" class="form-control @error('long_description') is-invalid @enderror" >{{$property->long_description}}</textarea>
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
                                    <input name="images[]" type="file" name="images" class="form-control" multiple />
                                    @error('images')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>

                            </div>

                        </div>

                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label"></label>
                            <div class="col-9">
                                @php
                                    $x = explode (",", $property->images);
                                @endphp
                                @foreach($x as $key => $val)
                                    <img class="mb-2" src="{{ asset('uploads/propertyImages/'.$val) }}" height="100" alt="no image found">
                                @endforeach
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label">City</label>
                            <div class="col-9">
                                <input type="text" class="form-control  @error('city') is-invalid @enderror" id="inputName"  placeholder="Enter City Name" name="city" value="{{ $property->city }}">
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
                                <input type="text" class="form-control  @error('location') is-invalid @enderror" id="inputName"  placeholder="Enter Property Location" name="location" value="{{ $property->location }}">
                                @error('location')
                                <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label">Number Of Bedrooms</label>
                            <div class="col-9">
                                <input type="number" class="form-control  @error('number_of_bedrooms') is-invalid @enderror" id="inputName"  placeholder="Enter Number of Bedrooms" name="number_of_bedrooms" value="{{ $property->number_of_bedrooms }}">
                                @error('number_of_bedrooms')
                                <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label">Number Of Bathrooms</label>
                            <div class="col-9">
                                <input type="number" class="form-control  @error('number_of_bathrooms') is-invalid @enderror" id="inputName"  placeholder="Enter Number of Bathrooms" name="number_of_bathrooms" value="{{ $property->number_of_bathrooms }}">
                                @error('number_of_bathrooms')
                                <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label">Floor Number</label>
                            <div class="col-9">
                                <input type="number" class="form-control  @error('floor_number') is-invalid @enderror" id="inputName"  placeholder="Enter Floor Number" name="floor_number" value="{{ $property->floor_number }}">
                                @error('floor_number')
                                <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label">Property Size</label>
                            <div class="col-9">
                                <input type="number" class="form-control  @error('size') is-invalid @enderror" id="inputName"  placeholder="Enter Property Size in Square Meter " name="size" value="{{ $property->size }}">
                                @error('size')
                                <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label">Property Price</label>
                            <div class="col-9">
                                <input type="number" class="form-control  @error('price') is-invalid @enderror" id="inputName"  placeholder="Enter Property Price" name="price" value="{{ $property->price}}">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputName" class="col-3 col-form-label">Features</label>
                            <div class="col-9">
                                <input name="features" id="tags" value="{{$property->features}}"  class="form-control" autofocus>
                                @error('features')
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


