@extends('index')
@section('title','User Management - Edit User')
@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body center-items">
                <h2>Edit user privileges</h2>
                <form method="POST" action="/admin/user/{{$user->id}}/edit">
                    @method('PUT')
                    @csrf
                    <div class="input-group">
                        <label>Username</label><br>
                        <input type="text" name="username" value="{{$user->username}}" disabled>
                    </div>
                    <div class="input-group">
                        <label>Name</label><br>
                        <input type="text" value="{{$user->name}}" disabled>
                    </div>
                    <div class="input-group">
                        <label>Email</label><br>
                        <input type="email" value="{{$user->email}}" disabled>
                    </div>
                    <div class="input-group">
                        <label>Privileges</label><br>
                        <select name="admin">
                            <option value="0" @if ($user->admin == 0) selected @endif>Regular user</option>
                            <option value="1" @if ($user->admin == 1) selected @endif>Administrator</option>
                        </select>
                        @error('admin')
                            <p class="text-warning">{{$errors->first('admin')}}</p>
                        @enderror
                    </div>
                    <input type="submit" value="Edit user privileges">
                </form>
            </div>
        </div>
    </div>
@endsection
