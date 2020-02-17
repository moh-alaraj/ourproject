@extends('layouts.admin')


@section('content')

        @if(Session::has('deleted_user'))

            <p class="bg-danger col-lg-2">{{session('deleted_user')}}</p>

        @endif
        @if(Session::has('updated_user'))

            <p class="bg-danger col-lg-2">{{session('updated_user')}}</p>

        @endif
        @if(Session::has('added_user'))

            <p class="bg-danger col-lg-2">{{session('added_user')}}</p>

        @endif
        <br>

    <h1>Users</h1> <br>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
    </thead>
    <tbody>
      <tr>

        @if($users)

             @foreach($users as $user)
                <tr>
                 <td>{{$user->id}}</td>
                 <td><img height="40" width="40" src="{{$user->photo->file??'-'}}" alt=""></td>
                 <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
                 <td>{{$user->email}}</td>
                 <td>{{$user->role->name??'-'}}</td>
                 <td>{{$user->is_active==1?'Active':'Not Active'}}</td>
                 <td>{{$user->created_at->diffForHumans()}}</td>
                 <td>{{$user->updated_at->diffForHumans()}}</td>
                <tr>
             @endforeach

         @endif

       </tr>
    </tbody>
</table>

@stop