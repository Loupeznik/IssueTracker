@extends('index')
@section('title', 'Issues')

@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body">
                <h2>Active Issues</h2>
                @foreach ($issues as $issue)
                <div class="uk-card uk-card-body card-issue">
                    <h3>{{$issue->Name}}</h3>
                    <div class="content">
                        <div class="left">
                            <ul>
                                <li>Status: {{$issue->Status}}</li>
                                <li>Priority: High</li>
                                <li>Type: {{$issue->Type}}</li>
                                <li>Created At: {{$issue->created_at}}</li>
                            </ul>
                        </div>
                        <div class="right">
                            <a href="{{$issue->id}}"><button>Detail</button></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h2>Resolved Issues</h2>
            </div>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-body">
                <h2>My Assigned Issues</h2>
            </div>
        </div>
    </div>
@endsection
