<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use Toastr;
use App\User;
use App\Notifications;
use Notification;
use App\Discussion;
use App\Reply;

use Illuminate\Http\Request;

class DiscussionsController extends Controller
{
    public function create()
    {
        return view('discussions.discuss');
    }


    public function store()
    {
            $r = request();

            $this->validate($r,[
                'title'=>'required',
                'content'=>'required',
                'channel_id'=>'required'
            ]);
            
            $discussion=Discussion::create([
                'title'=>$r->title,
                'content'=>$r->content,
                'channel_id'=>$r->channel_id,
                'user_id'=>Auth::id(),
                'slug'=>str_slug($r->title)
            ]);
            

            
            Toastr::success('Discussion made successfuly :)','Success');

            return redirect()->route('discussions',['slug'=>$discussion->slug]);

    }


    public function show($slug)
    {
        $discussion = Discussion::where('slug',$slug)->first();
        $best_answer = $discussion->replies()->where('best_answer', 1)->first();


        return view('discussions.show')
                                ->with('d',$discussion)
                                   ->with('best_answer', $best_answer);

    }

    public function reply($id)
    {
        $d = Discussion::find($id);
        $reply = Reply::create([
            'user_id' => Auth::id(),
            'discussion_id' => $id,
            'content' => request()->reply
        ]);
        
        $reply->user->points += 25;
        $reply->user->save();
        
        $watchers = array();
        foreach ($d->watchers as $w ) {
            array_push($watchers, User::find($w->user_id));
        }

       Notification::send($watchers, new \App\Notifications\NewReplyAdded($d));
        
        Toastr::success('Reply made successfuly :)','Success');

        return redirect()->back();
    }

    public function edit( $slug )
    {
        return view('/discussions/edit')->with('d' ,Discussion::where('slug', $slug )->first());
    }
    
    public function update($id)
    {
        $this->validate(request(),[
            'content' => 'required',
        ]);

        $d=Discussion::find($id);
        $d->content = request()->content;
        $d->save();
    
        Toastr::success('Edit made successfuly :)','Success');

        return redirect()->route('discussions', ['slug' => $d->slug]);


    }

}
