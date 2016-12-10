<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    /**
     * list all articles
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $userId = $request->get('user_id');
        $categoryId = $request->get('category_id');
        if ($userId) {
            $articles = Article::where('user_id', $userId)->paginate();
        } elseif ($categoryId) {
            $articles = Article::where('category_id', $categoryId)->paginate();
        } else {
            $articles = Article::paginate();
        }

        $data = ['articles' => $articles];
        return view('article.index', $data);
    }

    /**
     * view article
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(Request $request, $id)
    {
        $article = Article::find($id);

        $data = ['article' => $article];
        return view('article.view', $data);
    }
}
