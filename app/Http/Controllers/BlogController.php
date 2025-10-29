<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        $articles = Article::All();
        return view('welcome', compact('articles'));
    }

    public function profil()
    {
        $articles = Article::where('user_id', Auth::user()->id)->get();
        return view('dashboard', compact('articles'));
    }

    public function show(Article $article)
    {
        $comments      = Comment::where('article_id', $article->id)->get();
        $article       = Article::where('id', $article->id)->get();
        return view('show', compact('article', 'comments'));
    }

    public function create()
    {
        $editMode = 0;
        return view('newArticle', compact('editMode'));
    }

    public function store(Request $request)
    {
        //Validation des champs du formulaire
        $validated = $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);
        $validated['user_id'] = Auth::user()->id;
        //Enregistrement en base
        Article::create($validated);

        return redirect()->route('dashboard')->with('status', 'Votre article à bien été crée ');
    }

    public function edit(Article $article)
    {
        $editMode = 1;
        if (Gate::allows('acces-article', $article)) {

        } else {
            return redirect()->route('dashboard')->with('status', 'Accès non autorise !');
        }
        $article = Article::where('id', $article->id)->get();
        return view('newArticle', compact('editMode', 'article'));
    }

    public function update(Request $request, Article $article)
    {
        //Validation des champs du formulaire
        if (Gate::allows('acces-article', $article)) {

        } else {
            return redirect()->route('dashboard')->with('status', 'Accès non autorise !');
        }
        $article->update(['title' => $request->title, 'content' => $request->content]);
        return redirect()->route('dashboard')->with('status', 'La modification de l\'article est un succées ');
    }

    public function destroy(Article $article)
    {
        if (Gate::allows('acces-article', $article)) {

        } else {
            return redirect()->route('dashboard')->with('status', 'Accès non autorise !');
        }
        $article->delete();
        return redirect()->route('dashboard')->with('status', 'l\'article à bien été supprimé ');
    }

    //Methodes pour les commentaire

    public function commentIndex()
    {
        $comments = Comment::where('user_id', Auth::user()->id)->get();
        return view('comment', compact('comments'));
    }

    public function storeComment(Request $request, Article $article)
    {
        //Validation des champs du formulaire
        $validated = $request->validate([
            'content' => 'required',
        ]);
        $validated['user_id'] = Auth::user()->id;
        $validated['article_id'] = $article->id;
        //Enregistrement en base
        Comment::create($validated);

        return redirect()->route('show',$article->id)->with('status', 'Votre commentaire à bien été crée ');
    }


    public function destroyComment(Comment $comment)
    {
        if (Gate::allows('acces-comment', $comment)) {

        } else {
            return redirect()->route('dashboard.comment')->with('status', 'Accès non autorise !');
        }
        $comment->delete();
        return redirect()->route('dashboard.comment')->with('status', 'le commentaire à bien été supprimé ');
    }
}
