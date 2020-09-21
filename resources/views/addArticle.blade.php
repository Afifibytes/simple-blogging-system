@extends('layouts.app')

@section('content')
    <div class="article-form">
        <h1 id="title" name="body" style="padding: 50px; text-align: center">Add New Article</h1>
        <form method="POST" action="{{ route('article.save') }}">
            @csrf
            <div class="form-group">
                <label for="title">Article Title</label>
                <input id="title" name="title" class="form-control" placeholder="Article Title">
            </div>
            <div class="form-group">
                <label for="body">Article Body</label>
                <textarea class="form-control" id="body" name="body" rows="8"></textarea>
            </div>
            <div class="form-group">
                <label for="categories">Category</label>
                <select multiple id="categories" name="categories[]" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->label }}</option>
                    @endforeach
                </select>
            </div>
            <a href="{{ route('home') }}" class="btn btn-primary" style="alignment: center">Back</a>
            <button type="submit" class="btn btn-primary" style="alignment: center">Publish</button>
        </form>
    </div>
@endsection
