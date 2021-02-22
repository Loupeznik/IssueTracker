@extends('index')
@section('title', 'Login')
@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body center-items">
                <h2>Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group">
                        <label>Username</label><br>
                        <input type="text" name="username" value="{{ old('username') }}">
                        @error('username')
                        <p class="text-warning">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input-group">
                        <label>Password</label><br>
                        <input type="password" name="password">
                        @error('password')
                        <p class="text-warning">{{ $message }}</p>
                        @enderror
                    </div>
                    <input type="submit" name="submitForm" value="Login">
                </form>
                <a href="/issues/"><button>Continue as guest</button></a>
            </div>
        </div>
    </div>
@endsection
