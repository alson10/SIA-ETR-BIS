<?php

namespace App\Http\Controllers;

use App\Models\BarangayPosition;
use App\Models\Official;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class OfficialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.officials.index', [
            'officials' => Official::with('relation')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.officials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'position' => [
                'required',
                'string',
                Rule::exists('barangay_positions', 'id')
            ],
            'term_start' => 'required|date',
            'term_end' => 'required|date',
        ]);
        Official::create($request->all());

        return redirect()->route('officials.index')->with('message','Added Successfully');
    }
    public function toggle($id){
        $official = Official::findOrFail($id);
        $msg = "";
        if($official->status == 0){
            $official->status = 1;
            $msg = 'Successfully set to active';
        }else{
            $official->status = 0;
            $msg = 'Successfully set to inactive';
        }
        $official->save();
        return redirect()->back()->with('message',$msg);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.officials.edit', [
            'official' => Official::with('relation')->findOrFail($id),
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Official $official)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'position' => [
                'required',
                'string',
                Rule::exists('barangay_positions', 'id')
            ],
            'term_start' => 'required|date',
            'term_end' => 'required|date',
        ]);

        $official->update($request->all());
        return redirect()->route('officials.index')->with('message','Updated Successfully');
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
