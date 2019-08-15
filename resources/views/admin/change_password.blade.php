@extends('layouts.admin')
@section('title','Change Password')
@section('header','Change Password')
@section('content')

<!-- Main content -->

  <!--------------------------
        | Your Page Content Here |
        -------------------------->
  <div class="col-md-6">
    <form action="{{ route('admin.change.password') }}" method="POST" role="form">
      @csrf
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Old Password</label>
          <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Enter email"
            name="oldpassword" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">New Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Confirm Password</label>
          <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
      </div>
      <!-- /.box-body -->
      <div style="margin-left: 10px">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

  </div>
<!-- /.content -->

@endsection