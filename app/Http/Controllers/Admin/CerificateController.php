<?php

namespace App\Http\Controllers\admin;

use PDF;
use App\Http\Controllers\Controller;
use App\Models\Certifacate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CerificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.certificates.index', [
            'certificates' => Certifacate::get(),
        ]);
    }
    public function indigency(Request $request)
    {
    
        $pdf = PDF::loadView('admin.certificates.indigency', [
            'r' => $request->input('r'),
            'p' => $request->input('p'),
            'd' => $request->input('d'),
            'type' => $request->input('type'),
        ]);
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'times-new-roman']);
        return $pdf->download(Str::slug($request->input('type')).now().'.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.certificates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Certifacate::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return json_encode([
            'code' => 200,
        ]);
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
        return view('admin.certificates.edit', [
            'certificate' => Certifacate::findOrFail($id),
        ]);
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
        $certificate = Certifacate::findOrFail($request->input('id'));
        $certificate->title = $request->input('title');
        $certificate->content = $request->input('content');
        $certificate->save();

        return json_encode([
            'code' => 200,
        ]);
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
