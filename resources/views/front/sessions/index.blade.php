@extends('front.layouts.master')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-md-12" id="register">

            <div class="card col-md-8">
                <div class="card-body">

                    <h2 class="card-title">Login</h2>
                    <hr>
                    @if($errors->any())
                        <div class="alert alert-warning">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('msg'))
                        <div class="alert alert-warning">
                            <li>{{ session()->get('msg') }}</li>
                        </div>
                    @endif
                    

                    <form action="{{url('/user/login')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" placeholder="Email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="Password" id="password"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-info col-md-2"> Login</button>
                        </div>
                        
                    <div class="form-group">
                        <a href="{{ url('/password/reset')}}">Forgot Password</a>
                    </div>

                    </form>

                </div>
            </div>


        </div>

    </div>

</div>
@endsection