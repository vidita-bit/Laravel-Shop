@extends('admin.layouts.app')
@section('content')
<h2>Enter Your Email Address!</h2>
<div class="container">
<form method="POST" action= "{{url('admin/resend')}}" >
@csrf

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                   <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session()->has('msg'))
                    <div class="alert alert-danger">{{ session()->get('msg') }}</div>
                    @endif
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Email" class="form-control border-input">
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Send Email</button>
    </div>
</form>
</div>
@endsection