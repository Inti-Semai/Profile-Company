<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $setting->company_name ?? 'PT. INTI SEMAI KALIANDRA' }}</title>
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
            border-bottom: 3px solid var(--text-dark);
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

        /* Hero Section */
        .hero {
            margin-top: 0;
            padding-top: 100px;
            height: 70vh;
            min-height: 650px;
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

        .hero-content p {
            font-size: 52px;
            font-weight: 700;
            text-shadow: 2px 4px 12px rgba(0,0,0,0.5);
            line-height: 1.2;
            margin-top: 0;
            letter-spacing: -0.5px;
        }

        /* Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 80px 50px;
        }

        /* Vision Section */
        .vision-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            margin-bottom: 80px;
        }

        .vision-image {
            width: 100%;
            height: 300px;
            border-radius: 20px;
            background: linear-gradient(135deg, var(--light-green), var(--light-orange));
            overflow: hidden;
        }

        .vision-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .vision-content h2 {
            font-size: 60px;
            font-weight: 700;
            color: #3B5B18;
            margin-bottom: 15px;
            letter-spacing: 1px;
        }

        .vision-content p {
            color: var(--text-light);
            font-size: 19px;
            line-height: 1.7;
            text-align: justify;
        }

        /* Mission Section */
        .mission-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .mission-image {
            width: 100%;
            height: 300px;
            border-radius: 20px;
            background: linear-gradient(135deg, var(--light-orange), var(--orange));
            overflow: hidden;
        }

        .mission-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .mission-content h2 {
            font-size: 60px;
            font-weight: 700;
            color: #3B5B18;
            margin-bottom: 15px;
            letter-spacing: 1px;
        }

        .mission-content p {
            color: var(--text-light);
            font-size: 18px;
            line-height: 1.7;
            text-align: justify;
        }

        /* Gallery Section */
        .gallery-section {
            background: var(--bg-light);
            padding: 0;
        }

        .gallery-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 80px 50px;
        }

        .gallery-title {
            text-align: center;
            font-size: 32px;
            font-weight: 700;
            color: #3B5B18;
            margin-bottom: 40px;
            letter-spacing: 1px;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            max-width: 100%;
        }

        .gallery-item {
            width: 100%;
            height: 375px;
            border-radius: 20px;
            background: linear-gradient(135deg, var(--light-green), var(--light-orange));
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
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

        @media (max-width: 768px) {
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

            .footer-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .map-container iframe {
                height: 200px;
            }
        }

        /* Hubungi Kami Button */
        .contact-button {
            background: var(--primary-green);
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
        }

        .contact-button:hover {
            background: var(--dark-green);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 91, 24, 0.4);
        }

        /* Responsive */
        @media (max-width: 968px) {
            .vision-section,
            .mission-section {
                grid-template-columns: 1fr;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .nav-menu {
                gap: 20px;
            }

            .hero-content h1 {
                font-size: 36px;
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
                <li><a href="{{ route('landing.en') }}" class="nav-link active">Home</a></li>
                <li><a href="{{ route('about.en') }}" class="nav-link">About Us</a></li>
                <li><a href="{{ route('landing.en') }}#products" class="nav-link">Products</a></li>
                <li><a href="{{ route('landing.en') }}#contact-us" class="nav-link">Contact Us</a></li>
            </ul>

            <div class="nav-right">
                <a href="{{ route('landing') }}"class="language-selector">ID</a>
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
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home" @if($setting && $setting->hero_image) style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('{{ $setting->hero_image_url }}'); background-size: cover; background-position: center;" @endif>
        <div class="hero-content">
            <h1>{{ $setting->hero_title_en ?? 'Innovation for Better and' }}</h1>
            <p>{{ $setting->hero_subtitle_en ?? 'Sustainable Results' }}</p>
        </div>
    </section>

    <!-- Vision Section -->
    <div class="container">
        <div class="vision-section" id="about-us">
            <div class="vision-image">
                @if($setting && $setting->vision_image)
                    <img src="{{ $setting->vision_image_url }}" alt="Vision">
                @endif
            </div>
            <div class="vision-content">
                <h2>OUR VISION</h2>
                <p>
                    {{ $setting->vision_text_en ?? 'Delivering innovative, productive, and sustainable agricultural solutions to enhance farmer welfare through an environmentally friendly approach and long-term results orientation, focusing on diversification and high added value for sustainable and profitable agriculture.' }}
                </p>
            </div>
        </div>

        <!-- Mission Section -->
        <div class="mission-section">
            <div class="mission-content">
                <h2>OUR MISSION</h2>
                <p>
                    {{ $setting->mission_text_en ?? 'Providing high-quality agricultural products and services that support increased agricultural productivity, building strategic partnerships with local farmers, and implementing modern technology to produce sustainable and environmentally friendly yields that can increase the economic value of Indonesian agriculture.' }}
                </p>
            </div>
            <div class="mission-image">
                @if($setting && $setting->mission_image)
                    <img src="{{ $setting->mission_image_url }}" alt="Mission">
                @endif
            </div>
        </div>
    </div>

    <!-- Gallery Section -->
    <section class="gallery-section" id="products">
        <div class="gallery-container">
            <h2 class="gallery-title">GALLERY</h2>
            <div class="gallery-grid">
                @if($galleries && $galleries->count() > 0)
                    @foreach($galleries as $gallery)
                        <div class="gallery-item">
                            <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title_en ?? $gallery->title }}">
                        </div>
                    @endforeach
                @else
                    <div class="gallery-item">
                        <!-- Placeholder for gallery image 1 -->
                    </div>
                    <div class="gallery-item">
                        <!-- Placeholder for gallery image 2 -->
                    </div>
                    <div class="gallery-item">
                        <!-- Placeholder for gallery image 3 -->
                    </div>
                    <div class="gallery-item">
                        <!-- Placeholder for gallery image 4 -->
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" id="contact-us">
        <div class="footer-container">
            <div class="footer-about">
                <h3>{{ $setting->company_name ?? 'PT Inti Semai Kaliandra' }}</h3>
                @if($setting && $setting->address)
                    <p>{!! nl2br(e($setting->address_en ?? $setting->address)) !!}</p>
                @else
                    <p>Ruko Mahakam Square<br>
                    Block B No. 9, Jl. Untung Suropati, Karang Asam Ulu,<br>
                    Sungai Kunjang, Samarinda City, East Kalimantan</p>
                @endif
                <p><br>Phone : {{ $setting->phone ?? '082211088363' }}</p>
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
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about-us">About Us</a></li>
                    <li><a href="#products">Products</a></li>
                    <li><a href="#contact-us">Contact Us</a></li>
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
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                <span>Contact Us</span>
            </a>
        </div>
    @endif

    <script>
        // Same JavaScript as original file
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        const sections = document.querySelectorAll('[id]');
        const navLinks = document.querySelectorAll('.nav-link');

        window.addEventListener('scroll', function() {
            let current = 'home';

            if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight - 100) {
                current = 'contact-us';
            } else {
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;
                    if (window.pageYOffset >= (sectionTop - 150)) {
                        const sectionId = section.getAttribute('id');
                        if (sectionId && sectionId !== 'contact-us') {
                            current = sectionId;
                        }
                    }
                });
            }

            navLinks.forEach(link => {
                link.classList.remove('active');
                const href = link.getAttribute('href');
                if (href === '#' + current) {
                    link.classList.add('active');
                }
            });
        });

        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');

                if (targetId.startsWith('#')) {
                    e.preventDefault();
                    const targetSection = document.querySelector(targetId);

                    if (targetSection) {
                        window.scrollTo({
                            top: targetSection.offsetTop - 70,
                            behavior: 'smooth'
                        });
                    }
                }
            });
        });
    </script>
</body>
</html>