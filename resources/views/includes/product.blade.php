<div class="product product-single">
    <div class="product-thumb">
        <a href="{{route('product',encrypt($product->id))}}" class="main-btn quick-view"><i
                class="fa fa-search-plus"></i>Quick view</a>
        <img src="{{asset('product_images/'.$product->displayImage->image)}}" alt="">
    </div>
    <div class="product-body">
        <h3 class="product-price">{{$product->price}} <span> <img style="display: inline" width="15px"
                    src="{{asset('frontend/img/taka.png')}}" alt=""></span>

        </h3>
        @if (count($product->reviews)>0)
        <div class="product-rating">

            @php
            $totalReview = 0;
            foreach($product->reviews as $review){
            $totalReview = $review->rating+$totalReview;
            }
            $totalReview = round($totalReview/count($product->reviews));
            @endphp

            @for($i=0; $i<$totalReview; $i++) <i class="fa fa-star"></i>
                @endfor
                @for($i=0; $i<5-$totalReview; $i++) <i class="fa fa-star-o empty"></i>
                    @endfor
        </div>
        @else
        <div class="product-rating">
            Not rated
        </div>
        @endif
        <h2 class="product-name"><a href="{{route('product',encrypt($product->id))}}">{{$product->title}}</a></h2>
        <div class="product-btns">
            <a href="{{route('checkout',encrypt($product->id))}}" class="primary-btn">Buy Now</a>
            <button id="add_to_cart" value="{{$product->id}}" class="primary-btn add_to_cart"></i> Add
                to Cart</button>
        </div>
    </div>
</div>