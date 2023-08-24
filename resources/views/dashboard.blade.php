<!DOCTYPE html>
<html>
<head>
    <title>Dasbor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('../images/dashboard.jpeg');
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 30px;
            border-width: 30px;
            margin-top: 100px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border: 2px solid #000000;
         }
    
        h1 {
            font-weight: bold;
            margin-top: 0;
            color: #4CAF50;
            font-size: 32px;
        }
    
        .button {
            display: inline-block;
            margin: 10px;
            padding: 15px 25px;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            background-color: rgba(76, 175, 80, 1);
            color: #ffffff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .button:hover {
          background-color: rgba(76, 175, 80, 0.9);
        }

        .navbar{
            opacity: 0.9;
        }

</style>
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat datang di PT Ayam Koe</h1>
        <a href="{{ route('login') }}" class="button">Masuk</a>
        <a href="{{ route('daftar') }}" class="button">Daftar</a>
    </div>
</body>
</html>