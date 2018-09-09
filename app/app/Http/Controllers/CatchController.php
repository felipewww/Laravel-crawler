<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CatchController extends Controller
{
    public function index(Request $request)
    {
        return view('catch');
    }

    /**
     * Get HTML content from blog.uplexis, insert "article" tags on array and return to the frontend
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function find(Request $request)
    {
        $contents = file_get_contents("http://blog.uplexis.com.br/?s=".$request->post('search'));

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($contents);

        $elements = $dom->getElementsByTagName('article');

        $found = [];

        foreach($elements as $element){
            array_push($found, $this->outerHTML($element));
        }

        return response(['articles' => $found]);
    }

    /**
     * Detach node "article" found to be stored in array, that will be treated on front-end
     * @param $e
     * @return string
     */
    private function outerHTML($e) {
        $doc = new \DOMDocument();
        $doc->appendChild($doc->importNode($e, true));

        return $doc->saveHTML();
    }

    /**
     * Store at database articles found on cURL request
     * @see find
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function importFoundArticles(Request $request)
    {
        $data = [];
        foreach ($request->post('articles') as $article){
            array_push($data, [
                'user_id' => Auth::user()->id,
                'titulo' => $article['title'],
                'link' => $article['link'],
                'resumo' => $article['summary'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }

        Article::insert($data);

        return response(['ok']);
    }
}
