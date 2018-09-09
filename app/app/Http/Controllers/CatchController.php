<?php

namespace App\Http\Controllers;

//use DOMDocument;
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

    private function outerHTML($e) {
        $doc = new \DOMDocument();
        $doc->appendChild($doc->importNode($e, true));

        return $doc->saveHTML();
    }

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
//        dd($request->post('articles'));
        Article::insert($data);

        return response(['ok']);
//        dd($request->all());
    }
}
