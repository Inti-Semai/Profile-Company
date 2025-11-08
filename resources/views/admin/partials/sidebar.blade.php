<div id="sidebar-overlay" style="display:none;position:fixed;z-index:1999;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.25);transition:opacity 0.3s;"></div>
<aside class="sidebar" id="sidebar" tabindex="-1" aria-label="Sidebar Navigation">
    <div class="sidebar-header">
        <div class="logo">
            <div class="logo-icon">
                <i class="fas fa-layer-group"></i>
            </div>
            <span class="logo-text">Panel Admin</span>
        </div>
        <button class="toggle-btn" onclick="toggleSidebar()" style="z-index:2100;position:relative;display:inline-flex;align-items:center;justify-content:center;">
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
                <a href="{{ route('admin.dashboard') }}" class="menu-link" data-title="Dasbor">
                    <i class="fas fa-th-large"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </div>

            <!-- Pengaturan Perusahaan -->
            <div class="menu-item {{ request()->routeIs('admin.company-settings.*') ? 'active' : '' }}">
                <a href="{{ route('admin.company-settings.edit') }}" class="menu-link" data-title="Pengaturan Perusahaan">
                    <i class="fas fa-building"></i>
                    <span class="menu-text">Pengaturan Perusahaan</span>
                </a>
            </div>

            <!-- Galeri -->
            <div class="menu-item {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                <a href="{{ route('admin.gallery.index') }}" class="menu-link" data-title="Galeri">
                    <i class="fas fa-images"></i>
                    <span class="menu-text">Galeri</span>
                </a>
            </div>

            <!-- Tentang Kami -->
            <div class="menu-item {{ request()->routeIs('admin.about-us.*') ? 'active' : '' }}">
                <a href="{{ route('admin.about-us.edit') }}" class="menu-link" data-title="Tentang Kami">
                    <i class="fas fa-info-circle"></i>
                    <span class="menu-text">Tentang Kami</span>
                </a>
            </div>

            <!-- Produk -->
            <div class="menu-item {{ request()->routeIs('admin.products.index') ? 'active' : '' }}">
                <a href="{{ route('admin.products.index') }}" class="menu-link" data-title="Produk">
                    <i class="fas fa-box"></i>
                    <span class="menu-text">Produk</span>
                </a>
            </div>

            <!-- Profil Saya -->
            <div class="menu-item {{ request()->routeIs('admin.profile.edit') ? 'active' : '' }}">
                <a href="{{ route('admin.profile.edit') }}" class="menu-link" data-title="Profil Saya">
                    <i class="fas fa-user"></i>
                    <span class="menu-text">Profil Saya</span>
                </a>
            </div>
        </div>
    </div>
</aside>

<style>
    /* Compact sidebar for all screens */
    .sidebar {
        min-width: 64px;
        width: 220px;
        max-width: 90vw;
        background: #fff;
        box-shadow: 2px 0 10px rgba(0,0,0,0.05);
        overflow-y: auto;
        overflow-x: hidden;
        z-index: 2000;
        transition: all 0.3s;
    }
    .sidebar-content {
        max-height: calc(100vh - 60px);
        overflow-y: auto;
        display: block;
    }
    .sidebar.mobile-open .sidebar-content {
        display: block !important;
        max-height: calc(100vh - 60px);
        overflow-y: auto;
    }
    @media (max-width: 1024px) {
        .sidebar {
            width: 180px;
        }
    }
    @media (max-width: 768px) {
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 80vw;
            min-width: 0;
            max-width: 320px;
            height: 100vh;
            z-index: 2000;
            transform: translateX(-100%);
            transition: transform 0.3s cubic-bezier(.4,0,.2,1);
            box-shadow: 2px 0 16px rgba(0,0,0,0.12);
        }
        .sidebar.mobile-open {
            transform: translateX(0);
        }
        .sidebar-header {
            padding: 14px 8px;
        }
        .sidebar-content {
            padding: 8px 0;
        }
        .menu-link {
            padding: 10px 10px;
            font-size: 13px;
        }
        .logo-text {
            font-size: 15px;
        }
        .toggle-btn {
            display: inline-flex !important;
        }
    }
    @media (max-width: 480px) {
        .sidebar {
            width: 100vw;
            max-width: 100vw;
        }
        .sidebar-header {
            padding: 10px 4px;
        }
        .menu-link {
            padding: 8px 6px;
            font-size: 12px;
        }
        .logo-text {
            font-size: 13px;
        }
    }
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
        background-color: #A6B37D;
        border-radius: 3px;
    }

    .sidebar::-webkit-scrollbar-thumb:hover {
        background-color: #3B5B18;
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
        background-color: #31460B;
        color: white;
        font-size: 13px;
        white-space: nowrap;
        border-radius: 6px;
        z-index: 1001;
        opacity: 0;
        animation: tooltipFadeIn 0.2s ease forwards;
        box-shadow: 0 4px 12px rgba(59, 91, 24, 0.3);
    }

    .sidebar.collapsed .menu-link:hover::before {
        content: '';
        position: absolute;
        left: 100%;
        top: 50%;
        transform: translateY(-50%);
        margin-left: 8px;
        border: 6px solid transparent;
        border-right-color: #31460B;
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
        background: linear-gradient(135deg, #3B5B18, #31460B);
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
        color: #31460B;
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
        background-color: #f8f9fa;
        color: #3B5B18;
    }

    .expand-btn {
        display: none;
        background: linear-gradient(135deg, #FF6B1E, #FB8B23);
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
        box-shadow: 0 4px 12px rgba(255, 107, 30, 0.3);
    }

    .expand-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 16px rgba(255, 107, 30, 0.4);
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
        background-color: rgba(59, 91, 24, 0.05);
        color: #3B5B18;
    }

    .menu-item.active .menu-link {
        background-color: rgba(59, 91, 24, 0.1);
        color: #3B5B18;
        border-left: 3px solid #FF6B1E;
        font-weight: 600;
    }

    .menu-text {
        flex: 1;
        font-size: 14px;
        font-weight: 500;
        white-space: nowrap;
        transition: opacity 0.3s ease;
    }

    .badge-new {
        background: linear-gradient(135deg, #FF6B1E, #FB8B23);
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
        background-color: rgba(59, 91, 24, 0.05);
        color: #3B5B18;
    }


</style>
<script>
// Sidebar mobile toggle logic with overlay and compact mode
function toggleSidebar(forceClose = false) {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    if (window.innerWidth <= 768) {
        if (forceClose) {
            sidebar.classList.remove('mobile-open');
            overlay.style.display = 'none';
        } else {
            const isOpen = sidebar.classList.toggle('mobile-open');
            overlay.style.display = isOpen ? 'block' : 'none';
        }
    } else {
        sidebar.classList.toggle('collapsed');
    }
}

// Ensure sidebar is always compact and functional
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    const links = sidebar.querySelectorAll('.menu-link');
    links.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                sidebar.classList.remove('mobile-open');
                overlay.style.display = 'none';
            }
        });
    });
    // Overlay click closes sidebar
    overlay.addEventListener('click', function() {
        toggleSidebar(true);
    });
    // On resize, always hide overlay if not mobile
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            overlay.style.display = 'none';
            sidebar.classList.remove('mobile-open');
        }
    });
    // Always show hamburger on mobile
    const toggleBtn = document.querySelector('.toggle-btn');
    if (toggleBtn) {
        toggleBtn.style.display = 'inline-flex';
    }
});
</script>

<style>
/* Responsive improvements for sidebar */
@media (max-width: 1200px) {
    .sidebar {
        width: 220px;
    }
}
@media (max-width: 992px) {
    .sidebar {
        width: 180px;
    }
    .logo-text, .menu-text {
        font-size: 13px;
    }
}
@media (max-width: 768px) {
    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        width: 80vw;
        min-width: 0;
        max-width: 320px;
        height: 100vh;
        z-index: 2000;
        transform: translateX(-100%);
        transition: transform 0.3s cubic-bezier(.4,0,.2,1);
        box-shadow: 2px 0 16px rgba(0,0,0,0.12);
    }
    .sidebar.mobile-open {
        transform: translateX(0);
    }
    .sidebar-header {
        padding: 16px 10px;
    }
    .sidebar-content {
        padding: 10px 0;
    }
    .menu-link {
        padding: 10px 12px;
        font-size: 13px;
    }
    .logo-text {
        font-size: 15px;
    }
}
@media (max-width: 480px) {
    .sidebar {
        width: 100vw;
        max-width: 100vw;
    }
    .sidebar-header {
        padding: 12px 6px;
    }
    .menu-link {
        padding: 9px 8px;
        font-size: 12px;
    }
    .logo-text {
        font-size: 13px;
    }
}
</style>
