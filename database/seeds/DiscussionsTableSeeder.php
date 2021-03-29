<?php

use Illuminate\Database\Seeder;
use  App\Discussion;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'Implementing a huge laravel exesehan';
        $t2 = 'nothing a huge laravel exesehan';
        $t3 = 'oh yeah a huge laravel exesehan';
        $t4 = 'noo please a huge laravel exesehan';



        $d1 = [
            'title'=>$t1,
            'content'=>'lorem ipmsum some of them is coming now yesh and after no but kia alph',
            'channel_id'=>1,
            'user_id'=>2,
            'slug'=>str_slug($t1)
        ];
        $d2 = [
            'title'=>$t2,
            'content'=>'lorem ipmsum some of them is coming now yesh and after no but kia alph',
            'channel_id'=>1,
            'user_id'=>2,
            'slug'=>str_slug($t2)
        ];
        $d3 = [
            'title'=>$t1,
            'content'=>'lorem ipmsum some of them is coming now yesh and after no but kia alph',
            'channel_id'=>1,
            'user_id'=>2,
            'slug'=>str_slug($t3)
        ];
        $d4 = [
            'title'=>$t1,
            'content'=>'lorem ipmsum some of them is coming now yesh and after no but kia alph',
            'channel_id'=>5,
            'user_id'=>2,
            'slug'=>str_slug($t4)
        ];

        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);
        Discussion::create($d4);


    }
}
