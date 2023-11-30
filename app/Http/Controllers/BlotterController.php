<?php

namespace App\Http\Controllers;

use App\Models\Blotter;
use Illuminate\Http\Request;

class BlotterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blotters.index', [
            'blotters' => Blotter::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.blotters.create');
    }

    public function settled($id)
    {

        $blotter = Blotter::findorFail($id);
        $blotter->status = 2;
        $blotter->save();
        return redirect()->back()->with('message', 'Successfully updated to settled');
    }
    public function delete($id)
    {

        $blotter = Blotter::findorFail($id);

        if ($blotter->status != 1) {
            return abort(404);
        }
        $blotter->delete();
        return redirect()->back()->with('message', 'Successfully Deleted');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'complainant_name' => 'required',
                'respondent_name' => 'required',
                'victims' => 'required',
                'location' => 'required',
                'date' => 'required|date',
                'type' => 'required',
                'about' => 'required',
            ]
        );
        Blotter::create($request->all());
        return redirect()->route('blotter.index')->with('message', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blotter = Blotter::findorFail($id);
        return view('admin.blotters.show', [
            'blotter' => $blotter,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blotter = Blotter::findOrFail($id);
        if ($blotter->status != 1) {
            return abort(404);
        }
        return view('admin.blotters.edit', [
            'blotter' => $blotter,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blotter $blotter)
    {
        $request->validate(
            [
                'complainant_name' => 'required',
                'respondent_name' => 'required',
                'victims' => 'required',
                'location' => 'required',
                'date' => 'required|date',
                'type' => 'required',
                'about' => 'required',
            ]
        );
        $blotter->update($request->all());
        return redirect()->route('blotter.index')->with('message', 'Updated Successfully');
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
