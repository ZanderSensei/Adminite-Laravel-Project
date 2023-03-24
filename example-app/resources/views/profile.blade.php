@extends('layouts.backend')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-sm-6">
            <form action="">
                <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}">

                <label for="email">Email Address</label>
                <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}">
                <br>
                <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i>Update</button>
            </form>
        </div>
        <div class="col-sm-6"></div>

    </div>
</section>
@endsection