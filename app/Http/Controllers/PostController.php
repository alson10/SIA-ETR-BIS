<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Services;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.post.create_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data =  [
                'title' => $request->input('title'),
                'thumbnail' => $request->input('thumbnail'),
                'content' => $request->input('content'),
                'status' => $request->input('status'),
                'slug' => Str::slug($request->input('title'))
            ];
            if (strval($request->input('status')) == "1") {
                $data['date_posted'] = now();
            };
            Post::create(
                $data
            );
            return json_encode([
                'status' => 200,
            ]);
        } catch (Exception $ex) {
            return json_encode([
                'status' => 500,
                'error' => $ex->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = Post::findOrFail($id);
        return view('admin.post.edit_post', [
            'data' => $result,
        ]);
    }
    public function toggle($id)
    {
        $msg ="";
        $result = Post::findOrFail($id);

        if ($result->status == 0) {
            $result->status = 1;
            $msg = "Successfully Published";
        } else {
            $result->status = 0;
            $msg = "Successfully Unpublished";
        }
        $result->save();
        return redirect()->back()->with('message', $msg);
    }
    public function delete($id)
    {
        $result = Post::findOrFail($id);
        $result->delete();

        return redirect()->back()->with('message', 'Deleted successfully');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $post = Post::find($request->input('id'));
            $post->title = $request->input('title');
            $post->thumbnail = $request->input('thumbnail');
            $post->content = $request->input('content');
            $post->status = $request->input('status');
            $post->slug = Str::slug($request->input('title'));
            $post->save();
            return json_encode([
                'status' => 200,
            ]);
        } catch (Exception $ex) {
            return json_encode([
                'status' => 500,
                'error' => $ex->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
