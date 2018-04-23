
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <a href="/leaders/create" class="btn btn-success btn-sm pull-right">
                            Add New
                             </a>  
                    <p class="lead"><b>Leaders</b></p>
                </div>
                <div class="panel-body">
                        @include('inc.messages')
<!-- List of Ministries -->
@if(count($leaders)>0)
@foreach($leaders as $leader)
                    <div class="panel panel-success">
                            
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3 col-sm-5 text-center">
                                        <img src="/storage/profile_images/{{$leader->cover_image}}" alt="" class="img-thumbnail img-responsive">
                                    <br>
                                    </div><!-- end of left --> 
                                    <div class="col-md-9 col-sm-7">
                                        <ul class="list-group">
                                            <li class="list-group-item active">
                                                    {!!Form::open(['action'=>['LeadersController@destroy',$leader->id],'method' => 'POST','class'=>' pull-right'])!!}
                                                    {{Form::hidden('_method','DELETE')}}
                                                    {{Form::submit('Delete',['class' => 'btn btn-danger  btn-sm'])}}
                                                     {!!Form::close()!!}
                                                     
                                                     <a href="/leaders/{{$leader->id}}/edit" class="btn btn-success btn-sm pull-right">
                                                        Edit
                                                    </a>   
                                                     
                                                    
                                                            Name: <b>{{$leader->title}} {{$leader->name}}</b> 
                                                     
                                            </li>
                                            <li class="list-group-item">
                                                 <ul class="list-group">
                                                            @if(count($leader->positions)>0)
                                                            <li class="list-group-item active">
                                                                    Assigned Ministries  
                                                                    <a href="/positions" class="btn btn-success btn-sm pull-right">
                                                                        Modify
                                                                    </a>     
                                                            </li>
                                                            @foreach($leader->positions as $position)
                                                            <li class="list-group-item">
                                                                    <a href="positions/{{$position->id}}/edit" class="btn btn-success"><b>{{$position->title}}</b></a>  at    <a href="/ministries/{{$position->ministry->id}}" class="btn btn-success"><b>{{$position->ministry->title}}</b></a>
                                                           
                                                                    {!!Form::open(['action'=>'LeadersController@unassign','method' => 'POST','class'=>' pull-right'])!!}
                                                                    {{Form::hidden('leader_id',$leader->id)}}
                                                                    {{Form::hidden('position_id',$position->id)}}
                                                                    {{Form::submit('Clear',['class' => 'btn btn-danger  btn-sm'])}}
                                                                    {!!Form::close()!!}         
                                                                </li>
                                                            @endforeach
                                                            @else
                                                            <li class="list-group-item">
                                                                    No ministry assigned
                                                                    <a href="/positions" class="btn btn-primary btn-sm pull-right">
                                                                    Assign
                                                                    </a>   
                                                            </li>
                                                            @endif
                                                    </ul>
                                            </li>
                                        </ul>
                                    </div><!-- end of right -->       
                                </div><!-- end of row -->

                            </div><!-- end of a ministry body -->
                    </div><!-- end of a ministry panel -->
@endforeach
 @else
 No Positions
 @endif       
                </div> <!-- end of panel-body -->       
            </div> <!-- end of panel -->
        </div> <!-- end of col-->
    </div><!-- end of row-->
</div><!-- end of container-->
@endsection