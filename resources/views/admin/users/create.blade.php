@extends('layouts.admin')


@section('content')

    <h1>Create users</h1> <br>

            {!! Form::open(['method'=>'POST','action' => 'AdminUsersController@store','files'=>true]) !!}

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
                    {!! Form::select('role_id',[''=>'select option']+$roles ,null,['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                        {!! Form::label('is_active','Status :') !!}
                        {!! Form::select('is_active',[1=>'Active',0=>'Not Active'],  0 ,['class'=>'form-control']) !!}
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
                    {!! Form::submit('Add user',['class'=>'btn btn-primary']) !!}
                </div>


            {{ Form::close() }}



                <div class="row">

                    @include('errors.include')

                </div>

@stop