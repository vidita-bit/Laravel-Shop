@extends('front.layouts.master')

@section('content')
<div class="container">
<form method="POST" action="{{ url('/user/reset_password_without_token') }}">
@csrf
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Email" class="form-control border-input">
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Reset</button>
    </div>
</form>
</div>
@endsection