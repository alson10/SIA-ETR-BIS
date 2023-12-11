<?php

namespace App\Http\Controllers;
use App\Models\Request_list;
use App\Models\Services;
use App\Models\Official;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GenerateCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($user_id, $request_id, $service_name)
    {
        $users = User::where('id', $user_id)->get();
        $services = Services::where('service_name', $service_name)->get();
        $requests = Request_list::where('id', $request_id)->get();
        $userName = User::where('id', $user_id)->get();
        $officials = Official::where('id', 1)->get();
        $currentDate = Carbon::now();

        return view('admin.generate_certificate.view', [
            'users' => $users,
            'requests' => $requests,
            'userName' => $userName,
            'services' => $services,
            'officials' => $officials,
            'currentDate' => $currentDate
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
    public function update(Request $request, $id)
    {
        //
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
