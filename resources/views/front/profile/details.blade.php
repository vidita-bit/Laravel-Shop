@extends('front.layouts.master')

@section('content')
<div class="container">
<h2>User Order Details Page</h2>
<hr>
<div class="row">

<div class="col-md-12">
    
            <h4 class="title">Order Details</h4>
        
        <div class="content table-responsive table-full-width">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th colspan="7">Order details</th>
                    </tr>
                <tr>
                <th>ID</th>
                        <th>Date</th>
                        <th>Address</th>
                        <th>Status</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->date }}</td>
                        <td>{{ $order->address }}</td>
                        <td>
                            @if ($order->status)
                                <span class="badge badge-success">Confirmed</span>
                            @else
                                <span class="badge badge-warning">Pending</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>
<div class="col-md-6">
            <h4 class="title">User Details</h4>
            <hr>
        <div class="content table-responsive table-full-width">
            <table class="table table-striped table-bordered">
            <thead>
                    <tr>
                        <th>ID</th>
                        <td>{{ $order->user->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $order->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $order->user->email }}</td>
                    </tr>
                    <tr>
                        <th>Registered At</th>
                        <td>{{ $order->user->created_at->diffForHumans() }}</td>
                    </tr>

                    </thead>
            </table>
        </div>
</div>

<div class="col-md-6">
            <h4 class="title">Product Details</h4>
            <hr>
        <div class="content table-responsive table-full-width">
            <table class="table table-striped table-bordered">
            <tr>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                    </tr>
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>
                            @foreach ($order->products as $product)
                                <table class="table">
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                    </tr>
                                </table>
                            @endforeach
                        </td>

                        <td>
                            @foreach ($order->orderItems as $item)
                                <table class="table">
                                    <tr>
                                        <td>{{ $item->price }}</td>
                                    </tr>
                                </table>
                            @endforeach
                        </td>

                        <td>
                            @foreach ($order->orderItems as $item)
                                <table class="table">
                                    <tr>
                                        <td>{{ $item->quantity }}</td>
                                    </tr>
                                </table>
                            @endforeach
                        </td>

                        <td>
                            @foreach ($order->products as $product)
                                <table class="table">
                                    <tr>
                                        <td><img src="{{ url('uploads') . '/' . $product->image }}" alt=""
                                                 style="width: 2em"></td>
                                    </tr>
                                </table>
                            @endforeach
                        </td>
                    </tr>
            </table>
        </div>
</div>
</div>
</div>
@endsection