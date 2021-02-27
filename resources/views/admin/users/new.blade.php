@extends('index')
@section('title','User Management - Add User')
@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body center-items">
                <h2>Add user account</h2>
                <form method="POST" action="/admin/user/add">
                    @csrf
                    <div class="input-group">
                        <label>Username</label><br>
                        <input type="text" name="username" value="{{old('username')}}" required>
                        @error('username')
                            <p class="text-warning">{{$errors->first('username')}}</p>
                        @enderror
                    </div>
                    <div class="input-group">
                        <label>Name</label><br>
                        <input type="text" name="name" value="{{old('name')}}">
                        @error('name')
                            <p class="text-warning">{{$errors->first('name')}}</p>
                        @enderror
                    </div>
                    <div class="input-group">
                        <label>Email</label><br>
                        <input type="email" name="email" value="{{old('email')}}" required>
                        @error('email')
                            <p class="text-warning">{{$errors->first('email')}}</p>
                        @enderror
                    </div>
                    <div class="input-group">
                        <label>Password</label><br>
                        <input type="password" name="password" value="{{old('password')}}" uk-tooltip="title: You should encourage the user to change the password upon first login; pos: bottom-left" required>
                        @error('password')
                            <p class="text-warning">{{$errors->first('password')}}</p>
                        @enderror
                    </div>
                    <div class="input-group">
                        <label>Privileges</label><br>
                        <select name="admin">
                            <option value="0">Regular user</option>
                            <option value="1">Administrator</option>
                        </select>
                        @error('admin')
                            <p class="text-warning">{{$errors->first('admin')}}</p>
                        @enderror
                    </div>
                    <input type="submit" value="Add user">
                </form>
            </div>
        </div>
    </div>
@endsection
