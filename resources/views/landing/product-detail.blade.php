<!DOCTYPE html>
<html lang="id">
<head>
    <style>
        .back-btn-wrapper {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            width: 100%;
            padding-right: 30px;
        }
        @media (max-width: 1200px) {
            .back-btn-wrapper {
                padding-right: 20px;
            }
        }
        @media (max-width: 767px) {
            .back-btn-wrapper {
                justify-content: center;
                margin-bottom: 5px;
                padding-right: 0;
            }
        }
    </style>
    <style>
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #A6B37D;
            color: #3B5B18;
            border: 2px solid #3B5B18;
            border-radius: 8px;
            padding: 8px 18px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(59,91,24,0.08);
            transition: background 0.2s, color 0.2s, border-color 0.2s;
            margin-bottom: 18px;
        }
        .back-btn:hover {
            background: #3B5B18;
            color: #fff;
            border-color: #3B5B18;
        }
        .back-btn svg {
            margin-right: 2px;
            stroke: currentColor;
        }
        @media (max-width: 767px) {
            .back-btn {
                font-size: 0.95rem;
                padding: 7px 12px;
            }
        }
    </style>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - {{ $setting->company_name ?? 'PT. Inti Semai Kaliandra' }}</title>
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
            background-color: #f8f9fa;
        }

       /* Navbar */
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
            text-decoration: none
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
        }

        .mobile-menu-overlay.active {
            opacity: 1;
        }

        .spec-title {
            color: #000 !important;
            font-weight: 700;
            margin-bottom: 18px;
            text-align: center;
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
            width: 100%;
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

        /* Original Styles - Improved for Responsiveness */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            padding-top: 120px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 400;
            color: #000;
            padding-left: 32px;
        }

        .header h1 b {
            font-weight: 700;
        }

        .marketplace-logo {
            width: 32px;
            height: 32px;
            display: block;
            object-fit: contain;
            margin-right: 8px;
        }

        .product-section {
            display: flex;
            gap: 20px;
            background-color: #e9f0e8;
            padding: 20px;
            border-radius: 12px;
            margin: 0 auto 40px;
            width: 100%;
        }

        .product-image {
            flex: 1;
            min-width: 0;
        }

        .product-swiper {
            width: 100%;
            height: 400px;
            border-radius: 12px;
            overflow: hidden;
        }

        .product-swiper .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 12px;
        }

        .product-specifications {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-width: 0;
        }

        .product-specifications h2 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #3B5B18;
            margin-bottom: 20px;
            text-align: center;
        }

        .product-specifications ul {
            list-style: none;
            padding: 0;
            flex: 1;
        }

        .product-specifications ul li {
            font-size: 1rem;
            margin: 8px 0;
            padding: 4px 0;
            border-bottom: 1px solid rgba(59, 91, 24, 0.1);
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        .action-buttons a {
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: background 0.3s;
        }

        /* Marketplace Section */
        .marketplace-section {
            margin: 40px auto 0;
            text-align: left;
        }

        .marketplace-section > div:first-child {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 22px;
            padding-left: 0;
            text-align: left;
            margin-left: 180px;
        }

        .marketplace-buttons {
            display: flex;
            justify-content: flex-start;
            gap: 32px;
            flex-wrap: wrap;
            margin-bottom: 48px;
        }

        .marketplace-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            border: 3px solid;
            border-radius: 16px;
            padding: 12px 32px;
            font-size: 20px;
            font-weight: 500;
            color: inherit;
            background: #fff;
            transition: box-shadow 0.2s, border-color 0.2s, transform 0.2s;
            text-decoration: none;
        }

        .marketplace-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .marketplace-btn.tokopedia {
            border-color: #222;
            color: #222;
        }

        .marketplace-btn.shopee {
            border-color: #31460B;
            color: #31460B;
        }

        /* Responsive for Navbar and Footer */
        @media (max-width: 1023px) {
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

            .hamburger {
                display: flex;
                order: 3;
            }

            .nav-menu {
                position: fixed;
                top: 0;
                right: -100%;
                width: 280px;
                height: 100vh;
                background: white;
                flex-direction: column;
                padding: 80px 30px 30px;
                box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
                transition: right 0.3s ease;
                z-index: 1000;
                gap: 0;
                transform: none;
                left: auto;
                align-items: flex-start;
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

            .container {
                padding: 20px;
                padding-top: 100px;
            }

            .header {
                padding-left: 0;
            }

            .header h1 {
                font-size: 1.5rem;
                padding-left: 0;
                text-align: center;
            }

            .product-section {
                flex-direction: column;
                gap: 16px;
                padding: 16px;
                height: auto;
            }

            .product-swiper {
                height: 300px;
            }

            .product-specifications h2 {
                font-size: 1.25rem;
            }

            .product-specifications ul li {
                font-size: 0.95rem;
            }

            .marketplace-section {
                margin: 20px auto 0;
                padding: 0 16px;
            }

            .marketplace-section > div:first-child {
                font-size: 18px;
                padding-left: 0;
            }

            .marketplace-buttons {
                gap: 16px;
            }

            .marketplace-btn {
                font-size: 16px;
                padding: 10px 24px;
            }

            .footer {
                padding: 50px 30px 25px;
            }

            .footer-container {
                grid-template-columns: 2fr 1fr 1.5fr;
                gap: 30px;
            }
        }

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

            .hamburger {
                display: flex;
                order: 3;
            }

            .nav-menu {
                position: fixed;
                top: 0;
                right: -100%;
                width: 280px;
                height: 100vh;
                background: white;
                flex-direction: column;
                padding: 80px 30px 30px;
                box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
                transition: right 0.3s ease;
                z-index: 1000;
                gap: 0;
                transform: none;
                left: auto;
                align-items: flex-start;
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

            .container {
                padding: 16px;
                padding-top: 100px;
            }

            .header h1 {
                font-size: 1.25rem;
                text-align: center;
            }

            .product-section {
                gap: 12px;
                padding: 12px;
            }

            .product-swiper {
                height: 250px;
            }

            .product-specifications h2 {
                font-size: 1.125rem;
                margin-bottom: 16px;
            }

            .product-specifications ul li {
                font-size: 0.9rem;
                margin: 6px 0;
            }

            .marketplace-section {
                margin: 24px auto 0;
            }

            .marketplace-section > div:first-child {
                font-size: 16px;
            }

            .marketplace-buttons {
                gap: 12px;
                justify-content: center;
            }

            .marketplace-btn {
                font-size: 14px;
                padding: 8px 20px;
                flex: 1;
                min-width: 140px;
                justify-content: center;
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
                height: 180px;
            }
        }

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

            .nav-menu {
                gap: 10px;
            }

            .nav-menu a {
                font-size: 12px;
            }

            .nav-right {
                flex-direction: row;
                gap: 5px;
            }

            .search-box {
                width: auto;
                flex: 1;
                min-width: 100px;
                padding: 6px 12px;
            }

            .search-input {
                font-size: 11px;
            }

            .search-btn {
                width: 28px;
                height: 28px;
            }

            .language-selector {
                font-size: 12px;
                white-space: nowrap;
            }

            .container {
                padding: 12px;
                padding-top: 90px;
            }

            .header h1 {
                font-size: 1.125rem;
            }

            .product-section {
                padding: 12px;
                border-radius: 8px;
            }

            .product-swiper {
                height: 200px;
            }

            .product-specifications h2 {
                font-size: 1rem;
            }

            .product-specifications ul li {
                font-size: 0.875rem;
            }

            .marketplace-section > div:first-child {
                font-size: 14px;
            }

            .marketplace-buttons {
                gap: 8px;
                flex-direction: column;
                align-items: center;
            }

            .marketplace-btn {
                width: 100%;
                max-width: 200px;
                font-size: 14px;
                padding: 10px 16px;
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
                justify-content: center;
            }

            .social-icon {
                width: 35px;
                height: 35px;
            }

            .footer-bottom {
                font-size: 12px;
                padding-top: 20px;
            }
        }

        @media (max-width: 320px) {
            .navbar {
                padding: 8px 10px;
            }

            .navbar.scrolled {
                padding: 6px 10px;
            }

            .logo {
                font-size: 11px;
                gap: 6px;
            }

            .logo-icon {
                width: 28px;
                height: 28px;
            }

            .nav-right {
                gap: 6px;
            }

            .search-box {
                width: auto;
                flex: 1;
                min-width: 80px;
                padding: 6px 10px;
            }

            .search-input {
                font-size: 11px;
            }

            .search-btn {
                width: 28px;
                height: 28px;
            }

            .language-selector {
                font-size: 12px;
            }

            .hamburger span {
                width: 20px;
                height: 2px;
            }

            .nav-menu {
                width: 100vw;
                padding: 70px 20px 20px;
            }

            .container {
                padding: 8px;
                padding-top: 80px;
            }

            .back-btn-wrapper {
                padding: 0 8px;
            }

            .back-btn {
                font-size: 0.875rem;
                padding: 6px 10px;
                gap: 6px;
            }

            .back-btn svg {
                width: 16px;
                height: 16px;
            }

            .header h1 {
                font-size: 1rem;
                padding-left: 0;
            }

            .product-section {
                padding: 8px;
                gap: 8px;
                border-radius: 6px;
            }

            .product-swiper {
                height: 160px;
                border-radius: 6px;
            }

            .product-swiper .swiper-button-next,
            .product-swiper .swiper-button-prev {
                width: 24px;
                height: 24px;
            }

            .product-specifications h2 {
                font-size: 0.875rem;
                margin-bottom: 12px;
            }

            .product-specifications ul li {
                font-size: 0.8rem;
                margin: 4px 0;
                padding: 2px 0;
            }

            .marketplace-section {
                margin: 16px auto 0;
            }

            .marketplace-section > div:first-child {
                font-size: 13px;
                margin-bottom: 12px;
            }

            .marketplace-buttons {
                gap: 6px;
            }

            .marketplace-btn {
                font-size: 13px;
                padding: 8px 12px;
                gap: 6px;
                min-width: auto;
                width: 100%;
                max-width: none;
            }

            .marketplace-logo {
                width: 24px;
                height: 24px;
            }

            .footer {
                padding: 20px 10px 10px;
            }

            .footer-container {
                gap: 20px;
            }

            .footer-about h3,
            .footer-section h3 {
                font-size: 18px;
                margin-bottom: 8px;
            }

            .footer-about p,
            .footer-section a {
                font-size: 13px;
                line-height: 1.5;
            }

            .footer-about h4 {
                font-size: 15px;
                margin-top: 12px;
                margin-bottom: 10px;
            }

            .social-links {
                gap: 8px;
            }

            .social-icon {
                width: 32px;
                height: 32px;
            }

            .social-icon svg {
                width: 16px;
                height: 16px;
            }

            .map-container iframe {
                height: 140px;
                border-radius: 6px;
            }

            .footer-bottom {
                font-size: 11px;
                padding-top: 16px;
            }

            .whatsapp-float {
                bottom: 16px;
                right: 16px;
            }

            .whatsapp-button {
                padding: 8px 12px;
                font-size: 14px;
                gap: 8px;
                border-radius: 40px;
            }

            .whatsapp-icon {
                width: 24px;
                height: 24px;
            }
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

        @media (max-width: 480px) {
            .whatsapp-float {
                bottom: 20px;
                right: 20px;
            }

            .whatsapp-button {
                padding: 10px 14px;
            }

            .whatsapp-button span {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <div class="logo">
                <div class="logo-icon">
                    <img src="{{ asset('gambar/logo.png') }}" alt="Logo" style="width: 100%; height: 100%; object-fit: contain;">
                </div>
                <span>{{ $setting->company_name ?? 'PT. INTI SEMAI KALIANDRA' }}</span>
            </div>

            <ul class="nav-menu">
                <li><a href="{{ route('landing') }}" class="nav-link">Beranda</a></li>
                <li><a href="{{ route('about') }}" class="nav-link">Tentang Kami</a></li>
                <li><a href="{{ route('products') }}" class="nav-link active">Produk</a></li>
                <li><a href="{{ route('contact') }}" class="nav-link">Hubungi Kami</a></li>
            </ul>

            <div class="nav-right">
                <a href="{{ route('products.en') }}"class="language-selector">EN</a>
                <div class="search-box">
                    <input type="text" placeholder="Search..." class="search-input">
                    <button class="search-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Hamburger Menu Button -->
            <button class="hamburger" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay"></div>

    <div class="container">
        <div class="back-btn-wrapper">
            <a href="{{ route('products') }}" class="back-btn">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M15 18l-6-6 6-6"/></svg>
                <span>Kembali ke Produk</span>
            </a>
        </div>
        <div class="header">
            <h1>Detail <b>Produk</b></h1>
        </div>
        <div class="product-section">
            <div class="product-image">
                <!-- Swiper -->
                <div class="swiper product-swiper">
                    <div class="swiper-wrapper">
                        @if($product->image_url)
                        <div class="swiper-slide">
                            <img src="{{ $product->image_url }}" alt="Cover Image">
                        </div>
                        @endif
                        @if($product->galleries && $product->galleries->count())
                            @foreach($product->galleries as $gallery)
                                <div class="swiper-slide">
                                    <img src="{{ $gallery->image_url }}" alt="Gallery Image">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <div class="product-specifications">
                <h2 class="spec-title">Spesifikasi</h2>
                <div class="specification-content" style="white-space: pre-line;">
                    {!! nl2br(e($specifications)) !!}
                </div>
            </div>
        </div>

        <!-- Marketplace Buttons -->
        <div class="marketplace-section">
            <div>Kunjungi Kami di</div>
            <div class="marketplace-buttons">
                @if($product->tokopedia_url)
                <a href="{{ $product->tokopedia_url }}" target="_blank" class="marketplace-btn tokopedia">
                    <img src="{{ asset('gambar/tokopedia_icon.png') }}" alt="Tokopedia" class="marketplace-logo">
                    Tokopedia
                </a>
                @endif
                @if($product->shopee_url)
                <a href="{{ $product->shopee_url }}" target="_blank" class="marketplace-btn shopee">
                    <img src="{{ asset('gambar/shopee_icon.png') }}" alt="Shopee" class="marketplace-logo">
                    Shopee
                </a>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer" id="hubungi-kami">
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

                <h4 style="margin-top: 20px; margin-bottom: 15px; font-style: italic; font-weight: bold; font-size: 22px;">Terhubung dengan kami!</h4>

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
                <h3>Tautan</h3>
                <ul>
                    <li><a href="{{ route('landing') }}">Beranda</a></li>
                    <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('products') }}">Produk</a></li>
                    <li><a href="{{ route('contact') }}">Hubungi Kami</a></li>
                </ul>
            </div>
            <div class="footer-section footer-location" style="text-align: center;">
                <h3 style="font-weight: 700;">Lokasi</h3>
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
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                <span>Hubungi Kami</span>
            </a>
        </div>
    @endif

    <script>
        // Hamburger Menu Toggle
        function toggleMenu() {
            const hamburger = document.querySelector('.hamburger');
            const navMenu = document.querySelector('.nav-menu');
            const overlay = document.querySelector('.mobile-menu-overlay');
            const body = document.body;

            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
            overlay.classList.toggle('active');
            body.style.overflow = hamburger.classList.contains('active') ? 'hidden' : '';
        }

        // Event listeners for hamburger menu
        document.querySelector('.hamburger').addEventListener('click', toggleMenu);
        document.querySelector('.mobile-menu-overlay').addEventListener('click', toggleMenu);

        // Close menu when clicking nav links
        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.addEventListener('click', function() {
                const hamburger = document.querySelector('.hamburger');
                if (hamburger.classList.contains('active')) {
                    toggleMenu();
                }
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.product-swiper', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>
</html>
