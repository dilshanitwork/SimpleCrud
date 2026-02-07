<!DOCTYPE html>
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

    <h1>Edit Customer</h1>

    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
  
    <div>
    <form action="{{ route('customer.update',['customer'=>$customer]) }}" method="post">
        @csrf
        @method('PUT')
        <label for="">Name:</label>
        <input type="text" name="name" placeholder="Name" value="{{ $customer->name }}"><br><br>
        <label>E-mail:</label>
        <input type="email" name="email" placeholder="Email" value="{{ $customer->email }}"><br><br>
        <label>Password:</label>
        <input type="password" name="password" placeholder="Password" value="{{ $customer->password }}"><br><br>
        <label>Gender:</label>
        <input type="Gender" name="gender" placeholder="Gender" value="{{ $customer->gender }}"><br><br>
        <label>Age:</label>
        <input type="integer" name="age" placeholder="Age" value="{{ $customer->age }}"><br><br>
        <label>Phone:</label>
        <input type="text" name="phone" placeholder="phone" value="{{ $customer->phone }}"><br><br>
        <label>Address:</label>
        <input type="text" name="address" placeholder="Address" value="{{ $customer->address }}"><br><br>
        <input type="submit" value="Edit Customer">
    </form>
    </div>
    
</body>
</html>