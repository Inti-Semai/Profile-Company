<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - {{ $setting->company_name ?? 'PT. Inti Semai Kaliandra' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
        }

        /* Navbar - Same as index */
        .navbar {
            background: rgba(255, 255, 255, 0.10);
            backdrop-filter: blur(5px);
            padding: 20px 80px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(5px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.06);
            padding: 15px 80px;
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1600px;
            margin: 0 auto;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            font-size: 16px;
            color: var(--text-dark);
            transition: color 0.3s ease;
            text-decoration: none;
        }

        .navbar.scrolled .logo {
            color: var(--text-dark);
        }

        .logo-icon {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-icon svg {
            width: 100%;
            height: 100%;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 40px;
            align-items: center;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .nav-menu a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s;
            position: relative;
            padding-bottom: 8px;
        }

        .navbar.scrolled .nav-menu a {
            color: var(--text-dark);
        }

        .nav-menu a:hover {
            color: var(--primary-green);
        }

        .navbar.scrolled .nav-menu a:hover {
            color: var(--primary-green);
        }

        .nav-menu a.active {
            color: var(--text-dark);
            border-bottom: 3px solid var(--primary-green);
        }

        .navbar.scrolled .nav-menu a.active {
            border-bottom: 3px solid var(--primary-green);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .language-selector {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 700;
            font-size: 14px;
            color: var(--text-dark);
            cursor: pointer;
            transition: color 0.3s;
            text-decoration: none;
        }

        .navbar.scrolled .language-selector {
            color: var(--text-dark);
        }

        .language-selector:hover {
            color: var(--primary-green);
        }

        .navbar.scrolled .language-selector:hover {
            color: var(--primary-green);
        }

        .search-box {
            display: flex;
            align-items: center;
            background: rgba(232, 232, 232, 0.7);
            border-radius: 30px;
            padding: 10px 20px;
            gap: 12px;
            transition: all 0.3s;
            width: 280px;
            backdrop-filter: blur(5px);
        }

        .navbar.scrolled .search-box {
            background: #E8E8E8;
        }

        .search-box:hover {
            background: rgba(220, 220, 220, 0.8);
        }

        .navbar.scrolled .search-box:hover {
            background: #DCDCDC;
        }

        .search-input {
            border: none;
            background: transparent;
            outline: none;
            flex: 1;
            font-size: 13px;
            color: var(--text-dark);
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
        }

        .search-input::placeholder {
            color: #888;
            font-weight: 400;
        }

        .search-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: none;
            background: transparent;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            padding: 0;
            flex-shrink: 0;
        }

        .search-btn:hover {
            background: rgba(0, 0, 0, 0.05);
        }

        .search-btn svg {
            width: 20px;
            height: 20px;
            stroke: #333;
            fill: none;
            stroke-width: 2;
            transition: stroke 0.3s;
        }

        .navbar.scrolled .search-btn svg {
            stroke: #333;
        }

        .search-btn:hover svg {
            stroke: var(--primary-green);
        }

        .navbar.scrolled .search-btn:hover svg {
            stroke: var(--primary-green);
        }

        /* Hamburger Menu */
        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 8px;
            background: transparent;
            border: none;
            z-index: 1001;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: var(--text-dark);
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg) translate(8px, 8px);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        /* Mobile Menu Overlay */
        .mobile-menu-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .mobile-menu-overlay.active {
            display: block;
            opacity: 1;
            pointer-events: auto;
        }

        /* Hero Section */
        .hero {
            margin-top: 0;
            padding-top: 100px;
            height: 50vh;
            min-height: 400px;
            background: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 400"><rect fill="%233B5B18" width="1200" height="400"/></svg>');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            text-align: right;
            color: #ffffff;
            position: relative;
            padding-left: 80px;
            padding-right: 80px;
        }

        .hero-content {
            max-width: 800px;
            padding: 0;
        }

        .hero-content h1 {
            font-size: 52px;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 2px 4px 12px rgba(0,0,0,0.5);
            line-height: 1.2;
            letter-spacing: -0.5px;
        }

        /* Contact Section */
        .contact-section {
            background: var(--bg-light);
            padding: 80px 50px;
        }

        .contact-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1.3fr;
            gap: 60px;
            align-items: start;
        }

        .contact-info {
            background: white;
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .contact-info h2 {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 30px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 25px;
        }

        .info-icon {
            width: 40px;
            height: 40px;
            background: var(--light-green);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .info-icon svg {
            width: 20px;
            height: 20px;
            fill: var(--primary-green);
        }

        .info-content h4 {
            font-size: 16px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .info-content p {
            font-size: 15px;
            color: var(--text-light);
            line-height: 1.6;
        }

        .map-container {
            margin-top: 30px;
            border-radius: 15px;
            overflow: hidden;
            height: 250px;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .contact-form-wrapper {
            background: white;
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .contact-form-wrapper h2 {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-green);
            margin-bottom: 10px;
        }

        .contact-form-wrapper p {
            color: var(--text-light);
            margin-bottom: 30px;
            font-size: 15px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 15px;
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .form-group label .required {
            color: #dc3545;
        }

        .form-control {
            width: 100%;
            padding: 14px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 15px;
            font-family: 'Poppins', sans-serif;
            transition: all 0.3s;
            background: #fff;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-green);
            box-shadow: 0 0 0 3px rgba(59, 91, 24, 0.1);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: var(--orange);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'Poppins', sans-serif;
        }

        .submit-btn:hover {
            background: var(--light-orange);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 30, 0.3);
        }

        .alert {
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Footer */
        .footer {
            background: var(--dark-green);
            color: white;
            padding: 60px 50px 30px;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2.5fr 0.6fr 1.5fr;
            gap: 20px;
            margin-bottom: 40px;
        }

        .footer-about h3 {
            font-size: 25px;
            font-weight: 700;
            margin-bottom: 15px;
            text-transform: none;
            letter-spacing: 0.5px;
        }

        .footer-about h4 {
            font-size: 16px;
            font-weight: 500;
            margin-top: 20px;
            margin-bottom: 15px;
        }

        .footer-about p {
            font-size: 18px;
            line-height: 1.8;
            color: rgba(255,255,255,0.9);
            margin-bottom: 0px;
        }

        .footer-section h3 {
            font-size: 25px;
            font-weight: 700;
            margin-bottom: 20px;
            text-transform: none;
            letter-spacing: 0.5px;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 12px;
        }

        .footer-section a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: var(--light-orange);
        }

        .map-container {
            margin-top: 15px;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }

        .map-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
            pointer-events: none;
        }

        .map-container iframe {
            width: 50%;
            height: 220px;
            border: 0;
            border-radius: 10px;
        }

        .social-links {
            display: flex;
            gap: 12px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            color: white;
            text-decoration: none;
        }

        .social-icon:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        .social-icon.youtube {
            background: #FF0000;
        }

        .social-icon.telegram {
            background: #0088cc;
        }

        .social-icon.instagram {
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        }

        .social-icon.tiktok {
            background: #000000;
        }

        .social-icon.facebook {
            background: #1877F2;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.6);
            font-size: 14px;
        }

        /* Floating WhatsApp Button */
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 999;
            animation: pulse 2s infinite;
        }

        .whatsapp-button {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #3B5B18;
            color: #FFFFFF;
            padding: 14px 28px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 4px 20px rgba(59, 91, 24, 0.4);
            transition: all 0.3s ease;
            border: 2px solid #A6B37D;
        }

        .whatsapp-button:hover {
            background: #31460B;
            transform: translateY(-3px);
            box-shadow: 0 6px 30px rgba(59, 91, 24, 0.6);
            border-color: #A6B37D;
        }

        .whatsapp-icon {
            width: 28px;
            height: 28px;
            fill: #FFFFFF;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        /* Tablet Portrait & Small Desktop (768px - 1023px) */
        @media (max-width: 1023px) {
            .hero {
                justify-content: center;
                text-align: center;
            }

            .hero-content {
                max-width: 100%;
            }

            .navbar {
                padding: 15px 30px;
            }

            .navbar.scrolled {
                padding: 12px 30px;
            }

            .navbar-container {
                flex-wrap: nowrap;
                justify-content: space-between;
            }

            .logo {
                font-size: 14px;
            }

            .logo-icon {
                width: 36px;
                height: 36px;
            }
            /* Fix: avoid nav overlap with right-side controls at intermediate widths */
            .nav-menu {
                position: static;
                left: auto;
                transform: none;
                margin: 0 auto;
                justify-content: center;
            }

            /* Show hamburger on tablet portrait */
            .hamburger {
                display: flex;
                order: 3;
            }

            /* Mobile menu slide-in */
            .nav-menu {
                position: fixed;
                top: 0;
                right: -100%;
                width: 280px;
                height: 100vh;
                background: white;
                flex-direction: column;
                /* reduced top padding so items start near the top when sidebar opens */
                padding: 40px 30px 30px;
                box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
                transition: right 0.3s ease;
                z-index: 1000;
                gap: 0;
                transform: none;
                left: auto;
                align-items: flex-start;
                justify-content: flex-start;
            }

            .nav-menu.active {
                right: 0;
            }

            .nav-menu li {
                width: 100%;
                border-bottom: 1px solid #f0f0f0;
            }

            .nav-menu a {
                display: block;
                padding: 15px 0;
                font-size: 16px;
                width: 100%;
                border-bottom: none !important;
            }

            .nav-menu a.active {
                color: var(--primary-green);
                border-bottom: none !important;
                border-left: 3px solid var(--primary-green);
                padding-left: 10px;
            }

            .mobile-menu-overlay {
                display: block;
            }

            .nav-right {
                gap: 10px;
                order: 2;
                margin-right: 10px;
            }

            .search-box {
                width: 180px;
            }

            .search-input {
                font-size: 13px;
            }

            .hero {
                padding-left: 30px;
                padding-right: 30px;
                min-height: 350px;
                height: 45vh;
            }

            .hero-content h1 {
                font-size: 40px;
            }

            .contact-section {
                padding: 50px 30px;
            }

            .contact-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .contact-info,
            .contact-form-wrapper {
                padding: 40px 30px;
            }

            .footer {
                padding: 50px 30px 25px;
            }

            .footer-container {
                grid-template-columns: 2fr 1fr 1.5fr;
                gap: 30px;
            }
        }

        /* Small mobile tweaks to match ID navbar */
        @media (max-width: 475px) {
            .search-box { display: none !important; visibility: hidden !important; opacity: 0 !important; pointer-events: none !important; }
            .hamburger { display: flex !important; position: absolute !important; right: 12px !important; top: 50% !important; transform: translateY(-50%) !important; padding: 6px !important; z-index: 1102 !important; }
            .language-selector { position: absolute !important; right: 60px !important; top: 50% !important; transform: translateY(-50%) !important; }
        }

        @media (max-width: 375px) {
            .navbar-container { gap: 8px; }
            .logo { font-size: 12px; }
            .nav-menu a { font-size: 12px; }
            .hamburger { margin-right: 6px !important; right: 12px !important; }
            .nav-menu { width: min(260px, 80vw) !important; padding: 60px 18px 20px !important; }
        }

        @media (max-width: 320px) {
            .hamburger span { width: 20px !important; height: 2px !important; }
            .nav-menu { width: min(240px, 82vw) !important; padding: 60px 12px 18px !important; }
        }

        /* Mobile Landscape & Small Tablet (481px - 767px) */
        @media (max-width: 767px) {
            .navbar {
                padding: 12px 20px;
            }

            .navbar.scrolled {
                padding: 10px 20px;
            }

            .navbar-container {
                flex-wrap: nowrap;
                gap: 15px;
                justify-content: space-between;
            }

            .logo {
                font-size: 14px;
            }

            .logo-icon {
                width: 35px;
                height: 35px;
            }

            /* Show hamburger on mobile */
            .hamburger {
                display: flex;
                order: 3;
            }

            /* Mobile menu slide-in */
            .nav-menu {
                position: fixed;
                top: 0;
                right: -100%;
                width: 280px;
                height: 100vh;
                background: white;
                flex-direction: column;
                /* reduced top padding so items start near the top when sidebar opens */
                padding: 40px 30px 30px;
                box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
                transition: right 0.3s ease;
                z-index: 1000;
                gap: 0;
                transform: none;
                left: auto;
                align-items: flex-start;
                justify-content: flex-start;
            }

            .nav-menu.active {
                right: 0;
            }

            .nav-menu li {
                width: 100%;
                border-bottom: 1px solid #f0f0f0;
            }

            .nav-menu a {
                display: block;
                padding: 15px 0;
                font-size: 16px;
                width: 100%;
                border-bottom: none !important;
            }

            .nav-menu a.active {
                color: var(--primary-green);
                border-bottom: none !important;
                border-left: 3px solid var(--primary-green);
                padding-left: 10px;
            }

            .mobile-menu-overlay {
                display: block;
            }

            .nav-right {
                gap: 10px;
                order: 2;
            }

            .search-box {
                width: 180px;
                padding: 8px 15px;
            }

            .search-input {
                font-size: 12px;
            }

            .search-btn {
                width: 30px;
                height: 30px;
            }

            .language-selector {
                font-size: 13px;
            }

            .hero {
                padding-left: 20px;
                padding-right: 20px;
                min-height: 320px;
                height: 40vh;
                text-align: center;
                justify-content: center;
            }

            .hero-content {
                max-width: 100%;
            }

            .hero-content h1 {
                font-size: 32px;
            }

            .contact-section {
                padding: 40px 20px;
            }

            .contact-info,
            .contact-form-wrapper {
                padding: 30px 20px;
            }

            .contact-info h2,
            .contact-form-wrapper h2 {
                font-size: 24px;
            }

            .info-item {
                margin-bottom: 20px;
            }

            .map-container {
                height: 200px;
            }

            .footer {
                padding: 40px 20px 20px;
            }

            .footer-container {
                grid-template-columns: 1fr;
                gap: 35px;
            }

            .footer-about h3,
            .footer-section h3 {
                font-size: 22px;
            }

            .footer-about p,
            .footer-section a {
                font-size: 16px;
            }

            .footer-about h4 {
                font-size: 18px;
            }

            .map-container iframe {
                width: 100%;
                height: 180px;
            }

            .whatsapp-float {
                bottom: 20px;
                right: 20px;
            }

            .whatsapp-button {
                padding: 12px 20px;
                font-size: 14px;
            }

            .whatsapp-button span {
                display: none;
            }

            .whatsapp-icon {
                width: 24px;
                height: 24px;
            }
        }

        /* Mobile Portrait (320px - 480px) */
        @media (max-width: 480px) {
            .navbar {
                padding: 10px 15px;
            }

            .navbar.scrolled {
                padding: 8px 15px;
            }

            .logo {
                font-size: 12px;
                gap: 8px;
            }

            .logo-icon {
                width: 30px;
                height: 30px;
            }

            .nav-menu a {
                font-size: 15px;
            }

            .nav-right {
                gap: 8px;
            }

            .search-box {
                width: 160px;
            }

            .hero {
                padding-left: 15px;
                padding-right: 15px;
                min-height: 280px;
            }

            .hero-content h1 {
                font-size: 26px;
            }

            .contact-section {
                padding: 30px 15px;
            }

            .contact-info,
            .contact-form-wrapper {
                padding: 25px 15px;
            }

            .contact-info h2,
            .contact-form-wrapper h2 {
                font-size: 22px;
                margin-bottom: 20px;
            }

            .contact-form-wrapper p {
                font-size: 14px;
                margin-bottom: 20px;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .form-group label {
                font-size: 14px;
                margin-bottom: 6px;
            }

            .form-control {
                padding: 12px 15px;
                font-size: 14px;
            }

            textarea.form-control {
                min-height: 120px;
            }

            .submit-btn {
                padding: 14px;
                font-size: 15px;
            }

            .info-content h4 {
                font-size: 15px;
            }

            .info-content p {
                font-size: 14px;
            }

            .map-container {
                height: 180px;
                margin-top: 20px;
            }

            .footer {
                padding: 30px 15px 15px;
            }

            .footer-container {
                gap: 30px;
            }

            .footer-about h3,
            .footer-section h3 {
                font-size: 20px;
                margin-bottom: 12px;
            }

            .footer-about p,
            .footer-section a {
                font-size: 14px;
            }

            .footer-about h4 {
                font-size: 16px;
                margin-top: 15px;
            }

            .social-links {
                gap: 10px;
            }

            .social-icon {
                width: 35px;
                height: 35px;
            }

            .footer-bottom {
                font-size: 12px;
                padding-top: 20px;
            }

            .whatsapp-float {
                bottom: 15px;
                right: 15px;
            }

            .whatsapp-button {
                padding: 10px 16px;
            }

            .whatsapp-icon {
                width: 22px;
                height: 22px;
            }
        }

        /* Extra Small Mobile (max 374px) */
        @media (max-width: 374px) {
            .navbar-container {
                gap: 10px;
            }

            .logo {
                font-size: 11px;
            }

            .hero-content h1 {
                font-size: 22px;
            }

            .contact-info h2,
            .contact-form-wrapper h2 {
                font-size: 20px;
            }

            .form-control {
                padding: 10px 12px;
                font-size: 13px;
            }
        }
    </style>
    <!-- Canonical small-breakpoint rules to match en/index.blade.php -->
    <style>
        @media (max-width: 475px) {
            .search-box,
            .search-input,
            .search-btn,
            .nav-right .search-box,
            .nav-right .search-input,
            .nav-right .search-btn {
                display: none !important;
                visibility: hidden !important;
                opacity: 0 !important;
                pointer-events: none !important;
            }

            .language-selector {
                display: inline-flex !important;
                position: absolute !important;
                right: 60px !important;
                top: 50% !important;
                transform: translateY(-50%) !important;
                z-index: 1250 !important;
                font-weight: 700 !important;
                color: var(--text-dark) !important;
            }

            .hamburger {
                display: flex !important;
                position: absolute !important;
                right: 12px !important;
                top: 50% !important;
                transform: translateY(-50%) !important;
                z-index: 2000 !important;
            }

            .hamburger span {
                background: var(--text-dark) !important;
            }
        }

        @media (max-width: 375px) {
            .navbar-container {
                gap: 10px;
            }

            .logo {
                font-size: 11px;
            }

            .nav-menu {
                width: min(260px, 80vw) !important;
                padding: 60px 18px 20px !important;
            }

            .nav-menu a { font-size: 14px; padding: 12px 0; }

            .hamburger { display: flex !important; padding: 6px !important; position: absolute !important; right: 12px !important; top: 50% !important; transform: translateY(-50%) !important; z-index: 1102 !important; }
        }

        @media (max-width: 320px) {
            .nav-menu { width: min(240px, 82vw) !important; padding: 60px 12px 18px !important; }
            .hamburger { right: 10px !important; padding: 4px !important; }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="{{ route('landing.en') }}" class="logo">
                <div class="logo-icon">
                      <img src="{{ asset('gambar/logo.png') }}" alt="Logo" style="width: 100%; height: 100%; object-fit: contain;">
                </div>
                <span>{{ $setting->company_name ?? 'PT. INTI SEMAI KALIANDRA' }}</span>
            </a>

            <ul class="nav-menu">
                <li><a href="{{ route('landing.en') }}" class="nav-link">Home</a></li>
                <li><a href="{{ route('about.en') }}" class="nav-link">About Us</a></li>
                <li><a href="{{ route('products.en') }}" class="nav-link">Products</a></li>
                <li><a href="{{ route('contact.en') }}" class="nav-link active">Contact Us</a></li>
            </ul>

            <div class="nav-right">
                <a href="{{ route('contact') }}" class="language-selector">ID</a>
                <div class="search-box">
                    <input type="text" class="search-input" placeholder="Search...">
                    <button class="search-btn">
                        <svg viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"/>
                            <path d="m21 21-4.35-4.35"/>
                        </svg>
                    </button>
                </div>
            </div>

            <button class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <div class="mobile-menu-overlay"></div>

    <!-- Hero Section -->
    <section class="hero" @if($setting && $setting->hero_image) style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('{{ $setting->hero_image_url }}'); background-size: cover; background-position: center;" @endif>
        <div class="hero-content">
            <h1>Contact Us</h1>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="contact-container">
            <!-- Contact Info -->
            <div class="contact-info">
                <h2>{{ $setting->company_name ?? 'PT Inti Semai Kaliandra' }}</h2>

                <div class="info-item">
                    <div class="info-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                        </svg>
                    </div>
                    <div class="info-content">
                        <h4>Our Address</h4>
                        <p>{{ $setting->address ?? 'Ruko Mahakam Square Blok B No. 9, Jl. Untung Suropati, Karang Asam Ulu, Sungai Kunjang, Kota Samarinda, Kalimantan Timur' }}</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                        </svg>
                    </div>
                    <div class="info-content">
                        <h4>Phone</h4>
                        <p>{{ $setting->phone ?? '082211088363' }}</p>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        </svg>
                    </div>
                    <div class="info-content">
                        <h4>Email</h4>
                        <p>{{ $setting->email ?? 'intisemai@gmail.com' }}</p>
                    </div>
                </div>

                <h4 style="margin-top: 30px; margin-bottom: 15px; font-size: 18px; font-weight: 600;">Connect with us!</h4>
                <div class="social-links">
                    @if($setting && $setting->youtube_url)
                    <a href="{{ $setting->youtube_url }}" target="_blank" class="social-icon youtube">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                    </a>
                    @endif
                    @if($setting && $setting->telegram_url)
                    <a href="{{ $setting->telegram_url }}" target="_blank" class="social-icon telegram">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.562 8.161c-.18 1.897-.962 6.502-1.359 8.627-.168.9-.5 1.201-.82 1.23-.697.064-1.226-.461-1.901-.903-1.056-.693-1.653-1.124-2.678-1.8-1.185-.781-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.139-5.062 3.345-.479.329-.913.489-1.302.481-.428-.008-1.252-.241-1.865-.44-.752-.244-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.831-2.529 6.998-3.014 3.333-1.386 4.025-1.627 4.476-1.635z"/></svg>
                    </a>
                    @endif
                    @if($setting && $setting->instagram_url)
                    <a href="{{ $setting->instagram_url }}" target="_blank" class="social-icon instagram">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                    </a>
                    @endif
                    @if($setting && $setting->tiktok_url)
                    <a href="{{ $setting->tiktok_url }}" target="_blank" class="social-icon tiktok">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                    </a>
                    @endif
                    @if($setting && $setting->facebook_url)
                    <a href="{{ $setting->facebook_url }}" target="_blank" class="social-icon facebook">
                        <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                    </a>
                    @endif
                </div>

                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6581385949893!2d117.14561231475398!3d-0.4895999996406245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f5e8b5e8b5f%3A0x5e8b5e8b5e8b5e8b!2sRuko%20Mahakam%20Square!5e0!3m2!1sid!2sid!4v1234567890123!5m2!1sid!2sid" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-wrapper">
                <h2>Send us a message!</h2>
                <p>Fill out the form below and we will contact you soon.</p>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.submit.en') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Your Name<span class="required">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Your Institution<span class="required">*</span></label>
                        <input type="text" name="institution" class="form-control" value="{{ old('institution') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Phone<span class="required">*</span></label>
                        <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Your Email<span class="required">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Subject<span class="required">*</span></label>
                        <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" required>
                    </div>

                    <div class="form-group">
                        <label>Your Message<span class="required">*</span></label>
                        <textarea name="message" class="form-control" required>{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="submit-btn">Send</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-about">
                <h3>{{ $setting->company_name ?? 'PT Inti Semai Kaliandra' }}</h3>
                @if($setting && $setting->address)
                    <p>{!! nl2br(e($setting->address)) !!}</p>
                @else
                    <p>Ruko Mahakam Square<br>
                    Blok B No. 9, Jl. Untung Suropati, Karang Asam Ulu,<br>
                    Sungai Kunjang, Kota Samarinda, Kalimantan Timur</p>
                @endif
                <p><br>No. Telp : {{ $setting->phone ?? '082211088363' }}</p>
                <p>Email : {{ $setting->email ?? 'intisemai@gmail.com' }}</p>

                <h4 style="margin-top: 20px; margin-bottom: 15px; font-style: italic; font-weight: bold; font-size: 22px;">Connect with us!</h4>

                <div class="social-links">
                    @if($setting && $setting->youtube_url)
                        <a href="{{ $setting->youtube_url }}" target="_blank" class="social-icon youtube">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                        </a>
                    @endif
                    @if($setting && $setting->telegram_url)
                        <a href="{{ $setting->telegram_url }}" target="_blank" class="social-icon telegram">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.562 8.161c-.18 1.897-.962 6.502-1.359 8.627-.168.9-.5 1.201-.82 1.23-.697.064-1.226-.461-1.901-.903-1.056-.693-1.653-1.124-2.678-1.8-1.185-.781-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.139-5.062 3.345-.479.329-.913.489-1.302.481-.428-.008-1.252-.241-1.865-.44-.752-.244-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.831-2.529 6.998-3.014 3.333-1.386 4.025-1.627 4.476-1.635z"/></svg>
                        </a>
                    @endif
                    @if($setting && $setting->instagram_url)
                        <a href="{{ $setting->instagram_url }}" target="_blank" class="social-icon instagram">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/></svg>
                        </a>
                    @endif
                    @if($setting && $setting->tiktok_url)
                        <a href="{{ $setting->tiktok_url }}" target="_blank" class="social-icon tiktok">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                        </a>
                    @endif
                    @if($setting && $setting->facebook_url)
                        <a href="{{ $setting->facebook_url }}" target="_blank" class="social-icon facebook">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                        </a>
                    @endif
                </div>
            </div>
            <div class="footer-section">
                <h3>Links</h3>
                <ul>
                    <li><a href="{{ route('landing.en') }}">Home</a></li>
                    <li><a href="{{ route('about.en') }}">About Us</a></li>
                    <li><a href="{{ route('products.en') }}">Products</a></li>
                    <li><a href="{{ route('contact.en') }}">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-section footer-location" style="text-align: center;">
                <h3 style="font-weight: 700;">Location</h3>
                @if($setting && $setting->maps_embed_url)
                    <div class="map-container">
                        {!! $setting->maps_embed_url !!}
                    </div>
                @else
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.817!2d117.15!3d-0.50!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMMKwMzAnMDAuMCJTIDExN8KwMDknMDAuMCJF!5e0!3m2!1sid!2sid!4v1234567890"
                            width="100%" height="200"
                            style="border:0; border-radius:10px;"
                            allowfullscreen="" loading="lazy"></iframe>
                    </div>
                @endif
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 {{ $setting->company_name ?? 'PT Inti Semai Kaliandra' }}. All rights reserved.</p>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    @if($setting && $setting->whatsapp_enabled && $setting->whatsapp_number)
        <div class="whatsapp-float">
            <a href="https://wa.me/{{ $setting->whatsapp_number }}" target="_blank" class="whatsapp-button">
                <svg class="whatsapp-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                <span>Contact Us</span>
            </a>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamburger = document.querySelector('.hamburger');
            const navMenu = document.querySelector('.nav-menu');
            const overlay = document.querySelector('.mobile-menu-overlay');
            const body = document.body;

            function setMenuState(open) {
                if (!hamburger || !navMenu || !overlay) return;
                hamburger.classList.toggle('active', open);
                navMenu.classList.toggle('active', open);
                overlay.classList.toggle('active', open);
                body.style.overflow = open ? 'hidden' : '';
            }

            if (hamburger) {
                hamburger.addEventListener('click', function() {
                    setMenuState(!navMenu.classList.contains('active'));
                });
            }

            if (overlay) {
                overlay.addEventListener('click', function() { setMenuState(false); });
            }

            document.querySelectorAll('.nav-menu a').forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 1023) setMenuState(false);
                });
            });

            // Prevent footer / social clicks from accidentally toggling the menu
            document.querySelectorAll('.footer a, .social-links a, .whatsapp-button, .map-container iframe').forEach(el => {
                el.addEventListener('click', function(ev) { ev.stopPropagation(); });
            });

            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                const navbar = document.querySelector('.navbar');
                if (!navbar) return;
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        });
    </script>
</body>
</html>
