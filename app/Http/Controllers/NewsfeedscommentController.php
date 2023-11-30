<?php

namespace App\Http\Controllers;

use App\Models\Newsfeedscomment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsfeedscommentController extends Controller
{
    public function store(Request $request)
    {
        Newsfeedscomment::create([
            'user_id' => Auth::user()->id,
            'newsfeeds_id' => $request->input('id'),
            'comments' => $request->input('comments')
        ]);

        return redirect()->back()->withFragment('comments')->with('message', 'Successfully commented.');
    }

    public function getNewsfeedsComment(Request $request)
    {


        return json_encode(
            Newsfeedscomment::where('newsfeeds_id', "=", $request->id)->with('relation')->limit($request->limit)->get(),
        );
    }
}
