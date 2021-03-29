<?php

namespace App\Http\Controllers;
use App\Like;
use Toastr;
use App\Reply;
use App\Notifications;
use Auth;
use Session;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function like($id)
    {

        Like::create([
            'reply_id'=> $id,
            'user_id'=>Auth::id()
        ]);
       
        Toastr::success('You liked the reply.','Success');

        return redirect()->back();
        
    }

    public function unlike($id)
    {

        $like = Like::where('reply_id',$id)->where('user_id',Auth::id())->first();
        $like->delete();
        
        Toastr::success('You disliked the reply. :)','Success');

        return redirect()->back();

    }

    public function best_answer($id)
        {
            $reply = Reply::find($id);
            $reply->best_answer = 1;
            $reply->save();
            
            $reply->user->points += 100;
            $reply->user->save();
            
            Toastr::success('Best answer marked successfuly :)','Success');

            return  redirect()->back();
        }


    public function edit($id)
    {
        return view('/replies/edit')->with('r', Reply::find($id));
    }


    public function update($id)
    {
        $this->validate(request(),[
            'content' => 'required',
        ]);

        $r = Reply::find($id);
        $r->content = request()->content;
        $r->save();
        Toastr::success('Reply edited successfuly :)','Success');
        
        return redirect()->route('discussions', ['slug' => $r->discussion->slug]);
    }

}
