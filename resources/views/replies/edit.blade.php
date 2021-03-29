@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Update a  Reply</div>

    <div class="card-body">
    
        <form action="{{ route('reply.update', ['id' => $r->id])}}" method="post">
                {{csrf_field()}}
                {{method_field('POST')}}
                

                    <div class="form-group">
                        <label for="content">Ask a question</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$r->content}}</textarea>
                        </div>

                    <div class="form-group">
                        <button class="btn btn-success float-right" type="submit">Save Reply changes</button>
                        </div>
        </form>
   
    
    </div>
</div>

@endsection