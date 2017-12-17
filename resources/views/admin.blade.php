@extends('layouts.index')
@section('title')
    Administartor
@endsection
@section('left-block')
    <div class="container">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <table class="admin-request">
                <caption>Comment requests</caption>
                <tr>
                    <th style="width: 8%">Action</th>
                    <th style="width: 16%">User</th>
                    <th style="width: 8%">Event</th>
                    <th style="width: 20%">Comment</th>
                    <th style="width: 14%">List of users</th>
                    <th style="width: 8%">Types</th>
                    <th style="width: 16%">Notes</th>
                    <th style="width: 8%">Dates</th>
                </tr>
                <tr>
                    <td class="admin-action">
                        <span class="glyphicon glyphicon-ok col-md-6"></span>
                        <span class="glyphicon glyphicon-remove col-md-6"></span>
                    </td>
                    <td class="admin-user-name">
                            <a href=""><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                            <a href="">Namename Surnamnamerrrrrrrrrrrrrrrrrrrrrrrrrr</a>
                    </td>
                    <td class="admin-event-name">
                        <a href="">Event Name</a>
                    </td>
                    <td class="admin-comment">
                        Comment
                    </td>
                    <td class="admin-user-list">
                        <a href="">Name Surname1</a><br>
                        <a href="">Name Surname2</a><br>
                        <a href="">Name Surname3</a><br>
                    </td>
                    <td class="admin-type">
                        type1<br>
                        type2<br>
                        type3<br>
                    </td>
                    <td class="admin-notes">
                        note1</a><br>
                        note2<br>
                        note3<br>
                    </td>
                    <td class="admin-date">
                        date1<br>
                        date2<br>
                        date3
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
