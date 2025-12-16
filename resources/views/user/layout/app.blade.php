<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>InstaApp</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #000;
            color: #fff;
        }

        .app {
            display: flex;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            background: #000;
            border-right: 1px solid #262626;
            position: fixed;
        }

        .content {
            margin-left: 240px;
            width: calc(100% - 240px);
            display: flex;
            justify-content: center;
        }

        .feed {
            width: 470px;
            padding: 30px 0;
        }

        .nav-link {
            color: #fff;
            border-radius: 12px;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 16px;
        }

        .nav-link:hover,
        .nav-link.active {
            background: #121212;
            color: #fff;
        }

        .post {
            border-bottom: 1px solid #262626;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }

        .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #444;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="app">
    @include('user.layout.sidebar')

    <div class="content">
        <div class="feed">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>
