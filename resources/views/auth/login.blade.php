<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    @if ($errors->any())
        <div style="color: red;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="kode">Kode Dosen / Karyawan:</label>
        <input type="text" name="kode" required>
        <br>

        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
