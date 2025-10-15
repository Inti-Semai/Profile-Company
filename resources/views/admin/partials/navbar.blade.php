<nav class="navbar">
    <div class="navbar-left">
        <button class="mobile-toggle" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <div class="navbar-right">
        <!-- User Menu -->
        <div class="user-menu" onclick="toggleUserDropdown()">
            <div class="user-avatar">
                <img src="https://ui-avatars.com/api/?name={{ $admin->name }}&background=3B5B18&color=fff" alt="{{ $admin->name }}">
            </div>
            <div class="user-info">
                <span class="user-name">{{ $admin->name }}</span>
                <i class="fas fa-chevron-down"></i>
            </div>

            <!-- Dropdown -->
            <div class="user-dropdown" id="userDropdown">
                <div class="dropdown-header">
                    <div class="dropdown-avatar">
                        <img src="https://ui-avatars.com/api/?name={{ $admin->name }}&background=3B5B18&color=fff" alt="{{ $admin->name }}">
                    </div>
                    <div>
                        <div class="dropdown-name">{{ $admin->name }}</div>
                        <div class="dropdown-email">{{ $admin->email }}</div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">
                    <i class="fas fa-user"></i>
                    <span>Profil Saya</span>
                </a>

                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item logout-btn">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<style>
    .navbar {
        position: fixed;
        top: 0;
        left: var(--sidebar-width);
        right: 0;
        height: var(--navbar-height);
        background-color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 30px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        z-index: 999;
        transition: left 0.3s ease;
    }

    .sidebar-collapsed ~ .main-content .navbar {
        left: 80px;
    }

    .navbar-left {
        display: flex;
        align-items: center;
        gap: 20px;
        flex: 1;
    }

    .mobile-toggle {
        display: none;
        background: none;
        border: none;
        font-size: 20px;
        color: #31460B;
        cursor: pointer;
    }

    .search-box {
        position: relative;
        display: flex;
        align-items: center;
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 10px 16px;
        width: 100%;
        max-width: 500px;
        transition: all 0.3s;
    }

    .search-box:focus-within {
        box-shadow: 0 0 0 3px rgba(59, 91, 24, 0.1);
    }

    .search-box i {
        color: #9CA3AF;
        margin-right: 12px;
    }

    .search-box input {
        border: none;
        background: none;
        outline: none;
        width: 100%;
        font-size: 14px;
        color: #31460B;
    }

    .search-box input::placeholder {
        color: #9CA3AF;
    }

    .shortcut {
        background-color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        color: #6B7280;
        border: 1px solid #E5E7EB;
    }

    .navbar-right {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .icon-btn {
        background: none;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s;
        color: #6B7280;
        position: relative;
    }

    .icon-btn:hover {
        background-color: #f8f9fa;
        color: #3B5B18;
    }

    .notification-btn {
        position: relative;
    }

    .notification-badge {
        position: absolute;
        top: 8px;
        right: 8px;
        background: linear-gradient(135deg, #FF6B1E, #FB8B23);
        color: white;
        font-size: 10px;
        font-weight: 600;
        padding: 2px 5px;
        border-radius: 10px;
        min-width: 16px;
        text-align: center;
    }

    .user-menu {
        position: relative;
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 8px 12px;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s;
    }

    .user-menu:hover {
        background-color: #f8f9fa;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid #A6B37D;
    }

    .user-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .user-name {
        font-size: 14px;
        font-weight: 600;
        color: #31460B;
    }

    .user-info i {
        font-size: 12px;
        color: #9CA3AF;
    }

    .user-dropdown {
        position: absolute;
        top: 100%;
        right: 0;
        margin-top: 10px;
        width: 280px;
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        display: none;
        z-index: 1000;
        border-top: 3px solid #3B5B18;
    }

    .dropdown-header {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 20px;
    }

    .dropdown-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid #A6B37D;
    }

    .dropdown-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .dropdown-name {
        font-size: 15px;
        font-weight: 600;
        color: #31460B;
        margin-bottom: 4px;
    }

    .dropdown-email {
        font-size: 13px;
        color: #6B7280;
    }

    .dropdown-divider {
        height: 1px;
        background-color: #E5E7EB;
        margin: 8px 0;
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 20px;
        color: #6B7280;
        text-decoration: none;
        transition: all 0.3s;
        width: 100%;
        border: none;
        background: none;
        text-align: left;
        cursor: pointer;
        font-size: 14px;
    }

    .dropdown-item:hover {
        background-color: rgba(59, 91, 24, 0.05);
        color: #3B5B18;
    }

    .dropdown-item i {
        width: 18px;
        text-align: center;
    }

    .logout-btn {
        color: #FF6B1E;
    }

    .logout-btn:hover {
        background-color: rgba(255, 107, 30, 0.1);
        color: #FF6B1E;
    }

</style>

<style>
/* Responsive improvements for navbar */
@media (max-width: 1200px) {
    .navbar {
        padding: 0 18px;
    }
    .user-dropdown {
        width: 220px;
    }
}
@media (max-width: 992px) {
    .navbar {
        padding: 0 10px;
    }
    .user-avatar, .dropdown-avatar {
        width: 32px;
        height: 32px;
    }
    .dropdown-header {
        padding: 12px;
    }
    .dropdown-name {
        font-size: 13px;
    }
    .dropdown-email {
        font-size: 11px;
    }
}
@media (max-width: 768px) {
    .navbar {
        left: 0;
        padding: 0 8px;
        height: 54px;
    }
    .mobile-toggle {
        display: block;
    }
    .search-box {
        max-width: 120px;
        padding: 7px 8px;
    }
    .shortcut {
        display: none;
    }
    .user-name {
        display: none;
    }
    .user-avatar, .dropdown-avatar {
        width: 28px;
        height: 28px;
    }
    .user-dropdown {
        width: 160px;
        right: -30px;
    }
    .dropdown-header {
        padding: 8px;
        gap: 6px;
    }
    .dropdown-item {
        padding: 8px 12px;
        font-size: 12px;
    }
}
@media (max-width: 480px) {
    .navbar {
        padding: 0 2vw;
        height: 48px;
    }
    .user-dropdown {
        width: 98vw;
        min-width: 0;
        right: -10vw;
    }
    .dropdown-header {
        padding: 6px 2vw;
    }
    .dropdown-item {
        padding: 7px 8px;
        font-size: 11px;
    }
}
</style>

<script>
    function toggleDarkMode() {
        // Implement dark mode toggle
        alert('Dark mode coming soon!');
    }
</script>
