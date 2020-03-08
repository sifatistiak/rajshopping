@extends('layouts.admin')
@section('title','Duplicate To New Category')
@section('header','Duplicate Product To New Category')
@section('content')

<div class="col-md-6">
    <form action="{{ route('admin.duplicate.product',$product->id) }}" method="POST"
        role="form">
        @csrf
        {{--form body --}}
        <div class="box-body">
            {{$product->title}}
        </div>
        <div class="box-body">
            {{$product->desc}}
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
        <!-- /.form-body -->
        <div style="margin-left: 10px">
            <button type="submit" class="btn btn-primary">Duplicate</button>
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
