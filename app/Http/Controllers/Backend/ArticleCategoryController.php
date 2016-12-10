<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Backend\Controller;
use App\ArticleCategory;

class ArticleCategoryController extends Controller
{
    /**
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $articleCategories = ArticleCategory::withTrashed()->paginate(10);

        $data = ['articleCategories' => $articleCategories];
        return view('backend.articleCategory.index', $data);
    }

    /**
     * view article category
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(Request $request, $id)
    {
        $articleCategory = ArticleCategory::withTrashed()->find($id);

        $data = ['articleCategory' => $articleCategory];
        return view('backend.articleCategory.view', $data);
    }


    /**
     * create article category
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $articleCategory = new ArticleCategory();

        $data = ['articleCategory' => $articleCategory];
        return view('backend.articleCategory.create', $data);
    }

    /**
     * edit article category
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $articleCategory = ArticleCategory::withTrashed()->find($id);

        $data = ['articleCategory' => $articleCategory];
        return view('backend.articleCategory.edit', $data);
    }

    /**
     * update article category
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $articleCategory = ArticleCategory::withTrashed()->find($id);
        $articleCategory->fill($request->all())->save();

        return redirect('backend/articleCategory/index');
    }

    /**
     * store article category
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        ArticleCategory::create($request->all());

        return redirect('backend/articleCategory/index');
    }

    /**
     * destroy article category
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Request $request, $id)
    {
        ArticleCategory::destroy($id);

        return redirect('backend/articleCategory/index');
    }

    /**
     * restore article category
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore(Request $request, $id)
    {
        ArticleCategory::withTrashed()->find($id)->restore();

        return redirect('backend/articleCategory/index');
    }
}
