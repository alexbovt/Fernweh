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
                        <a href="">Rodger Hansen</a>
                    </td>
                    <td class="admin-event-name">
                        <a href="">English language exchange</a>
                    </td>
                    <td class="admin-comment">
                        Payment Protection Insurance (PPI)
                        IMPORTANT - You could be entitled up to £3,160 in compensation from mis-sold PPI on a credit card or loan. Please reply PPI for info or STOP to opt out.
                    </td>
                    <td class="admin-user-list">
                        <a href="">Colleen O'Keefe</a><br>
                    </td>
                    <td class="admin-type">
                        Spam</a>
                    </td>
                    <td class="admin-notes">
                        -
                    </td>
                    <td class="admin-date">
                        12.12.2017<br>
                    </td>
                </tr>

                <tr>
                    <td class="admin-action">
                        <span class="glyphicon glyphicon-ok col-md-6"></span>
                        <span class="glyphicon glyphicon-remove col-md-6"></span>
                    </td>
                    <td class="admin-user-name">
                        <a href=""><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                        <a href="">Bennett Mertz</a>
                    </td>
                    <td class="admin-event-name">
                        <a href="">¡Hablamos Español!</a>
                    </td>
                    <td class="admin-comment">
                        Losers!!!
                    </td>
                    <td class="admin-user-list">
                        <a href="">Kiara Schmitt</a><br>
                        <a href="">Raymond Champlin</a><br>
                    </td>
                    <td class="admin-type">
                        Verbal abuse<br>
                        Verbal abuse
                    </td>
                    <td class="admin-notes">
                        -<br>
                        -
                    </td>
                    <td class="admin-date">
                        15.12.2017<br>
                        15.12.2017<br>
                    </td>
                </tr>

                <tr>
                    <td class="admin-action">
                        <span class="glyphicon glyphicon-ok col-md-6"></span>
                        <span class="glyphicon glyphicon-remove col-md-6"></span>
                    </td>
                    <td class="admin-user-name">
                        <a href=""><img src="{{asset('img/man.jpg')}}" class="img-circle"></a>
                        <a href="">Bennett Mertz</a>
                    </td>
                    <td class="admin-event-name">
                        <a href="">Aubree Bauch</a>
                    </td>
                    <td class="admin-comment">
                        Shut up!
                    </td>
                    <td class="admin-user-list">
                        <a href="">Matilda Eichmann</a><br>
                    </td>
                    <td class="admin-type">
                        Verbal abuse
                    </td>
                    <td class="admin-notes">
                        -<br>
                    </td>
                    <td class="admin-date">
                        17.12.2017
                    </td>
                </tr>


            </table>
        </div>
    </div>
@endsection
