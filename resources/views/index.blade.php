@extends('layout')
@section('title', 'Welcome')

@section('content')
    <div class="container py-4">
        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5 text-bg-dark rounded-3">
                    <h2><a class="h2" href="{{ route('users.index') }}">Users</a></h2>
                    <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look.
                        Then, mix and match with additional component themes and more.</p>
                    <a class="btn btn-outline-light" type="button" href="{{ route('users.index') }}">Go to page</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h2><a class="h2" href="{{ route('posts.index') }}">Posts</a></h2>
                    <p>Or, keep it light and add a border for some added definition to the boundaries of your content.
                        Be sure to look under the hood at the source HTML here as we've adjusted the alignment and
                        sizing of both column's content for equal-height.</p>
                    <a class="btn btn-outline-secondary" type="button" href="{{ route('posts.index') }}">Go to page</a>
                </div>
            </div>
        </div>

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h2 class="display-5 fw-bold">Custom jumbotron</h2>
                <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one
                    in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it
                    to your liking.</p>
                <button class="btn btn-primary btn-lg" type="button">Example button</button>
            </div>
        </div>
        <footer class="pt-3 mt-4 text-muted border-top">
            &copy; {{ date('Y') }}
        </footer>
    </div>
@endsection
