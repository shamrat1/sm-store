@extends('alt')
@section('title',"Profile of ".Auth::user()->name)
@section('css')

    @endsection

@section('content')
    <div class="w3l_banner_nav_right">
        <div class="col-md-9 col-md-offset-2">
            <div class="row">
                <div class="col-md-3">
                    <h4>Your Profile</h4>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <a href="" class="btn btn-primary">Logout</a>
                    <a href="" class="btn btn-primary">Edit</a>
                </div>
            </div>
            <div class="row">
                <h5>Name: {{ Auth::user()->name }}</h5><br>
                <h5>Email: {{ Auth::user()->email }}</h5><br>
                <h5><a href="" class="btn btn-danger">Change Password</a></h5><br>
            </div>
            <hr>
        </div>

        <div class="col-xs-auto"  style="margin-left: 10px">
                <h2>Purchase History</h2>
            @if($orders!=null)
                <table class="table">
                    <thead>
                        <th>Order No</th>
                        <th>Mobile No</th>
                        <th>Payment Type</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Date Of Purchase</th>
                    </thead>
                    @foreach($orders as $item)
                        <tbody>
                            <td>{{ $item->id }}</td>

                            <td>{{ $item->mobile }}</td>
                            @if($item->payment_type == "cod")
                                <td>Cash On Delivery</td>
                            @elseif($item->payment_type == "bkash")
                                <td>Bkash</td>
                            @else
                                <td>PayPal</td>
                            @endif
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->city }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tbody>
                    @endforeach
                </table>
            @else
                <p>No history available.</p>

            @endif
            </div>
        </div>

    <div class="clearfix"></div>

    @endsection