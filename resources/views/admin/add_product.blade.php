@extends('layouts.admin')
@section('title','Add Product')
@section('header','Add Product')
@section('content')

<div class="col-md-6">
    <form action="{{ route('admin.add.product') }}" method="POST" enctype="multipart/form-data" role="form">
        @csrf
        {{--form body --}}
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Product Title</label>
                <input type="text" max="255" class="form-control" placeholder="Enter Product Title" name="title" autofocus
                    required>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Product Description</label>
                <textarea name="desc" rows="10" class="form-control" required></textarea>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Product Category</label>
                <select required name="category_id" id="category" class="form-control">
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
                </select>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Quantity</label>
                <input value="{{old('quantity')}}1" type="number" class="form-control" placeholder="Enter Product Quantity" name="quantity" min="1"
                    required>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Discount</label>
                <input value="{{old('discount')}}10" type="number" class="form-control" placeholder="Enter Product discount" name="discount"
                    required>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input value="{{old('price')}}4300" type="number" class="form-control" placeholder="Enter Product Price" name="price" min="1"
                    required>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Images</label>
                <input type="file" class="form-control" name="images[]" multiple>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Display Image</label>
                <input type="file" class="form-control" name="display_image" required>
            </div>
        </div>
        <!-- /.form-body -->
        <div style="margin-left: 10px">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</div>
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

