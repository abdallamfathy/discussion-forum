@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Update a  discussion</div>

    <div class="card-body">
    
        <form action="{{ route('discussion.update', ['id' => $d->id])}}" method="post">
                {{csrf_field()}}
                {{method_field('POST')}}
                

                    <div class="form-group">
                        <label for="content">Ask a question</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{$d->content}}</textarea>
                        </div>

                    <div class="form-group">
                        <button class="btn btn-success float-right" type="submit">Save Discussion changes</button>
                        </div>
        </form>
   
    
    </div>
</div>

@endsection