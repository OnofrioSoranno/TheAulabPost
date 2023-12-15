<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Mail\CareerRequestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('home', 'register', 'login');  
    }

    // homePage
    public function home(){
        $articles = Article::where('is_accepted', TRUE)->orderBy('created_at', 'desc')->take(4)->get();
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

    // form ruolo
    public function careersSubmit(Request $request)
    {
        $request -> validate([
            'role' => 'required',
            'email' =>'required|email',
            'message' => 'required',
        ]);
        $user = Auth::user();
        $role = $request->role;
        $email = $request->email;
        $message = $request->message;

        Mail::to('admin@theaulabpost.it')->send(new CareerRequestMail(compact('role', 'email', 'message')));
        
        switch ($role) {
            case 'admin':
                $user -> is_admin = NULL;
                break;
            
            case 'revisor':
                $user -> is_revisor = NULL;
                break;
            case 'writer':
                $user -> is_writer = NULL;
                break;
        }
        
        $user->update();    
        return redirect(route('home'))->with('message', 'Grazie per averci contattato.');
    }


}
