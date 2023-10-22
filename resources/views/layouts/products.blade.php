<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merch</title>
    <style>
      
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007bff;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav ul {
            list-style: none;
            padding: 0;
            text-align: center;
            margin-left:30px;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #007bff;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .logout-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            margin-right:10px;
            padding: 8px 16px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ url('/home') }}" >Dashboard</a></li>
                
                <li><a href="{{ route('products.index') }}">Products</a></li>
                
            </ul>
        </nav>
        @if(auth()->check())
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
        </form>
        @endif
    </header>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
