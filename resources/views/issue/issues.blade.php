@extends('index')
@section('title', 'Issues')

@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body">
                <h2>Active Issues</h2>
                @forelse ($active as $issue)
                    <div class="uk-card uk-card-body card-issue">
                        <h3>{{$issue->Name}}</h3>
                        <div class="content">
                            <div class="left">
                                <ul>
                                    <li>Priority: {{$issue->priority->Name}}</li>
                                    <li>Type: {{$issue->type->Name}}</li>
                                    <li>Created At: {{$issue->created_at}}</li>
                                    <li>Created by: {{$issue->user->name}}</li>
                                </ul>
                            </div>
                            <div class="right">
                                <a href="/issues/{{$issue->id}}"><button>Detail</button></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-warning">No active issues found</p>
                @endforelse
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h2>Resolved Issues</h2>
                @forelse ($resolved as $issue)
                    <div class="uk-card uk-card-body card-issue">
                        <h3>{{$issue->Name}}</h3>
                        <div class="content">
                            <div class="left">
                                <ul>
                                    <li>Priority: {{$issue->priority->Name}}</li>
                                    <li>Type: {{$issue->type->Name}}</li>
                                    <li>Created At: {{$issue->created_at}}</li>
                                    <li>Created by: {{$issue->user->name}}</li>
                                </ul>
                            </div>
                            <div class="right">
                                <a href="/issues/{{$issue->id}}"><button>Detail</button></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-warning">No resolved issues found</p>
                @endforelse
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h2>My Assigned Issues</h2>
            </div>
        </div>
    </div>
@endsection
