<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBoxInside;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Box;
use App\Models\BoxInside;



class BoxInsideController extends Controller
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
    public function store(Request $request)  // create data 串接DB 做CRUD
    {
        $message = [
            'required' => ':attribute 是必要的', //  顯示中文是必要的
            'between' => ':attribute 的輸入 :input 不在 :min 和 :max 之間'
        ]; // 要記得放入$validator裡 當參數
        $validator = Validator::make($request->all(), [
            'box_id' => 'required|integer', // required 指的是欄位必填 ,且必須為整數
            'milk_id' => 'required|integer',
            'quantity' => 'required|integer|between:1,10', // 使用between 可做數量限制

        ], $message);
        if ($validator ->fails()) {
            return response($validator->errors(), 400); // 告訴前端資料是錯的
        }
        $validateData = $validator->validate(); // 來檢查資料驗證是否正確
        // dd($validateData); // 去POSTMAN 看 得知傳到後端資料(Preview)
        // $form = $request->all();
        $box = Box::find($validateData['box_id']);
        $result = $box->boxinside()->create( ['milk_id' =>$validateData['milk_id'],
                                              'quantity' =>$validateData['quantity']]);

        return response()->json($result);
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
    public function update(UpdateBoxInside $request, $id)
    {
        $form = $request->validated(); // 是validated() 切記!!
        $item = BoxInside::find($id);
        $item ->fill(['quantity' => $form['quantity']]); // 可把此行也改用updte() ,就無需下面 ->save()那行
        $item->save();
        DB::table('box_insides')->where('id', $id)
                                ->update(['quantity' =>$form['quantity'],
                                          'updated_at' => now()]);

        return response()->json(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // DB::table('box_insides')->where('id', $id)
        //                         ->delete();
        BoxInside::withTrashed()->find($id)->forceDelete(); // 要把含softDelte data 刪掉 , 能真的把那筆資料給直接delete
        return response()->json(true);
    }

}
