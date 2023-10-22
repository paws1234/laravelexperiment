<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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
            
        }

        nav ul li {
            display: inline;
            margin-left: 50px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
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
        }

        .btn {
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #dff0d8;
            border: 1px solid #c3e6cb;
            color: #3c763d;
        }

        .table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .btn-action {
            margin-right: 5px;
            padding: 6px 12px;
            font-size: 14px;
        }

        .btn-edit {
            background-color: #28a745;
            color: #fff;
            border: none;
        }

        .btn-edit:hover {
            background-color: #1e7e34;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            border: none;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        footer {
            text-align: center;
            margin-top: 170px;
            background-color: #007bff;
            color: #fff;
            
            padding: 10px 0;
        }

        
        .logout-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            margin-right: 10px;
            padding: 8px 16px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
  
    <script src="{{ asset('js/admin.js') }}"></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.dashboard') }}">Products</a></li>
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

    <footer>
        <p>&copy; {{ date('Y') }} Ronniel's merch store. All rights reserved.</p>
    </footer>
</body>
</html>
