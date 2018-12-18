@extends('alt')
@section('title','Your Shopping Cart')
@section('content')
<div class="w3l_banner_nav_right">
    <div class="col-xs-auto">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach(Cart::content() as $item)
                    <tr>
                        @if($item->qty >= 1)
                        <th>{{ $item->name }}</th>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->total }}</td>
                        <td><a href="{{ route('cart.increase',[$item->rowId,$item->qty]) }}" class="btn"><span class="glyphicon glyphicon-plus"></span></a>
                            <a href="{{ route('cart.decrease',[$item->rowId,$item->qty]) }}" class="btn"><span class="glyphicon glyphicon-minus"></span></a>
                            <a href="{{ route('cart.remove',$item->rowId) }}" class="btn"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                            @endif
                    </tr>
                @endforeach
                </tbody>

                <tfoot>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Subtotal</td>
                    <td><?php echo Cart::subtotal(); ?></td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Tax</td>
                    <td><?php echo Cart::tax(); ?></td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                    <td>Total</td>
                    <td><?php echo Cart::total(); ?></td>
                </tr>
                </tfoot>
            </table>
        <hr>
    </div>
    <div class="row">
    <div class="col-md-6">
        <h4>Shipping Details</h4>
        {!! Form::open(['route'=>'order.store']) !!}
        <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                <div class="information-wrapper">
                    <div class="first-row form-group">
                        <div class="controls">
                            {{ Form::label('name','Full Name:') }}
                            {{ Form::text('name',Auth::user()->name,['class'=>'form-control']) }}
                        </div>
                        <div class="w3_agileits_card_number_grids">
                            <div class="w3_agileits_card_number_grid_left">
                                <div class="controls">
                                    {{ Form::label('mobile','Mobile No:') }}
                                    {{ Form::number('mobile','Enter your phone number',['class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="w3_agileits_card_number_grid_right">
                                <div class="controls">
                                    {{ Form::label('address','Shipping Address:') }}
                                    {{ Form::text('address','Enter Shipping address',['class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="clear"> </div>
                        </div>
                        <div class="controls">
                            {{ Form::label('city','Town/City:') }}
                            {{ Form::text('city',null,['class'=>'form-control']) }}
                        </div>
                        <div class="controls">
                            {{ Form::label('payment_type','Payment Type:') }}
                            {{ Form::select('payment_type', ['cod' => 'Cash On Delivery', 'bkash' => 'Bkash', 'paypal'=>'PayPal'], null, ['placeholder' => 'Pick a payment type...'],['class'=>'form-control']) }}
                        </div>
                    </div>
                    {{Form::submit('Place Order', array('class'=>'btn btn-success'))}}
                </div>
            </section>
        {!! Form::close() !!}
    </div>
    </div>
    <hr>
</div>
    <div class="clearfix"></div>
@endsection
