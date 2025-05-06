@extends('mainLayouts')
@section('content')
    <div class="container mt-5">
        <h1>SELAMAT DATANG DI E-POINT SISWA</h1>
        <h1>SMKN 4 TASIKMALAYA</h1>
        <!-- Success Message -->
        @if (Session::get('success'))
            <p>{{ Session::get('success') }}</p>
        @else
            <p>You are logged in!</p>
        @endif</div>
    

    <!-- Logout Link -->
     
  @endsection

