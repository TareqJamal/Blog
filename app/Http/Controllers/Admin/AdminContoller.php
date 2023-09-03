<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminContoller extends Controller
{
    public function getDashboard()
    {
        return view('Admin.other_pages.dashboard');
    }
    public function getCategories()
    {
        return view('Admin.Categories.index');
    }
}
