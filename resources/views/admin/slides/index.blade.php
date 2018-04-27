
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <a href="/slides/create" class="btn btn-success btn-sm pull-right">
                            Add New
                             </a>  
                    <p class="lead"><b>Slides</b></p>
                </div>
                <div class="panel-body">
                        @include('inc.messages')
<!-- List of Ministries -->
@if(count($slides)>0)

@foreach($slides as $slide)
                    <div class="panel panel-success">
                            
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3 col-sm-5 text-center">
                                        <img src="/storage/slide_images/{{$slide->cover_image}}" alt="" class="img-thumbnail img-responsive">
                                    <br>
                                    </div><!-- end of left --> 
                                    <div class="col-md-9 col-sm-7">
                                        <ul class="list-group">
                                            <li class="list-group-item active">
                                                    {!!Form::open(['action'=>['SlidesController@destroy',$slide->id],'method' => 'POST','class'=>' pull-right','id'=>'form_delete'])!!}
                                                    {{Form::hidden('_method','DELETE')}}
                                                    {{Form::submit('Delete',['class' => 'btn btn-danger  btn-sm'])}}
                                                     {!!Form::close()!!}
                                                     
                                                     <a href="/slides/{{$slide->id}}/edit" class="btn btn-success btn-sm pull-right">
                                                        Edit
                                                    </a>   
                                                     
                                                    
                                                            Title: <b>{{$slide->title}}</b> <br><small> {{$slide->description}}</small>
                                                            <br> Call to Action?: {{$slide->is_linked}}<br> {{$slide->link}}
                                                     
                                            </li>
                                            
                                        </ul>
                                    </div><!-- end of right -->       
                                </div><!-- end of row -->

                            </div><!-- end of a ministry body -->
                    </div><!-- end of a ministry panel -->
@endforeach
        <h3>Preview</h3>
        @include('inc.dynamic.carousel')

 @else
 No Slides
 @endif       
                </div> <!-- end of panel-body -->       
            </div> <!-- end of panel -->
        </div> <!-- end of col-->
    </div><!-- end of row-->
</div><!-- end of container-->
@endsection