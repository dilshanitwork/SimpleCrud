<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @if (session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
    @endif
    <div style="border: 3px black;">


        <h3>Register</h3>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
            <input name="email" type="email" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>