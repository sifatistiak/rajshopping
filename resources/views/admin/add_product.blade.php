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
                <input value="{{old('title')}}Firdous Ombre - 19" type="text" max="255" class="form-control" placeholder="Enter Product Title" name="title" autofocus
                    required>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Product Description</label>
                <textarea name="desc" rows="10" class="form-control" required>{{old('desc')}}
<p><strong> DIGITAL PRINTED LAWN SHIRT 3.18M<br>
DIGITAL PRINTED BAMBERG CHIFFON DUPATTA 2.5M<br>
COTTONTROUSER 2.5M<br>
2PCS ORGANZA EMB DAMAN MOTIFS-4PCS ORGANZA EMB TROUSER MOTIFS </strong></p>
<p><strong>Quality </strong>- Best Quality Ensure</p>
<p><strong>Look</strong> - As like the picture</p></textarea>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Product Category</label>
                <select required name="category_id" class="form-control">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}"> {{$category->name}} </option>
                    @endforeach
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

@endsection