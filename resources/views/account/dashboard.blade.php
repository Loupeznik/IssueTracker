@extends('index')
@section('title','User Dashboard')
@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body">
                <h2>Account Details</h2>
                <div class="account-detail">
                    <i class="fas fa-user" title="Name and Username"></i> {{$user->name}} | {{$user->username}} <br>
                    <i class="fas fa-envelope" title="Email"></i> {{$user->email}} <br>
                    <i class="fas fa-user-plus" title="Registration date"></i> {{$user->created_at}} <br>
                    @if ($user->admin == 1)
                    <i class="fas fa-user-shield" title="Privileges"></i> Administrator Privileges <br>
                    @endif
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
