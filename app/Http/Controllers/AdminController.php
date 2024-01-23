<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $adminRequests = User::where('is_admin', NULL)->get();
        $revisorRequests = User::where('is_revisor', NULL)->get();
        $writerRequests = User::where('is_writer', NULL)->get();
        
        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests'));
    }
    
    // rende utente admin
    public function setAdmin(User $user)
    {
        $user->update([
            'is_admin'=>true,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai reso l\'utente amministratore.');
    }

    // rende l'utente revisore
    public function setRevisor(User $user)
    {
        $user->update([
            'is_revisor'=>true,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai reso l\'utente revisore.');
    }

    // rende l'utente redattore
    public function setWriter(User $user)
    {
        $user->update([
            'is_writer'=>true,
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai reso l\'utente redattore');
    }

    public function editTag(Request $request, Tag $tag){
        $request->validate([
            'name'=>'required|unique:tags',
        ]);
        $tag->update([
            'name'=>strtolower($request->name),
        ]);
        return redirect(route('admin.dashboard'))->with('message', 'Hai aggiornato correttamente il tag');
    }
    
    public function deleteTag(Tag $tag){
        foreach ($tag->articles as $article){
            $articles->tag->detach($tag);
        }
        
        $tag->delete();
        
        return redirect(route('admin.dashboard'))->with('message', 'Hai eliminato correttamente il tag');
    }
}       
