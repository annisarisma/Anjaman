@extends('layouts.loginregis')

@section('title')
Anjaman | Login
@endsection

@section('content')
    <div class="login-container">
      <div class="section-left">
        <img src= {{ URL::asset("images/micheile-dot-com-V_tAdP3SyIk-unsplash.jpg") }} alt="">
      </div>

      <div class="section-right">
        <div class="text-center">
          <h2>LOGIN</h2>
        </div>

        <form action="/user/login" method="post">
          @csrf
          <div class="form-group">
            <label for="username">Username</label>

            <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}" required autofocus>
            @error('username')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="password">Password</label>

            <input type="password" name="password" class="form-control" id="password">
            @error('password')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">

            <label class="form-check-label" for="exampleCheck1">
              Remember Me
            </label>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-login btn-block">
              Login
            </button>
          </div>

          <p class="text-center mt-4">
            <a href="#" style="color: black;">Forgot your password?</a>
          </p> 
          <p class="text-center mt-8">
            Don't have an account? <a href="register" class="register">Register</a>
          </p> 
        </form>
      </div>
    </div>
@endsection