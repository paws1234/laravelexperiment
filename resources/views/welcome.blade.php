<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Experiment Project</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f0f0f0;
            font-family: 'Nunito', sans-serif;
        }

        .text-sm {
            font-size: 14px;
        }

        .text-gray-700, .dark:text-gray-500 {
            color: #333;
        }

        .dark:text-gray-500 {
            color: #777;
        }

        .underline {
            text-decoration: underline;
        }

        .text-3xl {
            font-size: 28px;
        }

        .font-semibold {
            font-weight: 600;
        }

        .text-gray-900, .dark:text-white {
            color: #333;
        }

        .dark:text-gray-400 {
            color: #777;
        }

        .max-w-6xl {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        @media (max-width: 640px) {
            body {
                padding: 20px;
            }
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #333;
            color: #fff;
            padding: 10px 20px;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        .navbar a:hover {
            text-decoration: underline;
        }
        
        
        .project-description {
            margin-top: 20px;
        }
        
       
        .project-features {
            margin-top: 20px;
            text-align: left;
        }
        
    
        .feature-section {
            margin-top: 20px;
        }

      
        .feature-icon {
            font-size: 24px;
            margin-right: 10px;
        }
    </style>
</head>
<body class="antialiased">
    <div class="navbar">
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ url('/home') }}" class="text-sm">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <div>
                    <h1 class="text-3xl font-semibold text-gray-900 dark:text-white">Welcome to Laravel Experiment Project</h1>
                    <p class="mt-4 text-gray-600 dark:text-gray-400 text-lg project-description">
                        This experimental project showcases the capabilities of Laravel with the following features:
                    </p>
                    <div class="project-features">
                        
                        <div class="feature-section">
                            <span class="feature-icon">📱</span> Real-time Chat Functionality
                        </div>
                    
                        <div class="feature-section">
                            <span class="feature-icon">💳</span> E-commerce Functionality
                        </div>
                        
                        <div class="feature-section">
                            <span class="feature-icon">📝</span> Posting Functionality
                        </div>
                        <div class="feature-section">
                            <span class="feature-icon">👍</span> Voting functionality
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
