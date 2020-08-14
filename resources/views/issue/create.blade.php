@extends('index')
@section('title', 'New Issue')

@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body center-items">
                <h2>New Issue</h2>
                <form method="POST" action="/issues">
                    @csrf
                    <div class="input-group">
                        <label>Issue Name</label><br>
                        <input type="text" name="Name" value="{{old('Name')}}">
                        @error('Name')
                        <p>{{$errors->first('Name')}}</p>
                        @enderror
                    </div>
                    <div class="input-group">
                        <label>Issue Type</label><br>
                        <select name="Type">
                            <option value="1">Backend</option>
                            <option value="2">UI</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Issue Priority</label><br>
                        <select name="Status">
                            <option value="1">High</option>
                            <option value="2">Normal</option>
                            <option value="3">Low</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Issue Description</label><br>
                        <textarea name="Desc"></textarea>
                    </div>
                    <input type="submit" name="submitForm" value="Create Issue">
                </form>
            </div>
        </div>
    </div>
@endsection