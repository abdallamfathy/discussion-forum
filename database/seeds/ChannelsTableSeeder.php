<?php

use Illuminate\Database\Seeder;
use App\Channel;
class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 =['title'=>'laravel','slug'=>str_slug('laravel')];
        $channel2 =['title'=>'vuejs','slug'=>str_slug('vuej')];
        $channel3 =['title'=>'react','slug'=>str_slug('react')];
        $channel4 =['title'=>'angular','slug'=>str_slug('angular')];
        $channel5 =['title'=>'java','slug'=>str_slug('java')];
        $channel6 =['title'=>'kotlin','slug'=>str_slug('kotlin')];
        $channel7 =['title'=>'bootstrap','slug'=>str_slug('bootstrap')];
        $channel8 =['title'=>'mongodb','slug'=>str_slug('mongodb')];




        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
        Channel::create($channel8);


    }
}
