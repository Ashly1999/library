<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library Management System')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Reset & General */
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            color: #333;
        }

        a {
            text-decoration: none;
        }

        /* Header */
        header {
            text-align: center;
            padding: 30px 20px;
            background-color: #3f51b5;
            color: white;
        }

        header img {
            width: 100%;
            max-width: 500px;
            height: auto;
            margin: 20px 0;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        header h1 {
            font-size: 2.2rem;
            margin: 0;
        }

        /* Main Content */
        main {
            display: flex;
            justify-content: center;
            padding: 40px 20px;
        }

        /* Vertical Menu */
        .menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu li a {
            display: block;
            padding: 12px 25px;
            margin: 10px 0;
            background-color: #3f51b5;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            text-align: center;
            transition: all 0.3s;
        }

        .menu li a:hover {
            background-color: #ffeb3b;
            color: #3f51b5;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #3f51b5;
            color: white;
        }

        /* Responsive */
        @media (max-width: 600px) {
            header h1 {
                font-size: 1.5rem;
            }

            .menu li a {
                padding: 10px 15px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Library Management System</h1>
        <img src="{{ asset('uploads/download.jpg') }}" alt="Library">
    </header>

    <main>
        <ul class="menu">
            <li><a href="{{route('login')}}">login</a></li>
            <li><a href="#">User Details</a></li>
            <li><a href="#">Category</a></li>
            <li><a href="#">Book</a></li>

        </ul>
    </main>

    <footer>
        &copy; {{ date('Y') }} Library Management System. All rights reserved.
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>