@extends('front.layouts.master')

@section('content')
<div class="container">
        @if(session()->has('msg'))
            <div class="alert alert-success">
                {{ session()->get('msg')}}
            </div>
        @endif
<h2>Profile</h2>
<hr>
<h3>User Details</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="2">User Details <a href="" class="pull-right"><i class="fa fa-cogs"></i>Edit User</a></th>
        </tr>
    </thead>
    <tr>
        <th>ID</th>
        <td>{{ $user->id }}</td>
    </tr>
    <tr>
        <th>Name</th>
        <td>{{ $user->name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $user->email }}</td>
    </tr>
    <tr>
        <th>Registerd at</th>
        <td>{{ $user->created_at }}</td>
    </tr>
</table>


<div class="card">
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th colspan="7">Orders</th>
                                    </tr>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($user->order as $order)
                                        <td>{{ $order->id }}</td>
                                        <td>
                                            @foreach ($order->products as $item)
                                                <table class="table">
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
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
                                            @foreach ($order->orderItems as $item)
                                                <table class="table">
                                                    <tr>
                                                        <td>${{ $item->price }}</td>
                                                    </tr>
                                                </table>
                                            @endforeach
                                        </td>
                                        <td>
                                            @if($order->status)
                                            <span class="label label-success">Confirmed</span>
                                            @else
                                            <span class="label label-warning">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('/user/order').'/'.$order->id}}" class="btn btn-outline-dark btn-sm">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                                    
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                        @endsection