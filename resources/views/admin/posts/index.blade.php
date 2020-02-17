@extends('layouts.admin');





@section('content')


    <h1>Posts</h1>  <br>


    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category_ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        <tr>

        @if($posts)

            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="40" width="40" src="{{$post->photo->file??'-'}}" alt=""></td>
                    <td>{{$post->user->name}}</td>
                    <td>{{$post->category->name??'-'}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    {{--<td>{{$user->is_active==1?'Active':'Not Active'}}</td>--}}
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                <tr>
            @endforeach

        @endif

                </tr>
        </tbody>
    </table>

    @stop




