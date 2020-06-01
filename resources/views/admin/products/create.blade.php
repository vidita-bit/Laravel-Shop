@extends('admin.layouts.master')
@section('page')
Add Product
@endsection

@section('content')
<div class="row">
                    <div class="col-lg-10 col-md-10">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Product</h4>
                            </div>
                           <!-- @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif
                            -->
                            @include('admin.layouts.message')
                            <div class="content">
                            {!! Form::open(['url' => 'admin/products', 'files'=>'true']) !!}
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('admin.products.fields')

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        {{ form::submit('Add Product',['class'=>'btn btn-info btn-fill btn-wd']) }}
                                        
                                    </div>
                                    <div class="clearfix"></div>
                                    {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
@endsection
