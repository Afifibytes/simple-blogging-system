@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav">
                <ul class="nav nav-pills nav-stacked">
                    @foreach($categories as $category)
                        <li><a href="/home?category={{ $category->label }}">{{ $category->label }}</a></li>
                    @endforeach
                </ul><br>
                @can('add_new_article')
                    <a class="btn btn-primary" href="/articles/new">Add New Article</a>
                @endcan
            </div>

            <div class="col-sm-9">
                <h4><small>RECENT POSTS</small></h4>
                @foreach($articles as $article)
                    <hr>
                    <h2>{{ $article->title }}</h2>
                    <h5><span class="glyphicon glyphicon-time"></span> Published on {{ $article->published_at }}</h5>
                    <h5>
                        @foreach($article->categories as $category)
                            <a class="label label-primary" href="/articles?category={{ $category->label }}">{{ $category->label }}</a>
                        @endforeach
                    </h5><br>
                    <p> {{ $article->body }}</p>
                    <br><br>

                    <p><span class="badge">{{ count($article->comments) }}</span> Comments:</p><br>

                    <div class="row">
                        @foreach($article->comments as $comment)
                            <div class="col-sm-10">
                                <h4>{{ $comment->user->name }}<br><small>{{ $comment->published_at }}</small></h4>
                                <p>{{ $comment->content }}</p>
                                <br>
                            </div>
                        @endforeach
                    </div>

                    <h4>Leave a Comment:</h4>
                    <form role="form" method="POST" action="{{ route('comment.save') }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" id="content" name="content"  rows="3" required></textarea>
                            <input type="hidden" id="article" name="article" value="{{ $article->id }}">
                            <input type="hidden" id="user" name="user" value="{{ Auth::user()->id }}">
                        </div>
                        <button type="submit" class="btn btn-primary">comment</button>
                    </form>
                    <br><br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
