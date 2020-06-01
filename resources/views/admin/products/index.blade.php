@extends('admin.layouts.master')

@section('page')
View Products
@endsection

@section('content')
<div class="row">

                    <div class="col-md-12">
                        @include('admin.layouts.message')
                        <div class="card">
                            <div class="header">
                                <h4 class="title">All Products</h4>
                                <p class="category">List of all stock</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Desc</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                @foreach($products as $product) 
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td><img src="{{ url('uploads').'/'.$product->image }}" alt="{{ $product->image }}" class="img-thumbnail"
                                                 style="width: 50px"></td>
                                        <td>

                                        {{ Form::open(['route' => ['products.destroy',$product->id], 'method'=>'DELETE']) }}
                                            {{ Form::button('',['type'=>'submit','class'=>'btn btn-sm btn-danger ti-trash','onclick'=>'return confirm("Are you sure you want to delete this")']) }}
                                            {{ link_to_route('products.edit','',$product->id,['class'=>'btn btn-sm btn-info ti-pencil-alt']) }}
                                            {{ link_to_route('products.show','',$product->id,['class'=>'btn btn-sm btn-primary ti-view-list-alt']) }}
                                        {{ Form::close() }}
                                           <!-- <button class="btn btn-sm btn-info ti-pencil-alt" title="Edit"></button>
                                            <button class="btn btn-sm btn-danger ti-trash" title="Delete"></button>
                                            <button class="btn btn-sm btn-primary ti-view-list-alt"
                                                    title="Details"></button>-->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
@endsection

