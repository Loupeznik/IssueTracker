@extends('index')
@section('title', 'Category Management - Priorities')

@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body">
                <h2>Priority Category Management</h2>
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
                            @forelse ($priorities as $priority)
                                <tr>
                                    <td>{{$priority->id}}</td>
                                    <td>{{$priority->Name}}</td>
                                    <td>{{$priority->issue_count}} issues</td>
                                    <td><a href="/admin/category/priority/{{$priority->id}}" onclick="event.preventDefault(); document.getElementById('form-{{$priority->id}}').submit();" class="uk-link-reset"><i class="ri-delete-bin-2-line text-danger"></i></a></td>
                                </tr>
                                <form method="POST" action="/admin/category/priority/{{$priority->id}}" style="display: none" id="form-{{$priority->id}}">
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
                            <tr>
                                <td>NEW</td>
                                <td>Add new priority</td>
                                <td>-</td>
                                <td><a href="/{{ request()->route()->uri }}/create" class="uk-link-reset"><i class="ri-add-circle-line uk-text-success"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
