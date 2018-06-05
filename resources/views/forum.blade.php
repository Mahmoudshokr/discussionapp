@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <table class="table">
                            <th scope="col"><a href="{{route('channel.index')}}">Channels</a></th>
                            <th scope="col"><a href="{{route('channel.create')}}"> Create a new channel</a></th>
                        </table>
                    </div>

                    <div class="card-body">
                        <ul>
                        @foreach($channels as $channel)
                            <li>{{$channel->title}}</li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <table class="table">
                          <th scope="col">Discussions</th>
                          <th scope="col"><a href="{{route('discussion.create')}}"> Create a new discussion</a></th>
                    </table>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                            @foreach($discussions as $discussion)
                                <div class="card">
                                    <div class="card-header">
                                       <img class="rounded" height="30px" width="30px" src="{{$discussion->user->avatar}}" alt=""> {{$discussion->user->name}},<b> {{$discussion->created_at->diffForhumans()}}</b>
                                        <a href="{{route('discussion.show',$discussion->id)}}" class="btn btn-info float-right">view</a>

                                    </div>
                                    
                                    <div class="card-body text-center">
                                        <h4>{{$discussion->title}}</h4>
                                        <p>{{str_limit($discussion->content,50)}}</p>
                                    </div>
                                    <div class="card-footer">
                                        {{$discussion->replies->count() ? $discussion->replies->count().' Replies' :'No Replies Yet.'}}
                                    </div>
                                </div><br>
                            @endforeach
                                <div class="text-center" style="padding-left:295px;">
                                    {{$discussions->render()}}
                                </div>



                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
