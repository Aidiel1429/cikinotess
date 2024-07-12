<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CikiNotes | @yield('title')</title>

    {{-- icon --}}
    <link rel="icon" href="img/img.jpg" type="image/x-icon">

    {{-- tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    {{-- alpine js --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- css --}}
    <link rel="stylesheet" href="style.css">

    <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                first: '#0066FF',
                second: '#18BC63',
                third: '#E82A2A'
              }
            }
          }
        }
      </script>


</head>
<body class="bg-[#F8FFFF]">
    <div class="container mx-auto w-full" x-data="{ open: false }">
        <header class="bg-white flex items-center justify-between p-4 shadow-md w-full container lg:px-[78px] xl:px-60">
            <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-[#353535]">CikiNotes</a>
            <div class="hidden md:flex md:items-center md:gap-3">
              <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 transition-all">Dashboard</a>
              <a href="/hutang" class="text-gray-700 hover:text-blue-600 transition-all">Hutang</a>
            </div>
              
            <div class="text-2xl text-[#353535] cursor-pointer md:hidden" @click="open = !open">
                <i :class="open ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'" ></i>
            </div>
        </header>
        <nav x-show="open" @click.away="open = false" x-transition>
            <ul class="bg-white absolute mt-3 text-center w-96 shadow-lg rounded-md p-2 right-3 mx-auto px-5  leading-8 font-semibold">
                <li><a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600 transition-all">Dashboard</a></li>
                <li><a href="/hutang" class="text-gray-700 hover:text-blue-600 transition-all">Hutang</a></li>
            </ul>
        </nav> 
    </div>
    {{ $slot }}


</body>
</html>