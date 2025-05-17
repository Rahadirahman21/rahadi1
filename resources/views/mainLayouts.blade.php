<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Point Siswa</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
</head>
<body>

<!-- page -->
<main class="min-h-screen w-full bg-gray-100 text-gray-700" x-data="layout">
    <!-- header page -->
    <header class="flex w-full items-center justify-between border-b-2 bg-blue-500 border-gray-200  p-2" >
        <!-- logo -->
        <div class="flex items-center space-x-2">
            <button type="button" class="text-3xl" @click="asideOpen = !asideOpen"><i class="bx bx-menu text-white"></i></button>
            <div><img src="{{ asset('storage/logo.png') }}" alt="" class="w-10 ms-50"></div>
            <h6 class="text-white">SMKN 4 TASIKMALAYA</h1>
        </div>

        
    </header>

    <div class="flex h-[1000] " >
        <!-- aside -->
        <aside class="min-h-screen flex w-72 flex-col space-y-2 border-r-2 border-gray-200 p-2 bg-blue-500" style="height: 90.5vh"
            x-show="asideOpen" >
            <a href="{{ route('admin.dashboard')}}" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-blue-600 hover:text-blue-600 ">
                <span class="text-2xl"><i class="bx bx-home text-white"></i></span>
                <span class="text-white">Dashboard</span>
            </a>

            <a href="{{ route('siswa.index')}}" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-blue-600 hover:text-blue-600">
                <span class="text-2xl"><i class="bx bx-cart text-white"></i></span>
                <span class="text-white">Data Siswa</span>
            </a>

            <a href="{{ route('akun.index')}}" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-blue-600 hover:text-blue-600">
                <span class="text-2xl "><i class="bx bx-shopping-bag text-white"></i></span>
                <span class="text-white">Data Akun</span>
            </a>

            <a href="{{ route('pelanggaran.index') }}" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-blue-600 hover:text-blue-600">
                <span class="text-2xl"><i class='bx bx-book text-white'></i></i></span>
                <span class="text-white">Data Pelanggaran</span>
            </a>

            <a href="{{ route('pelanggar.index') }}" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-blue-600 hover:text-blue-600">
                <span class="text-2xl"><i class="bx bx-user text-white"></i></span>
                <span class="text-white">Data Pelanggar</span>
            </a>
            <a href="{{ route('logout') }}" class="flex items-center space-x-1 rounded-md px-2 py-3 hover:bg-blue-600 hover:text-blue-600"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <span class="text-2xl"><i class="bx bx-logout text-white"></i></span>
              <span class="text-white">Logout</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf 
          </form>
            
            
        </aside>

        <!-- main content page -->
        <div class="w-full bg-white">@yield('content')</div>
    </div>
</main>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("layout", () => ({
            profileOpen: false,
            asideOpen: true,
        }));
    });
</script>
    

        

        {{-- <footer>
            <p>Created with <i class="bi bi-heart-pulse-fill text-danger"></i> by <a href="https://www.instagram.com/rahadirahman3/?next=https%3A%2F%2Fwww.instagram.com%2Frahadirahman3%2F" class="text-white fw-bold">Rahadi Rahman</a></p>
        </footer> --}}
    {{-- </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
