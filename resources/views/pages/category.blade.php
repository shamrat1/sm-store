@extends('alt')
@section('title',"$category->name")

@section('content')
    <div class="w3l_banner_nav_right">
        <div class="w3l_banner_nav_right_banner3">
            <h3>Best Deals For New Products<span class="blink_me"></span></h3>
        </div>
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
                                        {{--<div class="snipcart-details top_brand_home_details">--}}
                                        {{--{!! Form::open(['route'=>'pages.checkout','method'=>'GET']) !!}--}}
                                        {{--<fieldset>--}}
                                        {{--@csrf--}}
                                        {{--<input type="hidden" name="cmd" value="_cart" />--}}
                                        {{--<input type="hidden" name="add" value="1" />--}}
                                        {{--<input type="hidden" name="business" value=" " />--}}
                                        {{--<input type="hidden" name="item_name" value="{{ $product->name }}" />--}}
                                        {{--<input type="hidden" name="amount" value="{{ $product->unit_price }}" />--}}
                                        {{--<input type="hidden" name="discount_amount" value="{{ $product->discount }}" />--}}
                                        {{--<input type="hidden" name="currency_code" value="USD" />--}}
                                        {{--<input type="hidden" name="return" value=" " />--}}
                                        {{--<input type="hidden" name="cancel_return" value=" " />--}}
                                        {{--<input type="submit" name="submit" value="Add to cart" class="button" />--}}
                                        {{--</fieldset>--}}
                                        {{--{{ Form::close() }}--}}

                                        {{----}}
                                        {{--</div>--}}
                                        <a href="{{ route('cart.create',$product->slug) }}" class="btn btn-primary">Add To Cart</a>
                                    </div>

                                </figure>

                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
    </div>
    <div class="clearfix"></div>
    @endsection