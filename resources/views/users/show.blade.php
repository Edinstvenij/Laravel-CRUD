@extends('layout')

@section('title', $user->name)


@section('content')

    <div class="mt-2 mb-2" data-bs-theme="dark">
        <a class="btn btn-secondary" href="{{ route('users.index') }}">Back</a>
    </div>

    <table class="table table-dark table-hover">
        <tr class="table-info">
            <td class="table-info">id</td>
            <td class="table-primary">name</td>
            <td class="table-primary">email</td>
            <td class="table-primary">e-mail verify</td>
            <td class="table-primary">created_ed</td>
            <td class="table-primary">updated_ed</td>
            <td class="table-danger">Delete</td>
            <td class="table-secondary">Update</td>
        </tr>
        <tr class="table-info">
            <td class="table-info">{{ $user->id }}</td>
            <td class="table-primary">{{ $user->name }}</td>
            <td class="table-primary">{{ $user->email }}</td>
            <td class="table-primary">
                @if($user->email_verified_at)
                    {{ $user->email_verified_at->format('d-M-y') }}
                @endif
            </td>
            <td class="table-primary">{{ $user->created_at->format('d.m.Y H:i:s') }}</td>
            <td class="table-primary">{{ $user->updated_at->format('d.m.Y H:i:s') }}</td>
            <form action="{{  route('users.destroy', $user)  }}" method="POST">
                @csrf
                @method('DELETE')
                <td class="table-danger">
                    <button type="submit" class="btn"> &#10060;</button>
                </td>
                <td class="table-secondary"><a class="btn" href="{{ route('users.edit', $user)  }}">&#9999;</a></td>
            </form>
        </tr>
    </table>

@endsection
