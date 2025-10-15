<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();

        // Ambil total data dari inputan admin
        $totalProducts = \App\Models\Product::count();
        $totalGalleries = \App\Models\Gallery::count();
        $totalCompanyInfo = \App\Models\CompanySetting::count();
        $totalAdmins = \App\Models\Admin::count();

        // Data chart dummy, ganti dengan query sesuai kebutuhan
        $months = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
        $produkPerBulan = array_fill(0, 12, 0); // Ganti dengan query produk per bulan
        $galeriPerBulan = array_fill(0, 12, 0); // Ganti dengan query galeri per bulan
    $pieLabels = ["Produk"];
    $pieData = [\App\Models\Product::count()];

        return view('admin.pages.index', [
            'admin' => $admin,
            'title' => 'Dashboard',
            'totalProducts' => $totalProducts,
            'totalGalleries' => $totalGalleries,
            'totalCompanyInfo' => $totalCompanyInfo,
            'totalAdmins' => $totalAdmins,
            'months' => $months,
            'produkPerBulan' => $produkPerBulan,
            'galeriPerBulan' => $galeriPerBulan,
            'pieLabels' => $pieLabels,
            'pieData' => $pieData,
        ]);
    }
}
