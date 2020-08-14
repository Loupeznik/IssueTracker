@extends('index')
@section('title', 'Issue Detail')

@section('content')
    <p>
        {{ $issue->id }}<br>{{ $issue->Name }}
    </p>
@endsection

<div class="uk-child-width-expand@s" uk-grid>
    <div>
        <div class="uk-card uk-card-body">
            <h2>Issue Detail- HTML Template not working</h2>
            <div class="content">
                <div class="left">
                    <p>
                        Issue ID: 1<br>
                        Status: Active<br>
                        Type: UI<br>
                        Created At:<br>
                        Modified At:<br>
                        Created By:<br>
                        Assigned To:<br>
                    </p>
                    <div class="card-issue-w">
                        <h3>Issue Description</h3>
                        <p>lorem1000</p>
                    </div>

                </div>
                <div class="right">
                    <a><button>Modify</button></a><br>
                    <a><button>Resolve</button></a><br>
                    <a><button>Remove</button></a><br>
                </div>
            </div>
        </div>
    </div>
</div>
