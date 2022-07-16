@extends('layouts.loginregis')

@section('title')
Anjaman | Register
@endsection

@section('content')

    <div class="login-container">
      <div class="section-left">
        <img src={{ URL::asset("images/micheile-dot-com-V_tAdP3SyIk-unsplash.jpg") }} alt="">
      </div>

      <div class="section-right">
        <div class="text-center">
          <h2>REGISTER</h2>
        </div>

        <form action="/user/register" method="post">
          @csrf
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email Address">
            @error('email')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            @error('password')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="confirm">Confirm Password</label>
            <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm Password">
            @error('confirm')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="Username" placeholder="Username">
            @error('username')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" class="form-control" name="fullname" id="fullname" aria-describedby="Name" placeholder="Full Name">
            @error('fullname')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" aria-describedby="PhoneNumber" placeholder="Phone Number">
            @error('phone_number')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>

          <div class="row g-2">
            <div class="col-md-6 mb-3">
              <label for="province">Province</label>
              <input type="text" class="form-control" id="province" name="province" placeholder="Province" aria-label="Province">
              @error('province')
                <div class="error-message">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6 mb-3">
              <label for="city">Regency</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="Regency" aria-label="City">
              @error('city')
                <div class="error-message">{{ $message }}</div>
               @enderror
            </div>

            <div class="col-md-6 mb-3">
              <label for="subdistrict">District</label>
              <input type="text" class="form-control" id="subdistrict" name="subdistrict" placeholder="District" aria-label="Subistrict">
              @error('subdistrict')
                <div class="error-message">{{ $message }}</div>
               @enderror
            </div>

            <div class="col-md-6 mb-3">
              <label for="postal_code">Zip Code</label>
              <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Zip Code" aria-label="ZipCode">
              @error('postal_code')
                <div class="error-message">{{ $message }}</div>
              @enderror
            </div>
            
            <div class="col-md-12 mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" name="address" id="address" placeholder="Address" aria-label="Address">
              @error('address')
                <div class="error-message">{{ $message }}</div>
              @enderror
            </div>
          </div>
          
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">
              I agree with privacy policy
            </label>
          </div>
          
          <div class="form-group">
            <button type="submit" class="btn btn-login btn-block">
              Register
            </button>
          </div>
          <p class="text-center mt-16">
            Already have an account? <a href="login" class="login">Login</a>
          </p> 
        </form>
      </div>
    </div>  
  
@endsection