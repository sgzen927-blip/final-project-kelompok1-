<?php

namespace App\Http\Controllers;

use App\Models\Warga; // Pastikan model Warga di-import
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
      $totalWarga = \App\Models\Warga::count();
    return view('dashboard', compact('totalWarga'));
    }
}