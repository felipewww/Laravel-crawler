<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        return view('articles');
    }

    public function list(Request $request)
    {
        $start = $request->post('start');
        $length = $request->post('length');

        $articles = Article::skip($start)->take($length)->orderBy('id', 'DESC')->get(['titulo', 'resumo', 'link', 'id']);
        $response['data'] = $articles;

        $total = Article::count();

        $response['recordsTotal'] = $total;
        $response['recordsFiltered'] = $total;

        return response($response);
    }

    public function deleteSelecteds(Request $request)
    {
        $validatedData = $request->validate([
            'articles' => 'array',
        ]);

        $sentIds = $request->post('articles');

        if ( empty($sentIds) ) {
            abort(500, 'No articles selected.');
        }

        Article::deleteIn($sentIds);

        dd($validatedData);
        dd($request->all());
    }
}
