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

    /**
     * Datatbales list
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
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

    /**
     * Delete multiple selected from datatables
     * @param Request $request
     */
    public function deleteSelecteds(Request $request)
    {
        $request->validate([
            'articles' => 'array',
        ]);

        $sentIds = $request->post('articles');

        if ( empty($sentIds) ) {
            abort(500, 'No articles selected.');
        }

        Article::deleteIn($sentIds);
    }
}
