@extends('layouts.index')
@section('title')
    Administartor
@endsection
@section('left-block')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if(count($reports) === 0)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <h2>Nothing to show !</h2>
            </div>
        @else
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="admin-request">
                    <caption>Comment requests</caption>
                    <tr>
                        <th style="width: 8%">Action</th>
                        <th style="width: 16%">User</th>
                        <th style="width: 8%">Event</th>
                        <th style="width: 20%">Comment</th>
                        <th style="width: 8%">Types</th>
                        <th style="width: 16%">Notes</th>
                        <th style="width: 8%">Dates</th>
                    </tr>
                    @foreach($reports as $report)
                        <tr>
                            <td class="admin-action">
                                <a href="/admin/acceptReport{{$report->id_report}}"><span
                                            class="glyphicon glyphicon-ok col-md-6"></span></a>
                                <a href="/admin/deleteReport{{$report->id_report}}"><span
                                            class="glyphicon glyphicon-remove col-md-6"></span></a>
                            </td>
                            <td class="admin-user-name">
                                <a href=""><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                                <a href="">{{$report->name.' '.$report->surname}}</a>
                            </td>
                            <td class="admin-event-name">
                                <a href="/event_id{{$report->id_event}}">{{$report->event_name}}</a>
                            </td>
                            <td class="admin-comment">
                                {{$report->text}}
                            </td>
                            <td class="admin-type">
                                {{$report->report_type}}</a>
                            </td>
                            <td class="admin-notes">
                                {{$report->report_text}}
                            </td>
                            <td class="admin-date">
                                {{$report->created_at}}<br>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif
    </div>
@endsection
