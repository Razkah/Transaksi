<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class DataMenuContoller extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('grafik.data', compact('menu'));
    }
}
