@extends('index')
@section('title','User Dashboard')
@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body uk-margin-bottom">
                <h2>Account Details</h2>
                <div class="account-detail">
                    <div class="table-div">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Registered</th>
                                    <th>Admin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>{{$user->name}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>
                                    @if ($user->admin == 1)
                                        <i class="ri-check-fill"></i> 
                                    @else
                                        <i class="ri-close-line"></i>
                                    @endif
                                </td>
                            </tbody>
                        </table>
                    </div>
                    <a href="/account/edit"><button>Edit Profile</button></a>
                </div>
            </div>
            @if ($user->admin == 1)
            <div class="uk-card uk-card-body">
                <h2>Administrator actions</h2>
                <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
                    <div>
                        <div class="uk-card uk-card-body action-card">
                            <h3>User</h3>
                            <a href="/admin/user/add"><i class="ri-user-add-fill"></i></a>
                            <p>Add user</p>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-body action-card">
                            <h3>User</h3>
                            <a href="/admin/user"><i class="ri-user-search-line"></i></a>
                            <p>Show list of registered users</p>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-body action-card">
                            <h3>Priority</h3>
                            <a href="/admin/category/priority"><i class="ri-list-settings-line"></i></a>
                            <p>Show category list - priorities</p>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-body action-card">
                            <h3>Status</h3>
                            <a href="/admin/category/status"><i class="ri-list-settings-line"></i></a>
                            <p>Show category list - statuses</p>
                        </div>
                    </div>
                    <div>
                        <div class="uk-card uk-card-body action-card">
                            <h3>Type</h3>
                            <a href="/admin/category/type"><i class="ri-list-settings-line"></i></a>
                            <p>Show category list - types</p>
                        </div>
                    </div>
                </div>

            </div>
            @endif
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h2>My Issues</h2>
                @forelse ($issues as $issue)
                    <div class="uk-card uk-card-body card-issue">
                        <h3>{{$issue->Name}}</h3>
                        <div class="content">
                            <div class="left">
                                <ul>
                                    <li>Status: {{$issue->status->Name}}</li>
                                    <li>Created At: {{$issue->created_at}}</li>
                                </ul>
                            </div>
                            <div class="right">
                                <a href="/issues/{{$issue->id}}"><button>Detail</button></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-warning">You do not appear to have opened any issue</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
