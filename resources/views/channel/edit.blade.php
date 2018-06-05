@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit a channel title:</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        {!! Form::model($chs,['method'=>'PUT','action'=>['ChannelController@update',$chs->id]]) !!}

                        {!! Form::token() !!}
                        <div class="form-group">
                            {!! Form::text('title',null,['class'=>'form-control','required','placeholder'=>'']) !!}<br>
                            {!! Form::submit('Update',['class'=>'btn btn-primary','style'=>'margin-left:300px;']) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
