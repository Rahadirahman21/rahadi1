<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            
              
<a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" aria-controls="offcanvasExample">
    <span style="font-size: 40px;" class="text-light">☰</span>  
</a>

                  <div class="offcanvas offcanvas-start bg-primary" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                      <h1 class="offcanvas-title text-light" id="offcanvasExampleLabel">Dashboard</h1>
                      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                      <div>
                        <a class="nav-link text-light" href="{{ route('siswa.index')}}">Data Siswa</a>
     <a class="nav-link text-light" href="{{ route('akun.index')}}">Data Akun</a>
     <a class="nav-link text-light" href="{{ route('pelanggaran.index') }}">Data Pelanggaran</a>
     <a class="nav-link text-light" href="{{ route('pelanggar.index') }}">Data Pelanggar</a>
    <a class="nav-link text-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf 
    </form>
                      </div>
                    </div>
                  </div>
                <a class="navbar-brand fs-2" id="t" href="#">E-Point Siswa</a>
          </div>
        </div>
      </nav>

      @yield('content')

      <footer >
        <p>Created with <i class="bi bi-heart-pulse-fill text-danger"></i> by <a href="https://www.instagram.com/rahadirahman3/?next=https%3A%2F%2Fwww.instagram.com%2Frahadirahman3%2F" class="text-white fw-bold">Rahadi Rahman</a></p>
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
      
      
</body>
</html>