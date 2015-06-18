@extends('layouts.default')

@section('content')
    <div class="jumbotron">
        <h1>Welcome to Larabook!</h1>
        <p>Welcome to the premier place to talk about Laravel with others. Why don't you sign up to see all the fuss is about?</p>
        <p>
            {!! link_to_route('register_path', 'Sign Up!', [], ['class' => 'btn btn-primary btn-lg']) !!}
        </p>
    </div>
@endsection