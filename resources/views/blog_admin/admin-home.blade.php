@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard - You are logged in!</div>

                <div class="panel-body">
                <a href="{{ url('/insertpostpage') }}" >Insert New Post</a>
                </div>

            </div>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
            <!-- POSTS DATA -->
            <div class="panel panel-default">
                <div class="panel-heading">Post Data</div>
                 <div class="panel-body">
                        <table class="table">
                        <tr>
                            <td>ID</td>
                            <td>Title</td>
                            <td>Slug</td>
                            <td>Action</td>
                        </tr>
                        @foreach ($blogs as $blog)
                        <tr> 
                        <td>{{ $blog->id }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->slug }}</td>
                        <td> 
                            <a href="{{ url('/viewpost?id=') }}{{ $blog->id }}"> View </a> ||
                            <a href="{{ url('/viewpost?id=') }}{{ $blog->id }}"> Update </a>

                        </tr>
                        @endforeach

                </table>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
