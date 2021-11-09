<div class="recommended_items">
    <h2 class="title text-center">Proposed products </h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

                <?php
                    // dd($ProductDetail->category_id);
                    // $q = $Prod
                    $sql = DB::table('products')->select('id','Unit_price','name','feature_image_path')->where('category_id', $ProductDetail->category_id)->get();
                    // dd($sql);
                ?>

                @foreach ($sql as $keyRecommend => $productRecommendItem)

                @if ($keyRecommend % 3 == 0)
                     <div class="item {{$keyRecommend == 0 ? 'active' : ''}}">
                @endif

                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a href="{{route('productDetail',['id' => $productRecommendItem->id])}}"><img src="{{$productRecommendItem->feature_image_path}}" alt="" /></a>
                                <h2>{{number_format($productRecommendItem->Unit_price)}} VNĐ</h2>
                                <p>{{$productRecommendItem->name}}</p>
                                {{-- <a data-url="{{route('giohang.add',['id' => $productRecommendItem->id])}}" class="btn btn-default add-to-cart add_to_cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
                            </div>

                        </div>
                    </div>
                </div>
                @if ($keyRecommend % 3 == 2)
                         </div>
                @endif
                @endforeach

        </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
    </div>
</div>
