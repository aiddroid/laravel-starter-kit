<?php

namespace App\Http\Controllers\Backend;

use App\Notifications\ArticleCreatedNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Backend\Controller;
use App\Article;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class ArticleController extends Controller
{

    /**
     * list all articles
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $articles = Article::search($request->all())->withTrashed()->paginate(10);

        $data = ['articles' => $articles];
        return view('backend.article.index', $data);
    }

    /**
     * view article
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(Request $request, $id)
    {
        $article = Article::withTrashed()->find($id);

        $data = ['article' => $article];
        return view('backend.article.view', $data);
    }

    /**
     * create article
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $article = new Article();

        $data = ['article' => $article];
        return view('backend.article.create', $data);
    }

    /**
     * edit article
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $article = Article::withTrashed()->find($id);

        $data = ['article' => $article];
        return view('backend.article.edit', $data);
    }

    /**
     * update article
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $article = Article::withTrashed()->find($id);
        $article->fill($request->all());

        //check if has icon image
        if ($request->hasFile('icon_image')) {
            $iconImage = $request->file('icon_image');
            $filename = time() . '.' . $iconImage->guessExtension();
            $savePath = public_path('uploads/icons/' . $filename);
            Image::make($iconImage)->resize(300, 300)->save($savePath);
            $article->icon_image = $filename;
        }
        $article->save();

        return redirect('backend/article/index');
    }

    /**
     * store article
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        if ($article = Article::create($request->all())) {
            Auth::user()->notify(new ArticleCreatedNotification($article));
        }

        return redirect('backend/article/index');
    }

    /**
     * destroy article
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, $id)
    {
        Article::destroy($id);

        return redirect('backend/article/index');
    }

    /**
     * restore article
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore(Request $request, $id)
    {
        Article::withTrashed()->find($id)->restore();

        return redirect('backend/article/index');
    }

    /**
     * upload article image
     * @param Request $request
     * @return mixed
     */
    public function uploadImage(Request $request)
    {
        //check if has upload image
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->guessExtension();
            $savePath = public_path('uploads/article-images/' . $filename);
            //resize image to 1000px width
            Image::make($file)->resize(1000, null, function ($constraint) {
                //keep image ratio
                $constraint->aspectRatio();
                //prevent image upsizing
                $constraint->upsize();
            })->save($savePath);

            $data = [
                'id' => $filename,
                'url' => url('uploads/article-images/' . $filename)
            ];

            return response()->json($data);
        }
    }
}
