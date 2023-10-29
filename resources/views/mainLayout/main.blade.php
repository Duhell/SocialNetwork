<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Social Network @yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }
        .feeds::-webkit-scrollbar{
            display: none;
        }
        .viewUser::-webkit-scrollbar-track{
            border: 5px solid white;
            background-color: #858585;
        }
        .viewUser::-webkit-scrollbar{
            width: 8px;
            background-color: #858585;
        }
        .viewUser::-webkit-scrollbar-thumb{
            background-color: #494949;
	        border-radius: 10px;
        }

    </style>
</head>
<body>
    <main class="h-screen w-full">
        @yield('contents')
    </main>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>
