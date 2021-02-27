@extends('index')
@section('title','Category Management - Add Type')
@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body center-items">
                <h2>Add new issue type category</h2>
                <form method="POST" action="">
                    @csrf
                    <div class="input-group">
                        <label>Type name</label><br>
                        <input type="text" name="Name" value="{{old('Name')}}">
                        @error('Name')
                            <p class="text-warning">{{$errors->first('Name')}}</p>
                        @enderror
                    </div>
                    <input type="submit" value="Add type">
                </form>
            </div>
        </div>
    </div>
@endsection
