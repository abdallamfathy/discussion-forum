@extends('layouts.app')

@section('content')
        

        @foreach($discussions as $d)

            <div class="card bg-default " style="margin-bottom:25px">
                <div class="card-header  ">
                <img src="{{asset('/avatars' . $d->user->avatar)}}" alt=""width="70px" height="70px">&nbsp;&nbsp;&nbsp;
                
                <span>{{$d->user->name}}, <b>{{$d->created_at->diffForHumans()}}</b></span>

                @if ($d->hasBestAnswer())
                    <span class="btn btn-sm btn-success float-right">closed</span>

                @else 
                    <span class="btn btn-sm btn-danger float-right">open</span>
                @endif
               <a href="{{route('discussions',['slug'=>$d->slug])}}" class="btn btn-dark btn-sm float-right" role="button" style="margin-right: 8px">view</a>
                </div>

                <div class="card-body ">
                    <h4 class="text-center">
                       <b> {{$d->title}}</b>
                        </h4>
                    <p class="text-center">
                        {{str_limit($d->content,100)}}
                        </p>
                </div>

                <div class="card-footer">
                  <span> {{$d->replies->count()}} <b style="text-decoration:none; color:grey;">Replies</b> </span>
                  <a href="{{route('channel',['slug'=>$d->channel->slug])}}" class ="float-right btn btn-outline-secondary btn-sm">{{$d->channel->title}}</a>
                    </div>
                    
            </div>
        
       @endforeach

        <div class="col-xs-1 text-center">
       {{$discussions->links()}}
       </div>
@endsection
