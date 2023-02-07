<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Milk;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Milk::create(['title' => '測試資料', 'content' => '測試內容', 'sales' => rand(0,500), 'quantity'=> 50]);
        Milk::create(['title' => '測試資料2', 'content' => '測試內容', 'sales' => rand(0,500), 'quantity'=> 50]);
        Milk::create(['title' => '測試資料3', 'content' => '測試內容', 'sales' => rand(0,500), 'quantity'=> 50]);
        $this->call(MilkSeeder::class); // 要是有多筆class的seeder, 可用此法不用下多次指令, 把這些整合在DatabaseSeeder裡
        $this->command->info('產生固定 milk 資料'); // 加入文字註解

    }
}
