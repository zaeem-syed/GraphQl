<!-- resources/views/rider/auth/login.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Rider Login</h2>
    <form method="POST" action="{{ route('rider.login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" class="form-control" required autofocus>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="remember"> Remember Me
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
@endsection
