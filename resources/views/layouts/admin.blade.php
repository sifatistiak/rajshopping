<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('admin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/skins/skin-blue.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="{{route('admin.index')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>BM</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b></span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <img src="{{asset('admin/dist/img/user.jpg')}}" class="user-image" alt="User Image">
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{Auth::user()->name}} </span>
              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <li class="user-header">
                  <img src="{{asset('admin/dist/img/user.jpg')}}" class="img-circle" alt="User Image">

                  <p>
                    {{Auth::user()->name}}
                  </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{ route('admin.change.password.view') }}" class="btn btn-default btn-flat">Change
                      Password</a>
                  </div>
                  <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Sign out</a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{asset('admin/dist/img/user.jpg')}}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{Auth::user()->name}}</p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>



        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <!-- Optionally, you can add icons to the links -->
          <li>{{Request::path()}} </li>
          <li class="@if (Request::path() == 'yqw/index') active @endif">
            <a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
          </li>
          {{-- Product --}}
          <li class="treeview
          @if ( Request::path() == 'yqw/add-product'  ||  Request::path() == 'yqw/products' || Request::path() == 'yqw/product-by-category' || Request::path() == 'yqw/deleted-products'|| Request::is('yqw/view-product/*') || Request::is('yqw/edit-product/*'))
                    active @endif">
            <a href="#"><i class="fa fa-link"></i> <span>Product</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if (Request::path() == 'yqw/add-product' ) active @endif"><a
                  href="{{route('admin.add.product.view')}}">Add Product</a></li>
              <li class="@if (Request::path() == 'yqw/products' ) active @endif"><a
                  href="{{route('admin.products')}}">Manage all Product</a></li>
              <li class="@if (Request::path() == 'yqw/product-by-category' ) active @endif"><a
                  href="{{route('admin.product.by.category')}}">Product by Category</a></li>
              <li class="@if (Request::path() == 'yqw/product-by-subcategory' ) active @endif"><a
                  href="{{route('admin.product.by.subcategory')}}">Product by Sub Category</a></li>
              <li class="@if (Request::path() == 'yqw/deleted-products' ) active @endif"><a
                  href="{{route('admin.deleted.products')}}">Deleted Products</a></li>
            </ul>
          </li>
          {{-- category --}}
          <li class="treeview
              @if ( Request::path() == 'yqw/add-category'  ||
                Request::path() == 'yqw/categories' || Request::is('yqw/edit-category/*')||
                Request::path() == 'yqw/deleted-categories' )
          active @endif">
            <a href="#"><i class="fa fa-link"></i> <span>Category</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if (Request::path() == 'yqw/add-category' ) active @endif"><a
                  href="{{route('admin.add.category.view')}}">Add Category</a></li>
              <li class="@if (Request::path() == 'yqw/categories' ) active @endif"><a
                  href="{{route('admin.categories')}}">Manage Category</a></li>
              <li class="@if (Request::path() == 'yqw/deleted-categories' ) active @endif"><a
                  href="{{route('admin.deleted.categories')}}">Deleted Category</a></li>
            </ul>
          </li>
          {{-- SUB-category --}}
          <li class="treeview
              @if ( Request::path() == 'yqw/add-sub-category'  ||
                Request::path() == 'yqw/sub-categories' || Request::is('yqw/edit-sub-category/*')||
                Request::path() == 'yqw/deleted-sub-categories' )
          active @endif">
            <a href="#"><i class="fa fa-link"></i> <span>Sub Category</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if (Request::path() == 'yqw/add-sub-category' ) active @endif"><a
                  href="{{route('admin.add.sub-category.view')}}">Add Sub Category</a></li>
              <li class="@if (Request::path() == 'yqw/sub-categories' ) active @endif"><a
                  href="{{route('admin.sub-categories')}}">Manage Sub Category</a></li>
              <li class="@if (Request::path() == 'yqw/sub-deleted-categories' ) active @endif"><a
                  href="{{route('admin.deleted.sub-categories')}}">Deleted Sub Category</a></li>
            </ul>
          </li>
          {{-- slider Image --}}
          <li class="treeview
            @if ( Request::path() == 'yqw/add-slider-image'  ||
                Request::path() == 'yqw/slider-images' )
          active @endif">
            <a href="#"><i class="fa fa-link"></i> <span>Slide and Collection Image</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-right pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="@if (Request::path() == 'yqw/add-slider-image' ) active @endif"><a
                  href="{{route('admin.add.slider.image.view')}}">Add Image</a></li>
              <li class="@if (Request::path() == 'yqw/slider-images' ) active @endif"><a
                  href="{{route('admin.slider.images')}}">Manage Image</a></li>
            </ul>
          </li>
          <li class="@if (Request::path() == 'yqw/orders' ) active @endif"><a href="{{route('admin.orders')}}"><i
                class="fa fa-link"></i> <span>Orders</span></a></li>

          <li class="@if (Request::path() == 'yqw/completed-orders' ) active @endif"><a
              href="{{route('admin.completed.orders')}}"><i class="fa fa-link"></i> <span>Complete Orders</span></a>
          </li>
          <li class="@if (Request::path() == 'yqw/reviews' ) active @endif"><a href="{{route('admin.reviews')}}"><i
                class="fa fa-link"></i> <span>Reviews</span></a>
          </li>

          <li class="@if (Request::path() == 'yqw/helps' ) active @endif"><a href="{{route('admin.helps')}}"><i
                class="fa fa-link"></i> <span>Helps</span></a></li>
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          @yield('header')
        </h1>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">
        @include('includes.message')

        @yield('content')


      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="pull-right hidden-xs">
        Anything you want
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
    </footer>

  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED JS SCRIPTS -->

  <!-- jQuery 3 -->
  <script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>

  <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>
