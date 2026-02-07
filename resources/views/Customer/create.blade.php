<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Create Customer</h1>

    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
  
    <div>
    <form action="{{ route('customer.store') }}" method="post">
        @csrf
        @method('POST')
        <label for="">Name:</label>
        <input type="text" name="name" placeholder="Name"><br><br>
        <label>E-mail:</label>
        <input type="email" name="email" placeholder="Email"><br><br>
        <label>Password:</label>
        <input type="password" name="password" placeholder="Password"><br><br>
        <label>Gender:</label>
        <input type="Gender" name="gender" placeholder="Gender"><br><br>
        <label>Age:</label>
        <input type="integer" name="age" placeholder="Age"><br><br>
        <label>Phone:</label>
        <input type="text" name="phone" placeholder="phone"><br><br>
        <label>Address:</label>
        <input type="text" name="address" placeholder="Address"><br><br>
        <input type="submit" value="Create New Customer">
    </form>
    </div>
    
</body>
</html>