<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class chenusers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ho = ['Nguyễn','Trần','Lê','Phạm','Hoàng'];
        $lot = ['Văn','Thị','Đặng','Hồ','Nguyễn',''];
        $ten = ['Tâm','Phương','Hòa','Tú','Hậu','Hải','Thảo'];
        for($i=0;$i<10;$i++){
            $ht = Arr::random($ho). ' ' . Arr::random($lot).' '.Arr::random($ten);
            DB::table('users')->insert([
                'name'=>$ht,
                'email'=>Str::random(5).'@gmail.com',
                'password'=> bcrypt('12345678')
            ]);
        }
    }
    
}
