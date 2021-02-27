@extends('index')
@section('title', 'Category Management - Types')

@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body">
                <h2>Type Category Management</h2>
                <div class="table-div">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Assigned To</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($types as $type)
                            <tr>
                                <td>{{$type->id}}</td>
                                <td>{{$type->Name}}</td>
                                <td>{{$type->issue_count}} issues</td>
                                <td><a href="/admin/category/type/{{$type->id}}" onclick="event.preventDefault(); document.getElementById('form-{{$type->id}}').submit();" class="uk-link-reset"><i class="ri-delete-bin-2-line text-danger"></i></a></td>
                            </tr>
                            <form method="POST" action="/admin/category/type/{{$type->id}}" style="display: none" id="form-{{$type->id}}">
                                @csrf
                                @method('delete')
                            </form>
                        @empty
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
