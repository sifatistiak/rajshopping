<div class="product product-single">
    <div class="product-thumb">
        <div class="product-label">
            <span>{{$product->discount}}%</span>
        </div>
        <a href="{{$product->mypath()}}" class="main-btn quick-view"><i
                class="fa fa-search-plus"></i>Quick view</a>
        <img src="{{asset('product_images/'.$product->displayImage->image)}}" alt="">
    </div>
    <div class="product-body">
        <h3 class="product-price">
            {{$product->price}}<span><img style="display: inline" width="18px" src="{{asset('frontend/img/taka.png')}}" alt=""></span>
            @php
            $price = $product->price;
            $oldPrice = round($price+($price*$product->discount/100));
            while ($oldPrice % 10 != 0) {
                $oldPrice +=1;
            }
            @endphp
            <del class="product-old-price">{{$oldPrice}}<span><img style="display: inline" width="15px" src="{{asset('frontend/img/taka.png')}}" alt=""></span></del>
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

        </div>
        @endif
        {{-- <h2 class="product-name"><a href="{{route('nproduct',[$product->id,slug('title')])}}">{{$product->title}}</a></h2> --}}
        <h2 class="product-name"><a href="{{$product->mypath()}}">{{$product->title}}</a></h2>
        <div class="product-btns">
            {{-- <a href="{{$product->buyNow()}}" class="primary-btn">Buy Now </a> --}}
            <a href="" class="primary-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
            <button style="margin-left:5px" id="add_to_cart" value="{{$product->id}}" class="primary-btn add_to_cart"></i> Add
                to Cart </button>
        </div>
    </div>
</div>
