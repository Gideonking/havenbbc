@extends('layouts.app')

@section('content')
<section>
<div class="container">
        <div class="panel panel-default">
                <div class="panel-heading">Feedback</div>
                <div class="panel-body">
@if(count($feedbacks)>0)
<div class="table-responsive">
                <table class="table table-condensed">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Message</th>
                            <th>Email</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
@foreach($feedbacks as $feedback)
                          <tr>
                            <td>{{$feedback->name}}</td>
                            <td>{{$feedback->message}}</td>
                            <td><a href="mailto:{{$feedback->email}}">{{$feedback->email}}</a></td>
                            <td>{{$feedback->created_at}}</td>
                          </tr>
@endforeach     
                        </tbody>
                      </table>
                    </div>
@else
<h2 class="text-center">No Feedbacks/Messages</h2>
@endif
</div>
              </div>
</div>
</section>
@endsection