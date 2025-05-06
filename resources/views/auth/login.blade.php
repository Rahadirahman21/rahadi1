@extends('auth.layouts')

@section('content')
    
<div class="container-fluid">
    <div class="row">
      <div class="col"id="logo">
        <h1 class="title">E-Point Siswa</h1>
        <img src="{{ asset('storage/logo.png') }}" alt="Foto"class="rounded mx-auto d-block">
        {{-- <a href="{{ route('register') }}">Register</a> --}}
        <h3 class="school-name">SMKN 4 TASIKMALAYA</h3>
      </div>
      <div class="col login">
        <h1 class="title">Login</h1>
        <br><br>
    <form action="{{ route('authenticate') }}" method="post">
        @csrf 
        <div class="login-container">
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
        
                <div class="forgot-password">
                    <a href="#">Lupa password?</a>
                </div>
        
                <input type="submit" value="Login" class="btn-gradient">
            </form>
        </div>
    </form>
      </div>
    </div>
</div>
    
    


@endsection
