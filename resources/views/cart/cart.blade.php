@extends('alt')
@section('title','Your Shopping Cart')
@section('content')
    <div class="col-md-8">
        <table>
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
                    <th>{{ $item->name }}</th>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->total }}</td>
                    <td>{{ Cart::remove($item->rowId) }}</td>
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

    </div>
    <div class="col-md-8 address_form_agile">
        <h4>Add a new Details</h4>
        <form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
            <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                <div class="information-wrapper">
                    <div class="first-row form-group">
                        <div class="controls">
                            <label class="control-label">Full name: </label>
                            <input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
                        </div>
                        <div class="w3_agileits_card_number_grids">
                            <div class="w3_agileits_card_number_grid_left">
                                <div class="controls">
                                    <label class="control-label">Mobile number:</label>
                                    <input class="form-control" type="text" placeholder="Mobile number">
                                </div>
                            </div>
                            <div class="w3_agileits_card_number_grid_right">
                                <div class="controls">
                                    <label class="control-label">Landmark: </label>
                                    <input class="form-control" type="text" placeholder="Landmark">
                                </div>
                            </div>
                            <div class="clear"> </div>
                        </div>
                        <div class="controls">
                            <label class="control-label">Town/City: </label>
                            <input class="form-control" type="text" placeholder="Town/City">
                        </div>
                        <div class="controls">
                            <label class="control-label">Address type: </label>
                            <select class="form-control option-w3ls">
                                <option>Office</option>
                                <option>Home</option>
                                <option>Commercial</option>

                            </select>
                        </div>
                    </div>
                    <button class="submit check_out">Delivery to this Address</button>
                </div>
            </section>
        </form>
    <div class="clearfix"></div>
    @endsection
