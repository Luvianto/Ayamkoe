<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form method="POST" action="{{ route('') }}">
            @csrf
            @error('email')
                {{ $message }}
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
            <button type="submit" class="button">Submit</button>
        </form>
    </div>
</body>

</html>
