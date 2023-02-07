<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Box;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $box = DB::table('boxes')->get()->first();
        // if (empty($box)){
        //     DB::table('boxes')->insert(['created_at' => now(), 'updated_at' => now()]);
        //     $box = DB::table('boxes')->get()->first();

        // }
        // $boxInsides =  DB::table('box_insides')->where('box_id', $box->id)->get();
        // $box = collect($box);
        // $box['insides'] = collect($boxInsides);

        $box = Box::with(['boxinside'])->firstOrCreate(); // firstOrCreate 是會去判斷 ,要是table裡無任何資料, 會自動產生一筆新資料 , 要先把原table 資料淨空(all delete)
        // with() 可建立該相關欄位, 命名用model
        return response ($box);
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
