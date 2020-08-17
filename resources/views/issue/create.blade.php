@extends('index')
@section('title', 'New Issue')
@section('head')
<script src="https://cdn.tiny.cloud/1/cj2klcn0ztdew7ct1bbousfvoqr7ski6txwea32xh8qyyy9z/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

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
                            <p class="text-warning">{{$errors->first('Name')}}</p>
                        @enderror
                    </div>
                    <div class="input-group">
                        <label>Issue Type</label><br>
                        <select name="types_id">
                            @foreach($types as $type)
                                <option value="{{$type->id}}" @if ($type->id == old('types_id')) selected @endif>{{$type->Name}}</option>
                            @endforeach
                        </select>
                        @error('priority_id')
                            <p class="text-warning">{{$errors->first('priority_id')}}</p>
                        @enderror
                    </div>
                    <div class="input-group">
                        <label>Issue Priority</label><br>
                        <select name="priority_id">
                            @foreach($priorities as $priority)
                                <option value="{{$priority->id}}"  @if ($priority->id == old('priority_id')) selected @endif>{{$priority->Name}}</option>
                            @endforeach
                        </select>
                        @error('types_id')
                            <p class="text-warning">{{$errors->first('types_id')}}</p>
                        @enderror
                    </div>
                    <div class="input-group">
                        <label>Issue Description</label><br>
                        <textarea id="editor" name="Desc">{{old('Desc')}}</textarea>
                        @error('Desc')
                            <p class="text-warning">{{$errors->first('Desc')}}</p>
                        @enderror
                    </div>
                    <input type="submit" name="submitForm" value="Create Issue" class="after-editor">
                    
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