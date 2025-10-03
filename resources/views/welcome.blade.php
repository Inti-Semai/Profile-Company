@extends('layouts.app')

@section('title', 'Welcome to Laravel with Tailwind CSS')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-sm border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold text-gray-900">Laravel <span class="text-primary-500">App</span></h1>
                </div>
                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-primary-500 transition-colors">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-primary-500 transition-colors">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn-primary">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-16">
            <div class="text-center">
                <div class="mb-8">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-primary-500 rounded-full mb-6">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                </div>

                <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">
                    Laravel <span class="text-primary-500">12</span> with
                    <span class="bg-gradient-to-r from-cyan-500 to-blue-500 bg-clip-text text-transparent">Tailwind CSS</span>
                </h1>

                <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                    Setup berhasil! Framework modern untuk membangun aplikasi web yang elegan dengan styling yang powerful.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="btn-primary text-lg px-8 py-3">
                        Get Started
                    </button>
                    <button class="bg-white text-gray-700 border-2 border-gray-300 hover:border-gray-400 font-medium py-3 px-8 rounded-lg transition-colors duration-200">
                        View Documentation
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Tailwind CSS Test Components</h2>
                <p class="text-gray-600">Komponen-komponen untuk menguji Tailwind CSS styling</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="card hover:shadow-lg transition-shadow duration-300">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Responsive Design</h3>
                        <p class="text-gray-600">Tailwind CSS utility classes bekerja dengan sempurna untuk responsive design.</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="card hover:shadow-lg transition-shadow duration-300">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Utility First</h3>
                        <p class="text-gray-600">Sistem utility-first yang memungkinkan styling cepat dan konsisten.</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="card hover:shadow-lg transition-shadow duration-300">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Fast Development</h3>
                        <p class="text-gray-600">Pengembangan yang cepat dengan komponen yang sudah dioptimasi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Test Section -->
    <div class="py-16 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Tailwind CSS Testing Area</h2>
                <p class="text-gray-600">Area pengujian untuk memastikan Tailwind CSS berjalan dengan baik</p>
            </div>

            <!-- Color Palette Test -->
            <div class="card mb-8">
                <h3 class="text-xl font-semibold mb-4">Color Palette Test</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-red-500 rounded-lg mx-auto mb-2"></div>
                        <span class="text-sm text-gray-600">Red 500</span>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-500 rounded-lg mx-auto mb-2"></div>
                        <span class="text-sm text-gray-600">Blue 500</span>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-500 rounded-lg mx-auto mb-2"></div>
                        <span class="text-sm text-gray-600">Green 500</span>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-purple-500 rounded-lg mx-auto mb-2"></div>
                        <span class="text-sm text-gray-600">Purple 500</span>
                    </div>
                </div>
            </div>

            <!-- Button Test -->
            <div class="card mb-8">
                <h3 class="text-xl font-semibold mb-4">Button Variations Test</h3>
                <div class="flex flex-wrap gap-4">
                    <button class="btn-primary">Primary Button</button>
                    <button class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200">
                        Secondary Button
                    </button>
                    <button class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200">
                        Success Button
                    </button>
                    <button class="bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-200">
                        Danger Button
                    </button>
                </div>
            </div>

            <!-- Typography Test -->
            <div class="card">
                <h3 class="text-xl font-semibold mb-4">Typography Test</h3>
                <div class="space-y-2">
                    <h1 class="text-4xl font-bold text-gray-900">Heading 1 - 4xl</h1>
                    <h2 class="text-3xl font-bold text-gray-800">Heading 2 - 3xl</h2>
                    <h3 class="text-2xl font-semibold text-gray-700">Heading 3 - 2xl</h3>
                    <p class="text-lg text-gray-600">Large paragraph text - text-lg</p>
                    <p class="text-base text-gray-600">Base paragraph text - text-base</p>
                    <p class="text-sm text-gray-500">Small text - text-sm</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h3 class="text-2xl font-bold mb-4">Laravel 12 + Tailwind CSS</h3>
                <p class="text-gray-400 mb-6">Setup berhasil! Semua komponen Tailwind CSS berjalan dengan sempurna.</p>
                <div class="flex justify-center space-x-6">
                    <span class="text-green-400 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Laravel 12 ✓
                    </span>
                    <span class="text-green-400 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Tailwind CSS ✓
                    </span>
                    <span class="text-green-400 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Vite Build ✓
                    </span>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection
