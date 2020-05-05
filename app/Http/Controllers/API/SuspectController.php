<?php

namespace App\Http\Controllers\API;

use App\Model\Suspect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suspect = Suspect::all();
        return response()->json([
            'message' => 'successfully.',
            'status' =>true,
            'error'  => 'no',
            'data' => $suspect
        ], 200);
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
        $doc = new Suspect;
        $doc->fist_name = $request->fist_name;
        $doc->last_name = $request->last_name;
        $doc->nic = $request->nic;
        $doc->address = $request->address;
        $doc->case_id =  $request->case_id;
        
        $doc->save();
        $suspect_id = $doc->id;

        return response()->json([
         'message' => 'uploaded successfully.',
         'status' =>true,
         'error'  => 'no',
         'data' => $suspect_id
     ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Suspect  $suspect
     * @return \Illuminate\Http\Response
     */
    public function show(Suspect $suspect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Suspect  $suspect
     * @return \Illuminate\Http\Response
     */
    public function edit(Suspect $suspect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Suspect  $suspect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suspect $suspect)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Suspect  $suspect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suspect $suspect)
    {
        //
    }
}
