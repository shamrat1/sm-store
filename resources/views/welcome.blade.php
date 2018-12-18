@extends('main')
@section('title','Your Companion')

@section('content')
<div class="banner_bottom">
    <div class="wthree_banner_bottom_left_grid_sub">
    </div>
    <div class="wthree_banner_bottom_left_grid_sub1">
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="{{ asset('images/4.jpg') }}" alt=" " class="img-responsive" />
                <div class="wthree_banner_bottom_left_grid_pos">
                    <h4>Discount Offer <span>25%</span></h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="{{ asset('images/5.jpg') }}" alt=" " class="img-responsive" />
                <div class="wthree_banner_btm_pos">
                    <h3>introducing <span>best store</span> for <i>Mobiles and Accessories</i></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 wthree_banner_bottom_left">
            <div class="wthree_banner_bottom_left_grid">
                <img src="{{ asset('images/6.jpg') }}" alt=" " class="img-responsive" />
                <div class="wthree_banner_btm_pos1">
                    <h3>Save <span>Upto</span> $10</h3>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
</div>
<!-- top-brands -->
<div class="top-brands">
<div class="container">
    <h3>Hot Offers</h3>
    @foreach($products as $product)
    <div class="agile_top_brands_grids">

        <div class="col-md-3 top_brand_left">
            <div class="hover14 column">
                <div class="agile_top_brand_left_grid">
                    <div class="tag"><img src="images/tag.png" alt=" " class="img-responsive" /></div>
                    <div class="agile_top_brand_left_grid1">

                        <figure>
                            <div class="snipcart-item block" >
                                <div class="snipcart-thumb">
                                    <a href="{{ route('pages.single',$product->slug ) }}"><img title=" " alt=" " src="{{ url('images/'.$product->images)}}" width="486px" height="320px" /></a>
                                    <p>{{ $product->name }}</p>
                                    <h4>${{ $product->unit_price }} <span>${{ $product->discount }}</span></h4>
                                </div>
                                <a href="{{ route('cart.create',$product->slug) }}" class="btn btn-primary">Add To Cart</a>
                            </div>

                        </figure>

                    </div>
                </div>
            </div>

        </div>
        @endforeach
        <div class="clearfix"> </div>
    </div>
</div>
</div>
<!-- //top-brands -->
<!-- fresh-vegetables -->
@if($subprod != null)
<div class="fresh-vegetables">
    <div class="container">
        <h3>Recommanded for You</h3>
        @foreach($subprod as $product)
            <div class="agile_top_brands_grids">

                <div class="col-md-3 top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="tag"><img src="images/tag.png" alt=" " class="img-responsive" /></div>
                            <div class="agile_top_brand_left_grid1">

                                <figure>
                                    <div class="snipcart-item block" >
                                        <div class="snipcart-thumb">
                                            <a href="{{ route('accessories.single',$product->slug ) }}"><img title=" " alt=" " src="{{ url('images/'.$product->images)}}" width="486px" height="320px" /></a>
                                            <p>{{ $product->name }}</p>
                                            <h4>${{ $product->price }} <span>${{ $product->discount }}</span></h4>
                                        </div>
                                        <a href="{{ route('cart.accessories',$product->slug) }}" class="btn btn-primary">Add To Cart</a>
                                    </div>

                                </figure>

                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
                <div class="clearfix"> </div>
            </div>
    </div>
</div>
@endif
<!-- //fresh-vegetables -->
<!-- newsletter -->
<div class="newsletter">
<div class="container">
    <div class="w3agile_newsletter_left">
        <h3>sign up for our newsletter</h3>
    </div>
    <div class="w3agile_newsletter_right">
        <form action="#" method="post">
            <input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
            <input type="submit" value="subscribe now">
        </form>
    </div>
    <div class="clearfix"> </div>
</div>
</div>
<!-- //newsletter -->
@endsection