<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Milk;

class MilkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Milk::upsert([
            ['id' => 9,'title' => '固定資料', 'content' => '固定內容', 'sales' => rand(0,500), 'quantity'=> 50], // 要產生固定資料的資料群 ,使用rand()每當執行 就會改變
            ['id' => 11,'title' => '固定資料', 'content' => '固定內容', 'sales' => rand(0,500), 'quantity'=> 50]

        ],['id'],['sales', 'quantity']); // ['id'],['sales', 'quantity'] 中的['id']為要是沒有找到有那筆id則會見建立新id ,要是有找到則會更新, 更新是針對
        // 更新是針對既有設定的['sales', 'quantity']欄位,其他像是 title, content 就算更動也不會做更新

    }
}
