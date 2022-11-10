@extends('admin.layouts.master')

@section('content')

    <div class="row">

        <div class="col-10 mx-auto mt-3">
            <div class="card mb-md-0">
                <div class="card-body">
                    <div class="card-title">Create Gallery</div>
                    <form class="form-horizontal" action="{{route('admin.gallery.store')}}"  method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="row mb-3">
                            <label for="inputCaption" class="col-3 col-form-label">Caption</label>
                            <div class="col-9">
                                <input type="text" id="example-fileinput" class="form-control  @error('caption') is-invalid @enderror" name="caption">
                                @error('caption')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                               </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="inputFile" class="col-3 col-form-label">Image</label>
                            <div class="col-9">
                                <input type="file" id="example-fileinput" class="form-control  @error('image') is-invalid @enderror" name="image">
                                @error('image')
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
