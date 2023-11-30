<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Request_list;
use Helper;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class MyRequestController extends Controller
{
    public function index($request_id = null, $notification_id = null)
    {
        Helper::seenNotification($notification_id);
        $requests =
            Request_list::select('request_list.id', 'request_list.owner_id', 'request_list.status', 'request_list.purpose', 'request_list.created_at', "services.service_name")
            ->join('services', 'services.id', '=', 'request_list.service_id')
            ->where('request_list.owner_id', "=", Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('users.myrequest', [
            'requests' => $requests,
            'request_id' => $request_id,
            'notification_id' => $notification_id,
        ]);
    }
}
