@extends('index')
@section('title','Category Management - Add Status')
@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body center-items">
                <h2>Add new issue status category</h2>
                <form method="POST" action="">
                    @csrf
                    <div class="input-group">
                        <label>Status name</label><br>
                        <input type="text" name="Name" value="{{old('Name')}}">
                        @error('name')
                            <p class="text-warning">{{$errors->first('Name')}}</p>
                        @enderror
                    </div>
                    <input type="submit" value="Add status">
                </form>
            </div>
        </div>
    </div>
@endsection
