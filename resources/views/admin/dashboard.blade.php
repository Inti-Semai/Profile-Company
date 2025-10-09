<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Admin Panel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-green: #3B5B18;
            --dark-green: #31460B;
            --light-green: #A6B37D;
            --orange: #FF6B1E;
            --light-orange: #FB8B23;
            --text-dark: #000000;
            --text-light: #31460B;
            --bg-light: #f8f9fa;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--dark-green) 100%);
            min-height: 100vh;
        }

        .navbar {
            background: white;
            padding: 20px 40px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            color: var(--primary-green);
            font-size: 24px;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-info {
            color: var(--text-dark);
            font-weight: 500;
        }

        .btn-logout {
            padding: 10px 20px;
            background: linear-gradient(135deg, var(--primary-green) 0%, var(--dark-green) 100%);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 91, 24, 0.3);
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .card h3 {
            color: var(--text-dark);
            margin-bottom: 15px;
            font-size: 18px;
        }

        .card p {
            color: var(--text-light);
            line-height: 1.6;
        }

        .welcome-section {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .welcome-section h2 {
            color: var(--primary-green);
            margin-bottom: 15px;
            font-size: 32px;
        }

        .welcome-section p {
            color: var(--text-light);
            font-size: 16px;
            line-height: 1.6;
        }

        .stat-number {
            font-size: 36px;
            font-weight: bold;
            color: var(--primary-green);
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1>Admin Panel</h1>
        <div class="navbar-right">
            <span class="user-info">Welcome, {{ $admin->name }}</span>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-section">
            <h2>Dashboard Admin</h2>
            <p>Selamat datang di panel admin. Gunakan menu di bawah untuk mengelola konten website Anda.</p>
        </div>

        <div class="dashboard-cards">
            <div class="card">
                <h3>📊 Total Users</h3>
                <div class="stat-number">0</div>
                <p>Registered users in the system</p>
            </div>

            <div class="card">
                <h3>📝 Total Posts</h3>
                <div class="stat-number">0</div>
                <p>Published posts</p>
            </div>

            <div class="card">
                <h3>💬 Comments</h3>
                <div class="stat-number">0</div>
                <p>Total comments</p>
            </div>

            <div class="card">
                <h3>⚙️ Settings</h3>
                <p>Manage your website settings and configurations</p>
            </div>
        </div>

        <div class="dashboard-cards">
            <div class="card">
                <h3>👥 User Management</h3>
                <p>Add, edit, or remove users from the system</p>
            </div>

            <div class="card">
                <h3>📄 Content Management</h3>
                <p>Create and manage your website content</p>
            </div>

            <div class="card">
                <h3>🎨 Theme Settings</h3>
                <p>Customize the look and feel of your website</p>
            </div>

            <div class="card">
                <h3>📧 Email Templates</h3>
                <p>Manage email templates and notifications</p>
            </div>
        </div>
    </div>
</body>
</html>
