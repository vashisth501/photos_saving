@extends('welcome')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
            <form method="post" action="{{route('Upload')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Enter the Name">
                    <label for="floatingInput">Enter the Name</label>
                </div>
                <div class="form-floating">
                    <input type="file" class="form-control" name="file">
                </div>
                <div class="form-group mt-3">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
