<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MilkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data = $this->getData();
        // $data =DB::table('milks')->get(); // 撈出DB裡資料表資料

        // $data = DB::table('sbl_team_data')  // join
        //             ->join('sbl_teams', 'sbl_teams.id', '=', 'sbl_team_data.team_id')
        //             ->select('*')
        //             ->get();

        //  $data = DB::table('sbl_team_data')  // join
        //             ->join('sbl_teams', function ($join) {
        //                 $join->on('sbl_teams.id', '=', 'sbl_team_data.team_id')
        //                      ->where('sbl_teams.total_win', '>', '200');
        //             })
        //             ->select('*')
        //             ->get();

        // DB::enableQueryLog(); // 兩筆以上之資料
        // $data =DB::table('owner')->insertGetId(['team_id'=>2]); //在 owner 表裡建立新的id
        // $data =DB::table('owner')->insertGetId(['team_id'=>2]);
        // dd(DB::getQueryLog());

        // DB::table('owner')->where(['team_id', 2])->dd(); // 單筆資料
        // DB::table('sbl_team_data')->where('id', 533)->increment('win', 3400); // 表  增加 欄位 值
        DB::table('sbl_team_data')->where('id', 533)->decrement('win'); // 表 減少 欄位 值 , +1 減1 可不需打數值 會預設


        //$data =DB::table('sbl_team_data')->whereraw('win > lost')->get(); //撈出的是 win > lost 之資料

        // $data =DB::table('sbl_team_data')->select('win');
        // $data = $data->addSelect('season')->get();

        // dump($data); // 印出data
        return response(123);
        // return [1,2,3];
        // return response()->view('welcome'); // 就是web.php 裡的view('welcome), 到laravel首頁去
        // return response('123',200); // output: 123
        // return redirect('/'); // 把網址導到首頁 >> laravel 首頁

        // dump($request->query()); // 可以只取得網址列上的參數 .也就是使用post方式 裡面資料是無法看到的
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
        $data = $this->getData();
        $newData = $request->all();
        // array_push($data, $newData); // 因資料是array, 使用array_push()
        $data->push(collect($newData)); // 因下面getData()之資料皆轉為collection,故使用 ->push()
        dump($data);
        return response($data);
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
        // dd($request->all()); // dd會中止
        $form = $request->all();
        $data = $this->getData();
        $selected = $data->where('id', $id)->first();
        $selected =$selected->merge(collect($form));

        return response($selected);

        // dump($selected); // 後端看印出result

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->getData();
        $data = $data->filter(function ($voe) use ($id) {
            return $voe['id'] != $id;
        });
        return response($data->values());
    }

    public function getData()
    {
        return collect([

            collect([
                'id' => 0, // 要做update 、 delete
                'title' => '模擬產品A',
                'content' => '即將推行產品',
                'sales' => 10000
            ]),
            collect([
                'id' => 1,
                'title' => '模擬產品R',
                'content' => '改良修理產品',
                'sales' => 3500
            ]),
            collect([
                'id' => 2,
                'title' => '模擬產品F',
                'content' => '特種版產品',
                'sales' => 6000
            ]),
            collect([
                'id' => 3,
                'title' => '模擬產品W',
                'content' => '傳說級產品',
                'sales' => 150000
            ]),
        ]);
    }
}

