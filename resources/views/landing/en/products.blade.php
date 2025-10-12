@php $active = 'produk'; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products - {{ $setting->company_name ?? 'PT. Inti Semai Kaliandra' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .load-more-btn {
            background: #B6C491;
            color: #fff;
            font-weight: 700;
            font-size: 1.35rem;
            border: none;
            border-radius: 12px;
            padding: 8px 24px;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            transition: background 0.2s;
            box-shadow: none;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.5px;
            margin: 0 auto;
            cursor: pointer;
        }
        .load-more-btn:hover {
            background: #A6B37D;
        }
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

        /* Page Title */
        .page-title-container {
            text-align: center;
            margin-bottom: 24px;
            padding: 0 20px;
        }

        .page-title {
            display: inline-block;
            color: var(--dark-green);
            font-size: 2rem;
            font-weight: 700;
            position: relative;
        }

        .title-underline {
            display: block;
            height: 5px;
            background: var(--primary-green);
            border-radius: 3px;
            margin-top: 8px;
            width: 100%;
        }

        /* Container */
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 80px 50px;
        }

        /* Marketplace Icons */
        .marketplace-icons {
            display: flex;
            gap: 8px;
        }

        .shop-link {
            background: white;
            border-radius: 6px;
            border: 3px solid var(--dark-green);

            padding: 4px 8px;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .shop-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .shop-icon {
            height: 28px;
            width: auto;
            transition: transform 0.3s ease;
        }

        .shop-link {
            background: white;
            border-radius: 12px;
            border: 1.5px solid #E8E8E8;
            padding: 4px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            width: 67.79px;  /* Sama dengan height button detail */
            height: 67.79px; /* Sama dengan height button detail */
        }

        .shop-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .shop-link:hover .shop-icon {
            transform: scale(1.05);
        }

        .shop-link .shop-icon {
            width: 75%;    /* Memberikan ruang untuk padding */
            height: 75%;   /* Memberikan ruang untuk padding */
            object-fit: contain;
            transition: transform 0.3s ease;
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

        /* Product Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
            justify-content: center;
            max-width: 1280px;
            margin: 0 auto;
        }

        .product-card {
            background: var(--light-green);
            border-radius: 16px;
            border: 3px solid var(--dark-green);
            padding: 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            height: auto;
            min-height: 600px;
            position: relative;
            max-width: 620px;
            margin: 0 auto;
        }

        .product-image-container {
            background: white;
            border-radius: 12px;
            border: 2px solid var(--light-green);
            width: 100%;
            max-width: 500px; /* Scaled proportionally from 702.6px for 1366px screens */
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
            padding: 16px;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
            margin: auto;
        }

        .product-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 8px;
            text-align: center;
        }

        .product-spec {
            color: var(--dark-green);
            font-size: 20px;
            margin-bottom: 20px;
            text-align: center;
            min-height: 32px;
            font-weight: 400;
        }

        .product-links {
            position: absolute;
            left: 32px;
            bottom: 32px;
            display: flex;
            gap: 12px;
            z-index: 2;
            height: 67.79px; /* Sama dengan height button detail */
        }

        .detail-button {
            display: inline-flex;
            background: var(--light-orange);
            color: #191900;
            font-weight: 700;
            border-radius: 32px;
            width: 288.75px;
            height: 67.79px;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            border: 3px solid var(--dark-green);
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.5px;
            text-decoration: none;
            transition: all 0.3s ease;
            position: absolute;
            right: 32px;
            bottom: 32px;
        }

        .detail-button:hover {
            background: var(--orange);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }


        /* Responsive */
        @media (min-width: 1920px) {
            .product-grid {
                max-width: 1800px;
                gap: 40px;
            }
            .product-card {
                max-width: 860px;
                min-height: 800px;
            }
            .product-image-container {
                max-width: 702.6px; /* Original size for 1920px */
            }
        }

        @media (min-width: 1367px) and (max-width: 1919px) {
            .product-grid {
                max-width: 1366px;
                gap: 32px;
            }
            .product-card {
                max-width: 660px;
                min-height: 700px;
            }
            .product-image-container {
                max-width: 600px; /* Proportionally scaled from 702.6px */
            }
        }

        @media (max-width: 1366px) {
            .container {
                padding: 60px 32px;
            }
            .product-grid {
                gap: 24px;
            }
            .product-card {
                max-width: 580px;
                min-height: 650px;
            }
            .product-image-container {
                max-width: 520px; /* Further scaled down */
            }
            .product-title {
                font-size: 28px;
            }
            .detail-button {
                width: 240px;
                height: 56px;
                line-height: 56px;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 968px) {
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
            .product-grid {
                grid-template-columns: 1fr;
                gap: 32px;
            }
            .product-card {
                max-width: 100%;
                min-height: 520px;
            }
            .product-image-container {
                height: 280px;
            }
            .detail-button {
                width: 180px;
                height: 50px;
                font-size: 1rem;
            }
            .shop-link {
                width: 50px;
                height: 50px;
            }
            .container {
                padding: 40px 20px;
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
                <li><a href="{{ route('landing.en') }}" class="nav-link">Home</a></li>
                <li><a href="{{ route('about.en') }}" class="nav-link">About Us</a></li>
                <li><a href="{{ route('products.en') }}" class="nav-link active">Products</a></li>
                <li><a href="{{ route('landing.en') }}#contact-us" class="nav-link">Contact Us</a></li>
            </ul>

            <div class="nav-right">
                <a href="{{ route('products') }}" class="language-selector">ID</a>
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
    <section class="hero" id="products" @if($setting && $setting->hero_image) style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('{{ $setting->hero_image_url }}'); background-size: cover; background-position: center;" @endif>
        <div class="hero-content">
            <p>{{ $landing->hero_subtitle_top_en ?? 'Our Products' }}</p>
        </div>
    </section>
    <div class="container" style="margin-top: 60px;">
        <div class="page-title-container">
            <span class="page-title">
                {{ $landing->hero_subtitle_bottom_en ?? 'Innovation for Better and Sustainable Results' }}
                <span class="title-underline"></span>
            </span>
        </div>
        <div style="margin-bottom:130px;"></div>
    <div class="product-grid" id="productGrid">
        @foreach($products as $i => $product)
            <div class="product-card product-card-toggle" data-index="{{ $i }}" style="{{ $i > 1 ? 'display:none;' : '' }}">
                <div class="product-image-container">
                    @if($product->image)
                        <img src="{{ $product->image_url }}" alt="{{ $product->name_en }}" class="product-image">
                    @endif
                </div>
                <h3 class="product-title">{{ $product->name_en }}</h3>
                <div class="product-spec">{{ $product->specification_en }}</div>
                <div class="product-links marketplace-icons">
                    @if($product->shopee_url)
                        <a href="{{ $product->shopee_url }}" target="_blank" class="shop-link">
                            <img src="{{ asset('gambar/shopee_icon.png') }}" alt="Shopee" class="shop-icon">
                        </a>
                    @endif
                    @if($product->tokopedia_url)
                        <a href="{{ $product->tokopedia_url }}" target="_blank" class="shop-link">
                            <img src="{{ asset('gambar/tokopedia_icon.png') }}" alt="Tokopedia" class="shop-icon">
                        </a>
                    @endif
                </div>
                <a href="{{ route('products.show.en', $product->id) }}" class="detail-button">{{ $product->button_label_en ?? 'View Details' }}</a>
            </div>
        @endforeach
    </div>
    @if(count($products) > 2)
    <div style="text-align:center; margin-top:60px;">
        <a href="#" id="showMoreBtn" class="load-more-btn">Show More...</a>
        <a href="#" id="showLessBtn" class="load-more-btn" style="display:none;">Show Less...</a>
    </div>
    @endif
    </div>
    <!-- Footer -->
    <footer class="footer" id="contact-us">
        <div class="footer-container">
            <div class="footer-about">
                <h3>{{ $setting->company_name ?? 'PT Inti Semai Kaliandra' }}</h3>
                @if($setting && $setting->address_en)
                    <p>{!! nl2br(e($setting->address_en)) !!}</p>
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
                    <li><a href="{{ route('products.en') }}">Products</a></li>
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

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Show more/less functionality for products
        document.addEventListener('DOMContentLoaded', function() {
            const productCards = document.querySelectorAll('.product-card-toggle');
            const showMoreBtn = document.getElementById('showMoreBtn');
            const showLessBtn = document.getElementById('showLessBtn');

            if (showMoreBtn && showLessBtn) {
                showMoreBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    productCards.forEach(card => {
                        card.style.display = 'flex';
                    });
                    showMoreBtn.style.display = 'none';
                    showLessBtn.style.display = 'inline-block';
                });

                showLessBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    productCards.forEach((card, index) => {
                        if (index > 1) {
                            card.style.display = 'none';
                        }
                    });
                    showLessBtn.style.display = 'none';
                    showMoreBtn.style.display = 'inline-block';
                });
            }
        });
    </script>
</body>
</html>
