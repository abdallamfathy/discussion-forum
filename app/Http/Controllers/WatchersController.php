<?php

namespace App\Http\Controllers;
use App\Watcher;
use Auth;
use Session;
use Toastr;
use Illuminate\Http\Request;

class WatchersController extends Controller
{
    public function watch($id)
    {
       Watcher::create([
           'user_id'=>Auth::id(),
           'discussion_id'=>$id
       ]);

       Toastr::success('You watched the Discussuion :)','Success');


       return redirect()->back()->with('message','Data added Successfully');
    }


    public function unwatch($id)
    {
       $watcher = Watcher::where('discussion_id' , $id)->where('user_id',Auth::id());
       $watcher->delete(); 

       Toastr::success('You watched the Discussuion :)','Success');


       return redirect()->back()->with('message','Data added Successfully');
    }
}
