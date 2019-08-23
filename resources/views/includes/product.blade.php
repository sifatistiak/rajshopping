<div class="product product-single">
    <div class="product-thumb">
        <a href="{{route('product',encrypt($product->id))}}" class="main-btn quick-view"><i
                class="fa fa-search-plus"></i> Quick
            view</a>
        <img src="{{asset('product_images/'.$product->displayImage->image)}}" alt="">
    </div>
    <div class="product-body">
        <h3 class="product-price">{{$product->price}} <span> <img style="display: inline" width="15px"
                    src="{{asset('frontend/img/taka.png')}}" alt=""></span>

        </h3>
        <div class="product-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o empty"></i>
        </div>
        <h2 class="product-name"><a href="#">{{$product->title}}</a></h2>
        <div class="product-btns">
            <button class="primary-btn">Shop Now</button>
            <button class="primary-btn"></i> Add
                to Cart</button>
        </div>
    </div>
</div>