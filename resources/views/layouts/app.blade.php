<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Beasiswa</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .progress-container {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
        .progress-step {
            flex: 1;
            padding: 15px;
            text-align: center;
            border: 2px solid #007bff;
            border-radius: 10px;
            margin: 0 5px;
        }
        .progress-step.active {
            background-color: #007bff;
            color: white;
        }
        .progress-step.completed {
            background-color: #28a745;
            color: white;
        }
        .back-button {
            margin-top: 15px;
        }
        header {
            margin-top: 20px;
        }
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <header class="container">
        <!-- Progress Navigation -->
        <div class="progress-container">
            <div class="progress-step {{ request()->is('/') ? 'active' : '' }}">
                <span>Pilihan Beasiswa</span>
            </div>
            <div class="progress-step {{ request()->is('form') ? 'active' : (session('completed') ? 'completed' : '') }}">
                <span>Daftar Beasiswa</span>
            </div>
            <div class="progress-step {{ request()->is('hasil') ? 'active' : '' }}">
                <span>Hasil</span>
            </div>
        </div>
    </header>

    <main class="container mt-5">
        @yield('content')
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
    
    <footer>
        <p>&copy; 2024 Website Beasiswa. All rights reserved.</p>
    </footer>
</body>
</html>
