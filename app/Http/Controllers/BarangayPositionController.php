<?php

namespace App\Http\Controllers;

use App\Models\BarangayPosition;
use Illuminate\Http\Request;

class BarangayPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = BarangayPosition::all();

        return view('admin.position.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.position.create');

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
            'name' => 'required|string|unique:barangay_positions',
        ]);

        BarangayPosition::create($request->all());

        return redirect()->route('barangay_positions.index')
            ->with('success', 'Barangay Position created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.position.edit',[
            'barangayPosition'=>BarangayPosition::findOrFail($id),
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangayPosition $barangayPosition)
    {
        $request->validate([
            'name' => 'required|string|unique:barangay_positions,name,' . $barangayPosition->id,
        ]);

        $barangayPosition->update($request->all());

        return redirect()->route('barangay_positions.index')
            ->with('success', 'Barangay Position updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangayPosition $barangayPosition)
    {
        $barangayPosition->delete();

        return redirect()->route('barangay_positions.index')
            ->with('success', 'Barangay Position deleted successfully.');
    }
}
