<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 50px 40px;
            width: 100%;
            max-width: 450px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 40px;
            font-size: 32px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 14px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e1e8ed;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #4CAF50;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
        }

        .captcha-container {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .captcha-container img {
            border-radius: 8px;
            border: 2px solid #e1e8ed;
            height: 50px;
        }

        .refresh-btn {
            background: #4CAF50;
            border: none;
            padding: 12px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .refresh-btn:hover {
            background: #45a049;
            transform: rotate(180deg);
        }

        .refresh-btn svg {
            width: 24px;
            height: 24px;
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(76, 175, 80, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .error-message {
            background-color: #fee;
            color: #c33;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #c33;
            font-size: 14px;
        }

        .error-input {
            border-color: #c33 !important;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>

        @if ($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf

            <div class="form-group">
                <label for="username">Username:</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="{{ old('username') }}"
                    class="{{ $errors->has('username') ? 'error-input' : '' }}"
                    required
                    autofocus
                >
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="{{ $errors->has('password') ? 'error-input' : '' }}"
                    required
                >
            </div>

            <div class="form-group">
                <label>Captcha:</label>
                <div class="captcha-container">
                    <img src="{{ captcha_src('default') }}" alt="captcha" id="captcha-image">
                    <button type="button" class="refresh-btn" onclick="refreshCaptcha()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </button>
                </div>
                <input
                    type="text"
                    name="captcha"
                    placeholder="Enter Captcha"
                    class="{{ $errors->has('captcha') ? 'error-input' : '' }}"
                    required
                >
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>

    <script>
        function refreshCaptcha() {
            document.getElementById('captcha-image').src = '{{ captcha_src('default') }}?' + Math.random();
        }
    </script>
</body>
</html>
