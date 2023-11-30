<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NewsfeedsImagesModel;
use App\Models\NewsfeedsModel;
use Illuminate\Http\Request;

class NewsfeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.newsfeed.index', [
            'newsfeed' => NewsfeedsModel::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.newsfeed.create');
    }
    public function delete($id)
    {
        $feed = NewsfeedsModel::findOrFail($id);
        $feed->delete();
        return redirect()->back()->with('message', 'Successfully deleted');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newsfeed = NewsfeedsModel::create(
            [
                'content' => $request->input('content'),
                'type' => $request->input('type'),
            ]
        );
        $images = $request->file('images');
        if ($images) {
            foreach ($images as $image) {
                $path = substr($image->storePublicly('public/newsfeeds'), 17);
                NewsfeedsImagesModel::create(
                    [
                        'path' => $path,
                        'newsfeed_id' =>  $newsfeed->id,
                    ]
                );
            }
        }
        return redirect()->route('newsfeed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.newsfeed.edit', [
            'newsfeed' => NewsfeedsModel::findOrFail($id),
            'images' => NewsfeedsImagesModel::where('newsfeed_id', '=', $id)->get()
        ]);
    }
    public function deleteImages($id)
    {
        $image = NewsfeedsImagesModel::findOrFail($id);
        unlink('storage/newsfeeds/' . $image->path);
        $image->delete();
        return redirect()->back()->with('message', 'Removed successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsfeedsModel $feed)
    {

        // dd($feed);
        $feed->update([
            'content' => $request->input('content'),
            'type' => $request->input('type'),
        ]);
        $images = $request->file('images');
        if ($images) {
            foreach ($images as $image) {
                $path = substr($image->storePublicly('public/newsfeeds'), 17);
                NewsfeedsImagesModel::create(
                    [
                        'path' => $path,
                        'newsfeed_id' =>  $feed->id,
                    ]
                );
            }
        }
        return redirect()->route('newsfeed')->with('message', 'Updated successfully');
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
