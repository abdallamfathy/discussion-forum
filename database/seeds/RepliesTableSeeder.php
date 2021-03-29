<?php

use Illuminate\Database\Seeder;
use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [
            'user_id' => 1,
            'discussion_id' => 1,
            'content' => 'Lorem ipsium of cnasd jkadsh nmaw jkhnd bas kn'
        ];
        $r2 = [
            'user_id' => 1,
            'discussion_id' => 2,
            'content' => 'Lorem ipsium of cnasd jkadsh nmaw jkhnd bas kn'
        ];
        $r3 = [
            'user_id' => 2,
            'discussion_id' => 3,
            'content' => 'Lorem ipsium of cnasd jkadsh nmaw jkhnd bas kn'
        ];
        $r4 = [
            'user_id' => 4,
            'discussion_id' => 4,
            'content' => 'Lorem ipsium of cnasd jkadsh nmaw jkhnd bas kn'
        ];


        Reply::create($r1);
        Reply::create($r2);
        Reply::create($r3);
        Reply::create($r4);


    }
}
