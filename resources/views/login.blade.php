<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            background-image: url('../images/dashboard.jpeg')
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            padding: 50px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            margin-top: 100px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border: 2px solid #000000;
        }

        h1 {
            margin-top: 0;
        }

        .form-group {
            display: flex;
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-group input {
            width: 100%;
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .inputLabel {
            width: 40%;
        }

        .inputField {
            width: 60%;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            background-color: #4CAF50;
            color: #ffffff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form method="post" action="{{ route('login.submit') }}">
            @csrf
            @error('email')
                <div class="alert alert-danger my-3" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-group">
                <label class="inputLabel" label for="email">Email</label>
                <input class="inputField" input type="email" placeholder="Masukkan Username" id="email"
                    name="email" required>
            </div>
            <div class="form-group">
                <label class="inputLabel" label for="password">Password</label>
                <input class="inputField" input type="password" placeholder="Masukkan Password" id="password"
                    name="password" required>
            </div>
            <a href="{{ route('daftar') }}">Daftar</a>
            <button type="submit" class="button">Login</button>
        </form>
    </div>
</body>

</html>
