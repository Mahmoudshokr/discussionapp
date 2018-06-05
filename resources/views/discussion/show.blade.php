@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <img class="rounded" height="30px" width="30px" src="{{$dis->user->avatar}}" alt=""> {{$dis->user->name}},<b> {{$dis->created_at->diffForhumans()}}
                        {!! Form::model($dis,['method'=>'DELETE','action'=>['DiscussionController@destroy',$dis->id]]) !!}
                        {!! Form::token() !!}
                        {!! Form::submit('Remove',['class'=>'btn btn-danger float-right']) !!}
                        {!! Form::close() !!}

                    </div>

                    <div class="card-body text-center">
                        <h4>{{$dis->title}}</h4>
                        <p>{{$dis->content}}</p>
                    </div>

                    <div class="card-footer">
                       {{$dis->replies->count() ? $dis->replies->count().' Replies' :'No Replies Yet.'}}
                    </div>

                    @foreach($dis->replies as $reply)
                        <div class="card-footer">
                            <div class="card-body" style=" border-radius: 55px; background-color:white;">
                                <img class="rounded" height="30px" width="30px" src="{{$reply->user->avatar}}" alt=""> {{$reply->user->name}},<b> {{$reply->created_at ? $reply->created_at->diffForhumans() : ''}}</b><br>
                                <p class="small" style="font-size: 17px">&numsp;&nbsp;&numsp;&nbsp;&numsp;&nbsp;&numsp;&nbsp; {{$reply ? $reply->content : 'No Replies Yet.'}}</p class="small">
                            </div>
                            <div style="margin-left: 55px;">
                            @if($reply->is_liked_by_auth_user())
                                <a href="#" class="btn-btn-default btn-xs">unlike</a>
                             @else
                                <a href="#" class="btn-btn-info btn-xs">like</a>
                            @endif
                            </div>
                            <hr>
                        </div>
                    @endforeach
                    <div class="card-footer text-center">
                        {!! Form::open(['method'=>'POST','action'=>'ReplyController@store']) !!}

                            {!! Form::token() !!}
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-1">
                                    <img class="rounded" style="margin-left: 20px; margin-top: 3px" height="30px" width="30px" src="{{Auth::user()->avatar ? Auth::user()->avatar: 'ava' }}" alt="">
                                </div>
                                <div class="col-sm-11">
                                    <input type="hidden" name="dis_id" value="{{$dis->id}}">
                                    {!! Form::text('Reply',null,['class'=>'form-control','style'=>'border-radius:15px','required','placeholder'=>'Write a reply... ']) !!}
                                </div>
                            </div>
                        </div>
                            </div>
                        {!! Form::close() !!}
                    </div>

                </div>
                <br>

            </div>
        </div>
    </div>
@endsection
