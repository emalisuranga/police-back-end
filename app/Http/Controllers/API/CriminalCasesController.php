<?php

namespace App\Http\Controllers\API;

use App\Model\CriminalCases;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CriminalCasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all CriminalCases
        return CriminalCases::all();
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
        //save CriminalCases
        $doc = new CriminalCases;
               $doc->case_name = $request->case_name;
               $doc->case_category = $request->case_category;
               $doc->case_details = $request->case_details;
               $doc->case_place = $request->case_place;
               $doc->status =  $request->status;
               $doc->officer_id = $request->officer_id;
               
               $doc->save();
               $case_id = $doc->id;

               return response()->json([
                'message' => 'uploaded successfully.',
                'status' =>true,
                'error'  => 'no',
                'data' => $case_id
            ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CriminalCases  $criminalCases
     * @return \Illuminate\Http\Response
     */
    public function show(CriminalCases $criminalCases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CriminalCases  $criminalCases
     * @return \Illuminate\Http\Response
     */
    public function edit(CriminalCases $criminalCases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CriminalCases  $criminalCases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CriminalCases $criminalCases)
    {
        //add officer
        DB::table('criminal_cases')
        ->where('id','=', $criminalCases->id)
        ->update(['officer_id' => $request->officer_id]);

           return response()->json([
            'message' => 'update successfully.',
            'status' =>true,
            'error'  => 'no',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CriminalCases  $criminalCases
     * @return \Illuminate\Http\Response
     */
    public function destroy(CriminalCases $criminalCases)
    {
        //
    }
}
