@extends('index')
@section('title', 'User Management - Users')

@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body">
                <h2>User Management</h2>
                <div class="table-div">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Registration date</th>
                                <th>Issues Created</th>
                                <th>Privileges</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                            <tr @if ($user->id == Auth::user()->id) class="uk-text-bold" @endif>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->issues_count}} issues</td>
                                <td>
                                    @if($user->admin > 0)
                                        <i class="ri-shield-user-line uk-text-bold" uk-tooltip="Administrator"></i>
                                    @else
                                        <i class="ri-user-3-line" uk-tooltip="Regular user"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($user->id == Auth::user()->id)
                                        -
                                    @else
                                        <a href="/admin/user/{{$user->id}}/edit" class="uk-link-reset" uk-tooltip="Edit user"><i class="ri-user-settings-line"></i></a>
                                        <a href="/admin/user/{{$user->id}}/delete" onclick="event.preventDefault(); document.getElementById('form-{{$user->id}}').submit();" class="uk-link-reset" uk-tooltip="Remove user"><i class="ri-delete-bin-2-line text-danger"></i></a>
                                    @endif
                                </td>
                            </tr>
                            <form method="POST" action="/admin/user/{{$user->id}}" style="display: none" id="form-{{$user->id}}">
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
