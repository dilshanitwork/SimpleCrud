<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            padding: 40px;
            width: 100%;
            max-width: 500px;
        }
        
        h2 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
            font-size: 28px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        
        .btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }
        
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        
        .btn-secondary:hover {
            background: #5a6268;
        }
        
        .back-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .back-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
        
        .back-link a:hover {
            text-decoration: underline;
        }
        
        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        
        @if ($errors->any())
            <div style="color: #dc3545; margin-bottom: 20px;">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        
        <form action="/users/{{ $user->id }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password (leave blank to keep current)</label>
                <input type="password" id="password" name="password">
            </div>
            
            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
        
        <div class="back-link">
            <a href="/users">← Back to Users</a>
        </div>
    </div>
</body>
</html>
