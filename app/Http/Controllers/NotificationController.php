<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Users\MyRequestController;
use App\Models\Notification;
use App\Models\Request_list;
use App\Models\User;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class NotificationController extends Controller
{
    public  function generateCertificate($user_id, $request_id, $status)
    {

        $requests = Request_list::all();
        return view('admin.request.cert_indigency', [
            'requests' => $requests,
        ]);
    }
    public  function createNotification($user_id, $request_id, $status)
    {
        $data = [
            'from_id' =>  Auth::user()->id,
            'to_id' => $user_id,
            'seen' => 0,
            'redirect_link' => "/users/myrequest/" . $user_id
        ];
        if (strval($status) == "1") {
            $data['content'] = "Your request is already processing";

            //     $requests = Request_list::all();
            //     return view('admin.request.cert_indigency', [
            //         'requests' => $requests,
            // ]);

        }
        if (strval($status) == "2") {
            $data['content'] = "Your request is ready to pick up.";
        }
        if (strval($status) == "3") {
            $data['content'] = "Your request is already picked up.";
        }
        $notification = Notification::create(
            $data,
        );
        $notification->redirect_link = "/users/myrequest/" . $request_id . "/" . $notification->id;
        $notification->save();
        $request = Request_list::find($request_id);
        $request->status = $status;
        $request->save();

        // Fetch service_name based on service_id
        $service = Services::find($request->service_id);
        $service_name = $service->service_name;

        // fetch the email based on owner_id
        $user = User::find($request->owner_id);

        // Send email
        Mail::send('emails.processing', [
            'status' => $data['content'],
            'request_name' => $service_name, // Update this line
            'purpose' => $request->purpose,
            'date' => date_format(date_create($request->created_at), 'D M d, Y - h:i A'),
        ], function ($message) use ($user) {

            $logoPath = public_path('public/assets/stamariaa.png'); // Update the path to your logo file
            $message->embed($logoPath, 'logo'); // Embed the logo with a unique identifier

            $message->to($user->email);
            $message->subject('Request Status');
        });

        return redirect()->route('request');
    }
    public function getUserNotifations(Request $request)
    {
        //unseen
        if (intval($request->input('type')) == 0) {
            return json_encode(Notification::where('to_id', '=', Auth::user()->id)
                ->where('seen', '=', '0')
                ->get());
        }
        // all
        return json_encode(Notification::where('to_id', '=', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get());
    }
    public function timeForHumans(Request $request)
    {
        $result = Carbon::parse($request->input('date'))->diffForHumans();
        return $result;
    }
}
