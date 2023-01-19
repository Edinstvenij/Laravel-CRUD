@extends('layout')

@section('title', 'Posts trash page')


@section('content')
    <div class="mt-2 mb-2" data-bs-theme="dark">
        <a class="btn btn-secondary" href="{{ route('posts.index') }}">Back</a>
    </div>

    @if(count($posts) === 0)

        <figure class="text-center">
            <h2 class="h2">Trash is empty!</h2>
        </figure>

    @else

        <table class="table table-dark table-hover">
            <tr class="table-info">
                <td class="table-info">id</td>
                <td class="table-primary">title</td>
                <td class="table-primary">content</td>
                <td class="table-primary">Author</td>
                <td class="table-primary">created_ed</td>
                <td class="table-primary">updated_ed</td>
                <td class="table-danger">Force Delete</td>
                <td class="table-secondary">Restore</td>
            </tr>
            @foreach($posts as $post)
                <tr class="table-info">
                    <td class="table-info">{{ $post->id }}</td>
                    <td class="table-primary">{{ $post->title }}</td>
                    <td class="table-primary">{{ $post->content }}</td>
                    <td class="table-primary">{{ $post->author()->withTrashed()->first()->name }}</td>
                    <td class="table-primary">{{ $post->created_at->format('d.m.Y H:i:s') }}</td>
                    <td class="table-primary">{{ $post->updated_at->format('d.m.Y H:i:s')?? '' }}</td>
                    <td class="table-danger"><a class="btn"
                                                href="{{ route('posts.forceDelete', $post)  }}">&#10060;</a>
                    </td>
                    <td class="table-secondary"><a class="btn"
                                                   href="{{ route('posts.restore', $post) }}">&#8635;</a>
                    </td>
                </tr>
            @endforeach

        </table>

        {{ $posts->links() }}
    @endif
@endsection
