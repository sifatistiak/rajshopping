@extends('layouts.admin')
@section('title','')
@section('header','Form')
@section('content')

<!-- Main content -->
<section class="content container-fluid">

  <!--------------------------
        | Your Page Content Here |
        -------------------------->
  <div class="col-md-6">
    <form role="form">
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group">
          <label for="exampleInputFile">File input</label>
          <input type="file" id="exampleInputFile">

          <p class="help-block">Example block-level help text here.</p>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox"> Check me out
          </label>
        </div>
      </div>
      <!-- /.box-body -->

      <div style="margin-left: 10px">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

  </div>
</section>
<!-- /.content -->

@endsection