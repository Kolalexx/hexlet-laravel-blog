<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\StorePostRequest;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate();
        return view('article.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        $request->session()->flash('errors', 'Article was created successful!');

        $article = new Article();
        $article->fill($data);
        $article->save();

        return redirect()
            ->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }
    public function update(StorePostRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        
        $data = $request->validated();

        $request->session()->flash('errors', 'Article was updated successful!');

        $article->fill($data);
        $article->save();
        return redirect()
            ->route('articles.index');
    }

    public function destroy(Request $request, $id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
        }

        $request->session()->flash('errors', 'Article was deleted successful!');

        return redirect()->route('articles.index');
    }
}
