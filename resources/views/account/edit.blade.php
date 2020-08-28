@extends('index')
@section('title','Edit Account')
@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body center-items">
                <h2>Edit account details</h2>
                <form method="POST" action="/account/edit">
                    @csrf
                    @method('PUT')
                    <div class="input-group">
                        <label>Name</label><br>
                        <input type="text" name="name" value="{{$user->name}}">
                        @error('name')
                            <p class="text-warning">{{$errors->first('name')}}</p>
                        @enderror
                    </div>
                    <div class="input-group">
                        <label>Username</label><br>
                        <input type="text" name="username" value="{{$user->username}}">
                        @error('username')
                            <p class="text-warning">{{$errors->first('username')}}</p>
                        @enderror
                    </div>
                    <div class="input-group">
                        <label>Email</label><br>
                        <input type="text" name="email" value="{{$user->email}}">
                        @error('email')
                            <p class="text-warning">{{$errors->first('email')}}</p>
                        @enderror
                    </div>
                    <input type="submit" value="Edit Account">
                </form>
            </div>
        </div>
    </div>
@endsection
