<?php
/**
 * Created by PhpStorm.
 * User: allen
 * Date: 2017/2/20
 * Time: 15:53
 */

namespace App\Http\Controllers\Backend;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    /**
     * list notifications for user
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mine(Request $request)
    {
        $notifications = Auth::user()->notifications()->paginate();
        $data = ['notifications' => $notifications];

        return view('backend.notification.mine', $data);
    }

    /**
     * mark all as read
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function markall(Request $request)
    {
        Auth::user()->unreadNotifications->markAsRead();

        return back();
    }
}