<?php

namespace Database\Seeders;
use App\Models\Category;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['本','CD・DVD・Blu-ray','家電','家具','服','玩具','食品','車','バイク','ペット用品','コスメ','チケット','楽器','スポーツ・アウトドア用品','その他'];

        //insert() は Modelの機能を通らずに、DB に直接入れるもの
        //create() は、1回1件だけ入れるメソッドなのでループ
        foreach($names as $name){
            Category::create(['name'=>$name]);
        }


    }


}
