@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        {!! Form::open(['method'=>'POST','action'=>'DiscussionController@store']) !!}

                            {!! Form::token() !!}

                            <label for="select">Select Channel:</label>
                            <div class="form-group">
                                <select name="channel_id" id="channel_id" class="form-control" required>
                                    @foreach($channels as $channel)
                                        <option value="{{$channel->id}}">{{$channel->title}}</option>
                                    @endforeach
                                </select><br>
                                {{-- عن طريق share فى AppServiceProvider--}}{{-- الchannels دى--}}
                                <label for="title">Discussion title: </label>
                                {!! Form::text('title',null,['class'=>'form-control','required','placeholder'=>'']) !!}<br>
                                <label for="content">Discussion head: </label>
                                {!! Form::textarea('content',null,['class'=>'form-control','required','placeholder'=>'','rows'=>'4']) !!}
                                {!! Form::submit('Start discussion',['class'=>'btn btn-success','style'=>'margin-left:300px;']) !!}
                            </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
