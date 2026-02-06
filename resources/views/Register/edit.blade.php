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

    <h1>Edit Registration</h1>

    @if ($errors->any())
    <div style="color: red; margin: 1em 0;">
        <ul style="margin: 0; padding-left: 1.2em;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('register.update',['register' => $register]) }}" method="post">
        @csrf 
        @method('PUT')
        <input type="text" name="name" placeholder="Name" value="{{ $register->name }}">
        <input type="email" name="email" placeholder="Email" value="{{ $register->email }}">
        <input type="password" name="password" placeholder="Password" value="{{ $register->password }}">
        <input type="submit" value="Update">
    </form>
</body>
</html>