@extends('layout')

@section('title', $post->title)


@section('content')

    <div class="mt-2 mb-2" data-bs-theme="dark">
        <a class="btn btn-secondary" href="{{ route('posts.index') }}">Back</a>
    </div>

    <table class="table table-dark table-hover">
        <tr class="table-info">
            <td class="table-info">id</td>
            <td class="table-primary">title</td>
            <td class="table-primary">content</td>
            <td class="table-primary">author</td>
            <td class="table-primary">created_ed</td>
            <td class="table-primary">updated_ed</td>
            <td class="table-danger">Delete</td>
            <td class="table-secondary">Update</td>
        </tr>
        <tr class="table-info">
            <td class="table-info">{{ $post->id }}</td>
            <td class="table-primary">{{ $post->title }}</td>
            <td class="table-primary">{{ $post->content }}</td>
            <td class="table-primary">{{ $post->author()->withTrashed()->first()->name }}</td>
            <td class="table-primary">{{ $post->created_at->format('d.m.Y H:i:s') }}</td>
            <td class="table-primary">{{ $post->updated_at->format('d.m.Y H:i:s') }}</td>
            <form action="{{  route('posts.destroy', $post)  }}" method="POST">
                @csrf
                @method('DELETE')
                <td class="table-danger">
                    <button type="submit" class="btn"> &#10060;</button>
                </td>
                <td class="table-secondary"><a class="btn" href="{{ route('posts.edit', $post)  }}">&#9999;</a></td>
            </form>
        </tr>
    </table>

@endsection
