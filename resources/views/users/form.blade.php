@extends('layout')

@section('title', isset($user)? 'Update ' . $user->name : 'Create user')


@section('content')
    <div class="mt-2 mb-2" data-bs-theme="dark">
        <a class="btn btn-secondary" href="{{ route('users.index') }}">Back</a>
    </div>
    <form method="post"
          @if(isset($user))
              action="{{ route('users.update', $user) }}">
                 @method('PUT')
        @else
            action="{{ route('users.store') }}" >
        @endif
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" name="email"
                   placeholder="name@example.com" value="{{ isset($user) ? $user->email : old('email') }}">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Your name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="name"
                   value="{{ isset($user) ? $user->name :old('name') }}">
        </div>

        @if(!isset($user))
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="password"
                       value="{{ old('password') }}">
            </div>
        @endif
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
