@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>

                    <div class="panel-body">

                        <div class="alert alert-info">
                            Please report any bugs and feature requests to lukas@unknownworlds.com or via twitter
                            to @lnowaczek. Remember to take a look at the Guidelines, Instructions, and FAQ.
                        </div>

                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#translation-log" aria-controls="translation-log" role="tab" data-toggle="tab">
                                    Translation log</a>
                            </li>
                            <li role="presentation">
                                <a href="#strings-updates" aria-controls="strings-updates" role="tab" data-toggle="tab">
                                    Base strings updates</a>
                            </li>
                            <li role="presentation">
                                <a href="#translation-progress" aria-controls="translation-progress" role="tab"
                                   data-toggle="tab">
                                    Translation progress</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="translation-log">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Language</th>
                                            <th>Project</th>
                                            <th>Entry</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($log as $entry)
                                            <tr>
                                                <td>{{ $entry->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <img src="img/country-flags/{{@ $languages[$entry->language_id] }}.png"
                                                         alt="{{@ $languages[$entry->language_id] }}"
                                                         title="{{ $entry->language->name }}"/></td>
                                                <td>{{ $entry->project->name }}</td>
                                                <td>{{ $entry->text }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="strings-updates">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Project</th>
                                        <th>Entry</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($baseStringsLog as $entry)
                                        <tr>
                                            <td>{{ $entry->created_at->diffForHumans() }}</td>
                                            <td>{{ $entry->project->name }}</td>
                                            <td>{{ $entry->text }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="translation-progress">
                                <ul class="list-unstyled top15">
                                    @foreach($translationProgress as $entry)
                                        <li>
                                            {{ $entry->project->name }}, {{ $entry->language->name }}:
                                            {{ round($entry->count / $baseStringCounts[$entry->project_id] * 100, 3) }}%
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100"
                                                     style="width: {{ round($entry->count / $baseStringCounts[$entry->project_id] * 100, 3) }}%;">
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
