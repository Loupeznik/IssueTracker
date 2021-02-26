@extends('index')
@section('title','Category Management - Add Priority')
@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body center-items">
                <h2>Edit account details</h2>
                <form method="POST" action="">
                    @csrf
                    <div class="input-group">
                        <label>Priority name</label><br>
                        <input type="text" name="name" value="{{old('Name')}}">
                        @error('name')
                            <p class="text-warning">{{$errors->first('Name')}}</p>
                        @enderror
                    </div>
                    <input type="submit" value="Add priority">
                </form>
            </div>
        </div>
    </div>
@endsection
