@extends('layouts.admin')


@section('content')

    <h1>Edit users</h1> <br>
    
    
    <div class="col-sm-3">

          {{--<img src="" alt="">--}}
        {{--<img src="{{$user->photo->file??'-'}}" alt="" class="responsive circle">--}}
        <img src="{{$user->photo->file??'-'}}" alt="" class="img-responsive img-circle">
        
    </div>




    <div class="col-sm-9">

        {!! Form::model($user,['method'=>'PATCH','action' => ['AdminUsersController@update',$user->id],'files'=>true]) !!}
    
        @csrf
    
        <div class="form-group">
    
            {!! Form::label('name','Name :') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
    
        </div>
    
        <div class="form-group">
    
            {!! Form::label('email','Email :') !!}
            {!! Form::text('email',null,['class'=>'form-control']) !!}
    
        </div>
    
        <div class="form-group">
            {!! Form::label('role_id','Role :') !!}
            {!! Form::select('role_id',['']+$roles ,null,['class'=>'form-control']) !!}
        </div>
    
        <div class="form-group">
            {!! Form::label('is_active','Status :') !!}
            {!! Form::select('is_active',[1=>'Active',0=>'Not Active'],  null ,['class'=>'form-control']) !!}
        </div>
    
        <div class="form-group">
            {!! Form::label('photo_id','File :') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
        </div>
    
        <div class="form-group">
            {!! Form::label('password','Password :') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>
    
        <div class="form-group">
            {!! Form::submit('Edit user',['class'=>'btn btn-primary col-sm-6']) !!}
        </div>


        {{ Form::close() }}


        {!! Form::open(['method'=>'DELETE','action' => ['AdminUsersController@destroy',$user->id]]) !!}

        <div class="form-group">
            {!! Form::submit('Delete user',['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
        {!!Form::close()!!}




    </div>



        <div class="row">

                @include('errors.include')

        </div>


@stop



