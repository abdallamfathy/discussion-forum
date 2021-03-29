<?php

namespace App\Http\Controllers;
//use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Session; 
use Toastr;
use Illuminate\Http\Request;
use App\Channel;
use App\Admin;


class ChannelsController extends Controller
{   /**
 * Class constructor.
 */
public function __construct()
{
    $this-> middleware('admin');
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('channels.index')->with('channels',Channel::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'channel'=>'required'
        ]);
        
        Channel::create([
            'title'=>$request->channel,
            'slug' => str_slug($request->channel)
        
            ]);

       
        Toastr::success('Channel created successfuly :)','Success');

        
        return redirect()->route('channels.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('channels.edit')->with('channel',Channel::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        
        $channel=Channel::find($id);
        $channel->title=$request->channel;
        $channel->slug = str_slug($request->channel);
        $channel->save();
        Toastr::success('Channel updated successfuly :)','Success');

        return redirect()->route('channels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Channel::destroy($id);

        Toastr::success('Channel deleted successfuly :)','Success');


        return redirect()->route('channels.index');
    }
}
