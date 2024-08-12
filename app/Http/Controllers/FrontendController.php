<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return Inertia::render('frontend/home');
        //  return Inertia::render('Welcome', [
        //     'canLogin' => Route::has('login'),
        //     'canRegister' => Route::has('register'),
        //     'laravelVersion' => Application::VERSION,
        //     'phpVersion' => PHP_VERSION,
        // ]);
    }
    public function aboutus(){
        return Inertia::render('frontend/about',[
            'title' =>'about page'
        ]);
    }
    public function contact(){
        return Inertia::render('frontend/contact',[
            'title' =>'contact page'
        ]);
    }
}
