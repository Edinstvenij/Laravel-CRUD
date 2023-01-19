@extends('layout')

@section('title', 'Users trash page')


@section('content')
    <div class="mt-2 mb-2" data-bs-theme="dark">
        <a class="btn btn-secondary" href="{{ route('users.index') }}">Back</a>
    </div>

    @if(count($users) === 0)

        <figure class="text-center">
            <h2 class="h2">Trash is empty!</h2>
        </figure>

    @else

        <table class="table table-dark table-hover">
            <tr class="table-info">
                <td class="table-info">id</td>
                <td class="table-primary">name</td>
                <td class="table-primary">email</td>
                <td class="table-primary">e-mail verify</td>
                <td class="table-primary">created_ed</td>
                <td class="table-primary">updated_ed</td>
                <td class="table-danger">Force Delete</td>
                <td class="table-secondary">Restore</td>
            </tr>
            @foreach($users as $user)
                <tr class="table-info">
                    <td class="table-info">{{ $user->id }}</td>
                    <td class="table-primary">{{ $user->name }}</td>
                    <td class="table-primary">{{ $user->email }}</td>
                    <td class="table-primary">
                        @if($user->email_verified_at)
                            {{ $user->email_verified_at->format('d-M-y') }}
                        @endif
                    </td>
                    <td class="table-primary">{{ $user->created_at->format('d-M-y') }}</td>
                    <td class="table-primary">{{ $user->updated_at->format('d-M-y')?? '' }}</td>
                    <td class="table-danger"><a class="btn"
                                                href="{{ route('users.forceDelete', $user)  }}">&#10060;</a>
                    </td>
                    <td class="table-secondary"><a class="btn"
                                                   href="{{ route('users.restore', $user) }}">&#8635;</a>
                    </td>
                </tr>
            @endforeach

        </table>

        {{ $users->links() }}
    @endif
@endsection
