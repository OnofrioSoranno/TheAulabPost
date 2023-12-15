<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function dashboard(){
        $unrevisionedArticles = Article::where('is_accepted', NULL)->get();
        $acceptedArticles = Article::where('is_accepted', TRUE)->get();
        $rejectedArticles = Article::where('is_accepted', FALSE)->get();

        return view('revisor.dashboard', compact('unrevisionedArticles', 'acceptedArticles', 'rejectedArticles'));
    }

    // accetta articolo
    public function acceptArticle(Article $article)
    {
        $article->update([
            'is_accepted' => true,
        ]);
        return redirect(route('revisor.dashboard'))->with('message', 'Hai accettato corettamente l\'articolo.');
    }

    // RIFIUTA ARTICOLO
    public function rejectArticle(Article $article)
    {
        $article->update([
            'is_accepted'=>false,
        ]);
        return redirect(route('revisor.dashboard'))->with('message', 'Hai rifiutato l\'articolo scelto.');
    }

    // RIPORTA A REVISIONE
    public function undoArticle(Article $article)
    {
        $article->update([
            'is_accepted'=> NULL,
        ]);
        return redirect(route('revisor.dashboard'))->with('message', 'Hai riportato a revisione l\'articolo scelto');
    }
}
