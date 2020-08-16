@extends('index')
@section('title', 'Edit Issue')
@section('head')
<script src="https://cdn.tiny.cloud/1/cj2klcn0ztdew7ct1bbousfvoqr7ski6txwea32xh8qyyy9z/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

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
                        <select name="Type">
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->Name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Issue Priority</label><br>
                        <select name="Priority">
                            @foreach($priorities as $priority)
                                <option value="{{$priority->id}}">{{$priority->Name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Issue Description</label><br>
                        <textarea id="editor">{{$issue->Desc}}</textarea>
                    </div>
                    <input type="submit" value="Edit Issue" class="after-editor">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    tinymce.init({
        selector: '#editor'
    });
</script>
@endsection