@extends('index')
@section('title','User Dashboard')
@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body">
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
