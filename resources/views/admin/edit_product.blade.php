@extends('layouts.admin')
@section('title','Edit Product')
@section('header','Edit Product')
@section('content')

<div class="col-md-6">
    <form action="{{ route('admin.edit.product',$product->id) }}" method="POST" enctype="multipart/form-data"
        role="form">
        @csrf
        {{--form body --}}
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Product Title</label>
                <input value="{{$product->title}}" type="text" max="255" class="form-control"
                    placeholder="Enter Product Title" name="title" autofocus required>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Product Description</label>
                <textarea name="desc" rows="10" class="form-control" required>{{$product->desc}}</textarea>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Product Category</label>
                <select required name="category_id" id="category" class="form-control">
                    @foreach ($categories as $category)
                    <option @if($category->name == $product->category->name)
                        selected
                        @endif
                        value="{{$category->id}}"> {{$category->name}} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sub Category</label>
                        <select required name="sub_category_id" id="subcategory" class="form-control">
                            @foreach ($subcategories as $subcategory)
                                <option @if($subcategory->name == $product->subCategory['name'])
                                    selected
                                    @endif
                                    value="{{$subcategory->id}}"> {{$subcategory->name}} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Quantity</label>
                <input value="{{$product->quantity}}" type="number" class="form-control"
                    placeholder="Enter Product Title" name="quantity" min="0" required>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Discount</label>
                <input value="{{$product->discount}}" type="number" class="form-control"
                    placeholder="Enter Product Title" name="discount" min="0" required>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input value="{{$product->price}}" type="number" class="form-control" placeholder="Enter Product Title"
                    name="price" min="1" required>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Hot Product</label>
                <select required name="status" class="form-control">
                    <option @if($product->status == 1)
                        selected
                        @endif
                        value="1"> Yes </option>
                    <option @if($product->status == 0)
                        selected
                        @endif
                        value="0"> No </option>
                </select>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Images</label><br>
                @foreach ($productImages as $productImage)
                <img width="100px" height="80px " src="{{asset('product_images/'.$productImage->image)}}" />
                @endforeach
                <input type="file" class="form-control" name="images[]" multiple>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Display Image</label><br>
                <img width="100px" height="80px " src="{{asset('product_images/'.$displayImage->image)}}" />
                <input type="file" class="form-control" name="display_image">
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

            {{-- // var cat_id = $('#category').val();
            // console.log(cat_id);
            // //ajax
            // $.get('/ajax-subcat?cat_id='+ cat_id,function(data){
            // //success data
            // //console.log(data);
            // var subcat = $('#subcategory').empty();
            // $.each(data,function(index,subcatObj){
            //     $('#subcategory').append('<option value="'+subcatObj.id+'">'+subcatObj.name+'</option>');
            // });
            // }); --}}
@endsection
