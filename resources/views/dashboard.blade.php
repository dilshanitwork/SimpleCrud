<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            padding: 60px;
            text-align: center;
            max-width: 600px;
            width: 100%;
        }
        
        h2 {
            color: #333;
            margin-bottom: 20px;
            font-size: 36px;
            font-weight: 600;
        }
        
        .welcome-message {
            color: #666;
            font-size: 20px;
            margin-bottom: 40px;
        }
        
        .user-name {
            color: #667eea;
            font-weight: 600;
        }
        
        .actions {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-bottom: 30px;
        }
        
        .btn {
            padding: 14px 28px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
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
            transform: translateY(-2px);
        }
        
        .logout-form {
            display: inline-block;
        }
        
        .logout-btn {
            background: transparent;
            color: #dc3545;
            border: 2px solid #dc3545;
            padding: 12px 24px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .logout-btn:hover {
            background: #dc3545;
            color: white;
            transform: translateY(-2px);
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }
        
        .stat-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
        }
        
        .stat-number {
            font-size: 32px;
            font-weight: 700;
            color: #667eea;
        }
        
        .stat-label {
            color: #666;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Dashboard</h2>
        
        <div class="welcome-message">
            Welcome back, <span class="user-name">{{ auth()->user()->name }}</span>!
        </div>
        
        <div class="stats">
            <div class="stat-card">
                <div class="stat-number">{{ \App\Models\User::count() }}</div>
                <div class="stat-label">Total Users</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ auth()->user()->id }}</div>
                <div class="stat-label">Your ID</div>
            </div>
        </div>
        
        <div class="actions">
            <a href="/users" class="btn btn-primary">Manage Users</a>
        </div>
        
        <form method="POST" action="/logout" class="logout-form">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</body>
</html>