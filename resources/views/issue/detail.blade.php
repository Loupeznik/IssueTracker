@extends('index')
@section('title', 'Issue Detail')

@section('content')
    <div class="uk-child-width-expand@s" uk-grid>
        <div>
            <div class="uk-card uk-card-body">
                <h2>Issue Detail- {{$issue->Name}}</h2>
                <div class="content">
                    <div class="left">
                        <p>
                            Issue ID: {{$issue->id}}<br>
                            Status: {{$issue->status->Name}}<br>
                            Type: {{$issue->type->Name}}<br>
                            Priority: {{$issue->priority->Name}}<br>
                            Created At: {{$issue->created_at}}<br>
                            Modified At: {{$issue->updated_at}}<br>
                            Created By: {{$issue->user->name}}<br>
                            Assigned To: {{$issue->user->name}}<br>
                        </p>
                        <div class="card-issue-w">
                            <h3>Issue Description</h3>
                            <p>{{$issue->Desc}}</p>
                        </div>

                    </div>
                    <div class="right">
                        <a href="/issues/{{$issue->id}}/edit"><button>Modify</button></a><br>
                        <a href="/issues/{{$issue->id}}/resolve"><button>Resolve</button></a><br>
                        <form method="POST" action="/issues/{{$issue->id}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="button" value="remove"><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
