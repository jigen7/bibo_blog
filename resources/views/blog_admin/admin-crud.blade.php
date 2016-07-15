@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Insert a new Post</div>

                <div class="panel-body">

                     <form class="form-horizontal" role="form" method="POST" action="{{ url('/updatepost') }}">
                        {{ csrf_field() }}
                        <input id="postid" name="postid" type="hidden" value=" {{ $blog->id }}">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ $blog->title }}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Slug</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="slug" value="{{ $blog->slug }}">

                                @if ($errors->has('slug'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Content</label>

                            <div class="col-md-6">
                                <textarea id="content" type="text" class="form-control" name="content" >{{ $blog->content }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Update Post
                                </button>
                            </div>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </form>

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/deletepost') }}">
                        {{ csrf_field() }}
                         <input id="postid" name="postid" type="hidden" value=" {{ $blog->id }}">
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Delete Post
                                    </button>
                                </div>
                        </div>
                     </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
