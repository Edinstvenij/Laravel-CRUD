@extends('layout')

@section('title', 'Users page')


@section('content')

    <div class="mt-2 mb-2" data-bs-theme="dark">
        <a class="btn btn-secondary" href="{{ route('home') }}">Back</a>
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
                        <a class="btn" href="{{ route('users.edit', $user->id)  }}">&#9999;</a>
                    </td>
                    <td class="table-secondary">
                        <a class="btn" href="{{ route('users.show', $user->id) }}">&#128269;</a>
                    </td>
                </form>
            </tr>
        @endforeach

    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination  justify-content-center">
            <li class="page-item">
                <a class="page-link @disabled(!$users->previousPageUrl())" href="{{ $users->previousPageUrl() }}"
                   aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a>
            </li>
            @if($users ->currentPage() - 1 > 0)
                <li class="page-item"><a class="page-link"
                                         href="{{ $users->url($users->currentPage() - 1) }}">{{ $users ->currentPage() - 1 }} </a>
                </li>
            @endif
            <li class="page-item active"><a class="page-link"
                                            href="{{ $users->url($users->currentPage()) }}">{{ $users->currentPage() }}</a>
            </li>
            @if($users->currentPage() + 1 <= $users->lastPage())
                <li class="page-item"><a class="page-link"
                                         href="{{ $users->url($users->currentPage() + 1) }}">{{ $users->currentPage() + 1 }}</a>
                </li>
            @endif
            <li class="page-item">
                <a class="page-link @disabled(!$users->nextPageUrl())" href="{{ $users->nextPageUrl() }}"
                   aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
@endsection
