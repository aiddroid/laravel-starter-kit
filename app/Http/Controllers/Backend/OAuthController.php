<?php
/**
 * Created by PhpStorm.
 * User: allen
 * Date: 2016/12/22
 * Time: 11:59
 */

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;

class OAuthController extends Controller
{

    public function index(Request $request)
    {
        return view('backend.oauth.index');
    }
}