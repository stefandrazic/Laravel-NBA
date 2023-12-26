<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use App\Models\Team;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function showCreate()
    {
        $teams = Team::all();
        return view("pages.auth.create-article", compact("teams"));
    }

    public function index()
    {
        $news = News::paginate(5);
        return view('pages.news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        $article = News::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id
        ]);
        $article->teams()->attach($request->teams);
        $article->save();
        return redirect('/news')->with('status', 'Thank you for publishing article on www.nba.com');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = News::find($id);
        return view('pages.article', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }

    public function showTeam(string $name)
    {
        $news = Team::where('name', $name)->first()->news()->paginate(5);
        return view('pages.news', compact('news'));
    }
}
