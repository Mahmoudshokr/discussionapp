@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Channels <br> <a href="{{route('channel.create')}}">Create channel</a></div>

                    <div class="text-center">
                       {!! Form::open(['method'=>'GET','action'=>'DiscussionController@create']) !!}
                        {!! Form::submit('Create a new Discussion',['class'=>'btn btn-primary']) !!}

                       {!! Form::close() !!}
                    </div>



                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">-</th>
                              <th scope="col">Name</th>
                              <th scope="col">Edit</th>
                                <th scope="col">delete</th>
                            </tr>
                          </thead>
                            @if(count($channels)>0)
                                @foreach($channels as $ch)
                          <tbody>
                            <tr>
                              <th scope="row">{{$ch->id}}</th>
                              <td>{{$ch->title}}</td>
                              <td>
                                 {!! Form::model($ch,['method'=>'GET','action'=>['ChannelController@edit',$ch->id]]) !!}
                                      {!! Form::token() !!}
                                      <div class="form-group">
                                      {!! Form::submit('Edit',['class'=>'btn btn-info']) !!}
                                      </div>
                                 {!! Form::close() !!}
                              </td>
                                <td>
                                    {!! Form::model($ch,['method'=>'DELETE','action'=>['ChannelController@destroy',$ch->id]]) !!}

                                        {!! Form::token() !!}
                                        <div class="form-group">
                                        {!! Form::submit('x',['class'=>'btn btn-danger']) !!}
                                        </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                          </tbody>
                          @endforeach
                            @else
                                <h3>No such data.</h3>
                          @endif
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
