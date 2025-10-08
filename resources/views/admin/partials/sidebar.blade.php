<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo">
            <div class="logo-icon">
                <i class="fas fa-layer-group"></i>
            </div>
            <span class="logo-text">Admin Panel</span>
        </div>
        <button class="toggle-btn" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </button>
        <button class="expand-btn" onclick="toggleSidebar()" title="Expand Sidebar">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>

    <div class="sidebar-content">
        <div class="menu-section">
            <span class="menu-label">MENU</span>

            <!-- Dashboard -->
            <div class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="menu-link" data-title="Dashboard">
                    <i class="fas fa-th-large"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </div>

            <!-- Company Settings -->
            <div class="menu-item {{ request()->routeIs('admin.company-settings.*') ? 'active' : '' }}">
                <a href="{{ route('admin.company-settings.edit') }}" class="menu-link" data-title="Company Settings">
                    <i class="fas fa-building"></i>
                    <span class="menu-text">Company Settings</span>
                </a>
            </div>

            <!-- Gallery Management -->
            <div class="menu-item {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                <a href="{{ route('admin.gallery.index') }}" class="menu-link" data-title="Gallery">
                    <i class="fas fa-images"></i>
                    <span class="menu-text">Gallery</span>
                </a>
            </div>

            <!-- About Us Management -->
            <div class="menu-item {{ request()->routeIs('admin.about-us.*') ? 'active' : '' }}">
                <a href="{{ route('admin.about-us.edit') }}" class="menu-link" data-title="About Us">
                    <i class="fas fa-info-circle"></i>
                    <span class="menu-text">About Us</span>
                </a>
            </div>
        </div>
    </div>
</aside>

<style>
    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        height: 100vh;
        width: var(--sidebar-width);
        background-color: white;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
        overflow-y: auto;
        overflow-x: hidden;
        transition: all 0.3s ease;
        z-index: 1000;
    }

    .sidebar::-webkit-scrollbar {
        width: 6px;
    }

    .sidebar::-webkit-scrollbar-thumb {
        background-color: #E5E7EB;
        border-radius: 3px;
    }

    .sidebar.collapsed {
        width: 80px;
    }

    .sidebar.collapsed .logo-text,
    .sidebar.collapsed .menu-text,
    .sidebar.collapsed .menu-label,
    .sidebar.collapsed .badge-new,
    .sidebar.collapsed .dropdown-icon {
        opacity: 0;
        width: 0;
        overflow: hidden;
    }

    .sidebar.collapsed .submenu {
        display: none !important;
    }

    .sidebar.collapsed .sidebar-header {
        justify-content: center;
        padding: 20px 10px;
    }

    .sidebar.collapsed .logo {
        gap: 0;
    }

    .sidebar.collapsed .toggle-btn {
        display: none;
    }

    .sidebar.collapsed .expand-btn {
        display: flex;
    }

    .sidebar.collapsed .menu-link {
        justify-content: center;
        padding: 12px 10px;
        gap: 0;
    }

    .sidebar.collapsed .menu-link i {
        margin: 0;
    }

    .sidebar.collapsed .menu-item.active .menu-link {
        border-left: none;
        border-radius: 8px;
        margin: 0 10px;
    }

    /* Tooltip untuk collapsed sidebar */
    .sidebar.collapsed .menu-link {
        position: relative;
    }

    .sidebar.collapsed .menu-link:hover::after {
        content: attr(data-title);
        position: absolute;
        left: 100%;
        top: 50%;
        transform: translateY(-50%);
        margin-left: 15px;
        padding: 8px 12px;
        background-color: var(--dark-color);
        color: white;
        font-size: 13px;
        white-space: nowrap;
        border-radius: 6px;
        z-index: 1001;
        opacity: 0;
        animation: tooltipFadeIn 0.2s ease forwards;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .sidebar.collapsed .menu-link:hover::before {
        content: '';
        position: absolute;
        left: 100%;
        top: 50%;
        transform: translateY(-50%);
        margin-left: 8px;
        border: 6px solid transparent;
        border-right-color: var(--dark-color);
        z-index: 1001;
        opacity: 0;
        animation: tooltipFadeIn 0.2s ease forwards;
    }

    @keyframes tooltipFadeIn {
        from {
            opacity: 0;
            transform: translateY(-50%) translateX(-5px);
        }
        to {
            opacity: 1;
            transform: translateY(-50%) translateX(0);
        }
    }

    .sidebar-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px;
        border-bottom: 1px solid #E5E7EB;
        transition: all 0.3s ease;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .logo-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary-color), #7C3AED);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 20px;
    }

    .logo-text {
        font-size: 20px;
        font-weight: 700;
        color: var(--dark-color);
        white-space: nowrap;
        transition: opacity 0.3s ease;
    }

    .toggle-btn {
        background: none;
        border: none;
        font-size: 18px;
        color: #6B7280;
        cursor: pointer;
        padding: 8px;
        border-radius: 6px;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }

    .toggle-btn:hover {
        background-color: var(--light-color);
        color: var(--primary-color);
    }

    .expand-btn {
        display: none;
        background: linear-gradient(135deg, var(--primary-color), #7C3AED);
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 10px;
        color: white;
        cursor: pointer;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        transition: all 0.3s ease;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
    }

    .expand-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 16px rgba(79, 70, 229, 0.4);
    }

    .expand-btn:active {
        transform: scale(0.95);
    }

    .sidebar-content {
        padding: 20px 0;
    }

    .menu-section {
        margin-bottom: 30px;
    }

    .menu-label {
        display: block;
        padding: 10px 20px;
        font-size: 11px;
        font-weight: 600;
        color: #9CA3AF;
        letter-spacing: 0.5px;
        white-space: nowrap;
        transition: opacity 0.3s ease;
    }

    .sidebar.collapsed .menu-label {
        padding: 10px 0;
        text-align: center;
    }

    .menu-item {
        position: relative;
    }

    .menu-link {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 20px;
        color: #6B7280;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
    }

    .menu-link i {
        font-size: 18px;
        min-width: 20px;
        text-align: center;
        flex-shrink: 0;
    }

    .menu-link:hover {
        background-color: #F3F4F6;
        color: var(--primary-color);
    }

    .menu-item.active .menu-link {
        background-color: #EEF2FF;
        color: var(--primary-color);
        border-left: 3px solid var(--primary-color);
    }

    .menu-text {
        flex: 1;
        font-size: 14px;
        font-weight: 500;
        white-space: nowrap;
        transition: opacity 0.3s ease;
    }

    .badge-new {
        background: linear-gradient(135deg, var(--secondary-color), #059669);
        color: white;
        font-size: 10px;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 4px;
        white-space: nowrap;
        transition: opacity 0.3s ease;
    }

    .dropdown-icon {
        font-size: 12px;
        transition: transform 0.3s ease, opacity 0.3s ease;
        flex-shrink: 0;
    }

    .submenu {
        display: none;
        padding-left: 52px;
        margin-top: 5px;
    }

    .submenu-link {
        display: block;
        padding: 10px 20px;
        color: #6B7280;
        text-decoration: none;
        font-size: 13px;
        transition: all 0.3s;
        border-radius: 6px;
        margin: 0 10px;
    }

    .submenu-link:hover {
        background-color: #F3F4F6;
        color: var(--primary-color);
    }

    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(-100%);
        }

        .sidebar.mobile-open {
            transform: translateX(0);
        }
    }
</style>
