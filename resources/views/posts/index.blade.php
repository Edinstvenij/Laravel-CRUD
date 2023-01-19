@extends('layout')

@section('title', 'Users page')


@section('content')

    <div class="mt-2 mb-2" data-bs-theme="dark">
        <a class="btn btn-secondary" href="{{ route('index') }}">Back</a>
        <a class="btn btn-success" href="{{ route('posts.create') }}">Create user</a>
        <a class="btn btn-danger" href="{{ route('posts.trash') }}">Trash</a>
    </div>
    <table class="table table-dark table-hover">
        <tr class="table-info">
            <td class="table-info">id</td>
            <td class="table-primary">title</td>
            <td class="table-primary">content</td>
            <td class="table-primary">author</td>
            <td class="table-danger">Delete</td>
            <td class="table-secondary">Update</td>
            <td class="table-secondary">Show</td>
        </tr>

        @foreach($posts as $post)
            <tr class="table-info">
                <td class="table-info">{{ $post->id }}</td>
                <td class="table-primary">{{ $post->title }}</td>
                <td class="table-primary">{{ $post->content }}</td>
                <td class="table-primary">{{ $post->author()->first()->name }}</td>
                <form action="{{  route('posts.destroy', $post)  }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td class="table-danger">
                        <button type="submit" class="btn"> &#10060;</button>
                    </td>
                    <td class="table-secondary">
                        <a class="btn" href="{{ route('posts.edit', $post)  }}">&#9999;</a>
                    </td>
                    <td class="table-secondary">
                        <a class="btn" href="{{ route('posts.show', $post) }}">&#128269;</a>
                    </td>
                </form>
            </tr>
        @endforeach

    </table>
    {{ $posts->links() }}
@endsection
