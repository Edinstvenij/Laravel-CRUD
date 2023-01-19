@extends('layout')

@section('title', isset($post) ? 'Update ' . $post->title : 'Create post')


@section('content')
    <div class="mt-2 mb-2" data-bs-theme="dark">
        <a class="btn btn-secondary" href="{{ route('posts.index') }}">Back</a>
    </div>
    <form method="post"
          @if(isset($post))
              action="{{ route('posts.update', $post) }}">
        @method('PUT')
        @else
            action="{{ route('posts.store') }}" >
        @endif
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title"
                   placeholder="Example title" required value="{{ isset($post) ? $post->title : old('title') }}">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control " name="content" id="content" placeholder="content" maxlength="300 px" required >
                {{ isset($post) ? $post->content :old('content') }}
            </textarea>
        </div>

        <div class="mb-3">
            <label for="author_id" class="form-label">Author</label>
            <select class="form-select" aria-label="Default select example" name="author_id" required>
                <option selected>Select author</option>
                @foreach($users as $user)
                    <option
                        @selected(!empty($post) && $post->author->id == $user->id)
                        value="{{$user->id}}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-info" type="submit">Submit</button>
    </form>

    @if ($errors->any())
        <div class="mt-3 alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
