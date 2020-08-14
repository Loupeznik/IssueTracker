@extends('index')
@section('title', 'Edit Issue')

@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body center-items">
                <h2>Edit Issue - Issue #{{$issue->id}}</h2>
                <form method="POST" action="/issues/{{$issue->id}}">
                    @csrf
                    @method('PUT')
                    <div class="input-group">
                        <label>Issue Name</label><br>
                        <input type="text" name="name" value="{{$issue->Name}}">
                    </div>
                    <div class="input-group">
                        <label>Issue Type</label><br>
                        <select>
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Issue Priority</label><br>
                        <select>
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Issue Description</label><br>
                        <textarea>{{$issue->Desc}}</textarea>
                    </div>
                    <input type="submit" value="Edit Issue">
                </form>
            </div>
        </div>
    </div>
@endsection