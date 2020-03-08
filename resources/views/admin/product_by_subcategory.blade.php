@extends('layouts.admin')
@section('title','Admin | Product By Sub Category')
@section('header','Product By Sub Category')
@section('content')
<div class="col-md-6">
    <form action="{{ route('admin.product.by.subcategory') }}" method="GET" role="form">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Product Category</label>
                <select required name="category_id" id="category" class="form-control">
                    @if ($categoryId)
                    <option value="{{$category->id}}"> {{$category->name}} </option>
                    @endif
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}"> {{$category->name}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Sub Category</label>
                <select required name="sub_category_id" id="subcategory" class="form-control">
                    @if ($subcategoryId)
                    <option value="{{$subcategory->id}}"> {{$subcategory->name}} </option>
                    @endif
                </select>
            </div>
        </div>
        <div style="margin-left: 10px">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@if ($subcategoryId)
<div class="col-md-12">
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Sl.</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Sub Category</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Display Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)

            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$product->title}}</td>
                <td>{{str_limit($product->desc,50)}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->subcategory->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td><img height="60px" width="80px" src="{{asset('product_images/'.$product->displayImage->image)}}"
                        alt=""></td>
                <td>
                    <a href="{{route('admin.product.view',$product->id)}}">View || </a>
                    <a href="{{route('admin.edit.product.view',$product->id)}}">Edit || </a>
                    <a href="{{route('admin.duplicate.product.view',$product->id)}}">Duplicate || </a>
                    <a onclick="return confirm('Are you sure?')"
                        href="{{route('admin.delete.product',$product->id)}}">Soft Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

<script>
    $(document).ready(function () {
            $('#category').on('change',function(e){
            console.log(e);
            var cat_id = e.target.value;
            console.log(cat_id);
            //ajax
            $.get('/ajax-subcat?cat_id='+ cat_id,function(data){
            //success data
            //console.log(data);
            var subcat = $('#subcategory').empty();
            $.each(data,function(index,subcatObj){
                $('#subcategory').append('<option value="'+subcatObj.id+'">'+subcatObj.name+'</option>');
            });
            });
            });
            });
</script>

@endsection
