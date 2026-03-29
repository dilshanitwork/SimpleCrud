<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header h2 {
            font-size: 32px;
            font-weight: 600;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .user-info a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border: 2px solid white;
            border-radius: 25px;
            transition: all 0.3s ease;
        }
        
        .user-info a:hover {
            background: white;
            color: #667eea;
        }
        
        .table-container {
            padding: 30px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid #e1e5e9;
        }
        
        th {
            background: #f8f9fa;
            font-weight: 600;
            color: #495057;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
        }
        
        tr:hover {
            background: #f8f9fa;
        }
        
        .actions {
            display: flex;
            gap: 10px;
        }
        
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-edit {
            background: #28a745;
            color: white;
        }
        
        .btn-edit:hover {
            background: #218838;
            transform: translateY(-2px);
        }
        
        .btn-delete {
            background: #dc3545;
            color: white;
        }
        
        .btn-delete:hover {
            background: #c82333;
            transform: translateY(-2px);
        }
        
        .current-user {
            color: #6c757d;
            font-style: italic;
        }
        
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
        
        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
        }
        
        .logout-btn {
            background: transparent;
            color: white;
            border: 2px solid white;
            padding: 8px 16px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .logout-btn:hover {
            background: white;
            color: #667eea;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Users Management</h2>
            <div class="user-info">
                <span>Welcome, {{ auth()->user()->name }}</span>
                <a href="/dashboard">Dashboard</a>
                <form method="POST" action="/logout" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>
        
        <div class="table-container">
            @if (session('success'))
                <div class="success-message">
                    {{ session('success') }}
                </div>
            @endif
            
            @if (session('error'))
                <div class="error-message">
                    {{ session('error') }}
                </div>
            @endif
            
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="actions">
                                    @if(auth()->user()->hasPermissionTo('edit-users') && auth()->user()->hasPermissionTo('delete-users') && $user->id !== auth()->user()->id)
                                        <a href="/users/{{ $user->id }}/edit" class="btn btn-edit">Edit</a>
                                        <form action="/users/{{ $user->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete">Delete</button>
                                        </form>
                                    @else
                                        <span class="current-user">
                                            @if($user->id === auth()->user()->id)
                                                Current User
                                            @else
                                                No Access
                                            @endif
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
