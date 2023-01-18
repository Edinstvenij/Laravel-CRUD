@extends('layout')

@section('title', 'Users page')


@section('content')

    <div class="mt-2 mb-2" data-bs-theme="dark">
        <a class="btn btn-success" href="{{ route('users.create') }}">Create user</a>
        <a class="btn btn-danger" href="{{ route('users.trash') }}">Trash</a>
    </div>
    <table class="table table-dark table-hover">
        <tr class="table-info">
            <td class="table-info">id</td>
            <td class="table-primary">name</td>
            <td class="table-primary">email</td>
            <td class="table-primary">e-mail verify</td>
            <td class="table-danger">Delete</td>
            <td class="table-secondary">Update</td>
            <td class="table-secondary">Show</td>
        </tr>

        @foreach($users as $user)
            <tr class="table-info">
                <td class="table-info">{{ $user->id }}</td>
                <td class="table-primary">{{ $user->name }}</td>
                <td class="table-primary">{{ $user->email }}</td>
                <td class="table-primary">
                    @if($user->email_verified_at)
                        {{ $user->email_verified_at->format('d.m.Y H:i:s') }}
                    @endif
                </td>
                <form action="{{  route('users.destroy', $user)  }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td class="table-danger">
                        <button type="submit" class="btn"> &#10060;</button>
                    </td>
                    <td class="table-secondary">
                        <a class="btn" href="{{ route('users.edit', $user)  }}">&#9999;</a>
                    </td>
                    <td class="table-secondary">
                        <a class="btn" href="{{ route('users.show', $user) }}">&#128269;</a>
                    </td>
                </form>
            </tr>
        @endforeach

    </table>
    {{ $users->links() }}
@endsection
