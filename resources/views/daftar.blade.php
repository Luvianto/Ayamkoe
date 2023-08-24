<!DOCTYPE html>
<html>

<head>
    <title>Halaman Daftar</title>
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
            padding: 20px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            margin-top: 100px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border: 2px solid #000000;
        }

        h1 {
            text-align: center;
            margin-top: 0;
        }

        .form-group {
            display: flex;
            margin-bottom: 10px;
        }

        .form-group label {
            display: block;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .inputLabel {
            text-align: left;
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
        <h1>Daftar Akun</h1>
        <form method="POST" action="{{ route('register.submit') }}">
            @csrf
            @if ($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
            <div class="form-group">
                <label class="inputLabel" label for="name">Name</label>
                <input class="inputField" input type="text" placeholder="Masukkan Nama" id="name" name="name"
                    required>
            </div>
            <div class="form-group">
                <label class="inputLabel" label for="alamat">Alamat</label>
                <input class="inputField" input type="text" placeholder="Masukkan Alamat" id="alamat"
                    name="alamat" required>
            </div>
            <div class="form-group">
                <label class="inputLabel" label for="noTelp">No. Telp</label>
                <input class="inputField" input type="text" placeholder="Masukkan No.Telp" id="noTelp"
                    name="noTelp" required>
            </div>
            <div class="form-group">
                <label class="inputLabel" label for="email">Email</label>
                <input class="inputField" input type="email" placeholder="Masukkan Email" id="email"
                    name="email" required>
            </div>
            <div class="form-group">
                <label class="inputLabel" label for="password">Password Baru</label>
                <input class="inputField" input type="password" placeholder="Masukkan Password" id="password"
                    name="password" required>
            </div>
            <button type="submit" class="button">Submit</button>
        </form>
    </div>
</body>

</html>
