<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(): View
    {
        return view('layouts.pages.gallery', [
            'metaTitle' => 'Our Gallery',
            'metaDescription' => 'Explore our featured and latest gallery images',
        ]);
    }



}
