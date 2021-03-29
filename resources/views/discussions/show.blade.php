@extends('layouts.app') @section('content')

<div class="card bg-default ">
    <div class="card-header">
        <img
            src="{{asset('/avatars').$d->user->avatar}}"
            alt=""
            width="70px"
            height="70px">&nbsp;&nbsp;&nbsp;
        <span>{{$d->user->name}}
            <b>({{$d->user->points}})</b>
        </span>

        @if ($d->hasBestAnswer())
                    <span class="btn btn-sm btn-success float-right">closed</span>

                @else 
                    <span class="btn btn-sm btn-danger float-right">open</span>
                @endif

        @if (Auth::id() == $d->user->id)

       @if (!$d->hasBestAnswer())
       <a
       href="{{route('discussion.edit',['slug' => $d->slug])}}"
       class="btn btn-info float-right btn-sm"
       role="button"
       style="margin-right:8px">Edit</a>
       @endif
        @endif

        @if($d->is_being_watched_by_auth_user())
        <a
            href="{{route('discussion.unwatch',['id' => $d->id])}}"
            class="btn btn-dark float-right btn-sm"
            role="button"
            style="margin-right:8px">unwatch</a>
        @else
        <a
            href="{{route('discussion.watch',['id' => $d->id])}}"
            class="btn btn-dark float-right btn-sm"
            role="button"
            style="margin-right:8px">watch</a>
        @endif

    </div>

    <div class="card-body ">
        <h4 class="text-center">
            <b>
                {{$d->title}}</b>
        </h4>
        <hr>
        <p class="text-center">
            {!!   Markdown::convertToHtml($d->content)  !!}
        </p>
    </div>
<hr>
@if ($best_answer)
<div class="text-center" style="padding: 40px">
    <h3 style="color: grey">BEST ANSWER !</h3>
    <div class="card" >
        
        <div class="card-heading bg-success ">
            <img
            src="{{asset('/avatars').$best_answer->user->avatar}}"
            width="70px"
            height="70px">&nbsp;&nbsp;&nbsp;
        <span>{{$best_answer->user->name}} <b>({{$best_answer->user->points}})</b>
        </span>
        </div>

        <div class="card-body">
            {!!   Markdown::convertToHtml($best_answer->content)  !!}
        </div>
    </div>
</div>
    
@endif
    <div class="card-footer">
        <span>
            {{$d->replies->count()}}
            <b style="text-decoration:none; color:grey;">Replies</b>
        </span>
        <a
            href="{{route('channel',['slug'=>$d->channel->slug])}}"
            class="float-right btn btn-outline-secondary btn-sm">{{$d->channel->title}}</a>
    </div>

</div>

@foreach($d->replies as $r)
<div class="card bg-default" style="margin:20px">
    <div class="card-header  ">
        <img
            src="{{asset('/avatars'). $r->user->avatar }}"
            alt=""
            width="70px"
            height="70px">&nbsp;&nbsp;&nbsp;
        <span>{{$r->user->name}}
            <b>({{$r->user->points}})</b>
        </span>
        
        @if(!$best_answer)
        @if (Auth::id() == $d->user->id)
        <a
        href="{{route('reply.best.answer' , ['id' => $r->id])}}"
        class="btn btn-sm btn-primary float-right" style="margin-left: 8px;">Mark as best answer</a>
        @endif
        @endif

        @if (Auth::id() == $r->user->id)
            @if (!$r->best_answer)
            <a
            href="{{route('reply.edit' , ['id' => $r->id])}}"
            class="btn btn-sm btn-info float-right">Edit</a>
            @endif
        @endif
    </div>

    <div class="card-body ">

        <p class="text-center">
            {!!   Markdown::convertToHtml($r->content)  !!}
        </p>
    </div>

    <div class="card-footer ">
        @if($r->is_liked_by_auth_user())
        <a href="{{route('reply.unlike',['id'=>$r->id])}}" class="btn btn-danger">Unlike
            <span class="badge">{{$r->likes->count()}}</span></a>
        @else
        <a href="{{route('reply.like',['id'=>$r->id])}}" class="btn btn-success">Like
            <span class="badge">{{$r->likes->count()}}</span></a>
        @endif
    </div>
</div>
@endforeach

<div class="card bg-default">
    <div class="card-body">
        @if(Auth::check())
        <form action="{{ route('discussions.reply' , ['id' => $d->id])}}" method="post">
            {{csrf_field()}}
            {{method_field('POST')}}

            <div class="form-group">
                <label for="reply">Leave a Reply...</label>
                <textarea name="reply" id="reply" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <button class="btn btn-success float-right" type="submit">Submit a reply</button>
            </div>
        </form>
        @else
        <div class="text-center">
            <h2>Sign in to leave a reply..</h2>
        </div>
        @endif
    </div>
</div>
</div>

@endsection