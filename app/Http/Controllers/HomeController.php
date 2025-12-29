<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cities = ['Abuja', 'Lagos', 'Port Harcourt'];

        $apartments = \App\Models\Apartment::with('images', 'property')
            ->where('is_available', true)
            ->get()
            ->groupBy(fn($a) => $a->property->city);

        return view('home', compact('cities', 'apartments'));
    }
}
