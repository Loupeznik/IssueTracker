@extends('index')
@section('title', 'Issues')

@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body">
                <h2>Active Issues</h2>
                @foreach ($active as $issue)
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
                @endforeach
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h2>Resolved Issues</h2>
                @foreach ($resolved as $issue)
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
                @endforeach
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h2>My Assigned Issues</h2>
            </div>
        </div>
    </div>
@endsection
