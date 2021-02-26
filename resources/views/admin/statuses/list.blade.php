@extends('index')
@section('title', 'Category Management - Statuses')

@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body">
                <h2>Status Category Management</h2>
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
                            @forelse ($statuses as $status)
                            <tr>
                                <td>{{$status->id}}</td>
                                <td>{{$status->Name}}</td>
                                <td>{{$status->issue_count}} issues</td>
                                <td><a href="/admin/category/status/{{$status->id}}" onclick="event.preventDefault(); document.getElementById('form-{{$status->id}}').submit();" class="uk-link-reset"><i class="ri-delete-bin-2-line text-danger"></i></a></td>
                            </tr>
                            <form method="POST" action="/admin/category/status/{{$status->id}}" style="display: none" id="form-{{$status->id}}">
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
