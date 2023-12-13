<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('home', 'register', 'login');  
    }

    // homePage
    public function home(){
        $articles = Article::orderBy('created_at', 'desc')->take(4)->get();
        return view('welcome', compact('articles')); 
    }
    // funzione pagina per registrarti
    public function register(){
        return view('auth.register');
    }
    // funzione login
    public function login(){
        return view('auth.login');
    }

    // lavora con noi
    public function careers(){
        return view('careers');
    }


}
