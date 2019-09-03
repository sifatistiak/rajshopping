@extends('layouts.frontend')
@section('title','Thank You!')
@section('content')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->

        <div class="row">
            <div class="col-md-12">
                @if ($msg)
                <h1>{{$msg}}</h1>
                @else
                <script>
                    window.location = "/";
                </script>
                @endif
            </div>
            <div class="col-md-12">
                @if ($msg)
                <h1>{{$msg}}</h1>
                @else
                <script>
                    window.location = "/";
                </script>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection