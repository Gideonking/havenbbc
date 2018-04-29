
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                  Create New Leader
                </div>
                <div class="panel-body">
                @include('inc.messages')
                {!! Form::open(['action' => ['LeadersController@update',$leader->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                        {{Form::label('title','Title')}}
                        {{Form::select('title',['Ptr.' => 'Pastor', 
                                                'Bro.' => 'Brother', 
                                                'Sis.' => 'Sister',
                                                "Ma'am" => 'Madam', 
                                                "Mr." => 'Mister', 
                                                "Ms." => 'Miss', 
                                                "Mrs." => 'Missus', 
                                                "Miss." => 'Missionary', 
                                                "Pr." => 'Preacher', 
                                                 ],$leader->title,
                        ['class'=>'form-control'])}}
                        {{Form::label('name','Name')}}
                        {{Form::text('name',$leader->name,['class' => 'form-control', 'placeholder' => 'Name'])}}
                              <br>
                        <div class="form-group">
                                
                            {{Form::label('profilephoto','Profile Photo')}}
                                
                            {{Form::file('cover_image_temp',['id'=>'upload'])}}
                            {{Form::hidden('cover_image','',['id'=>'cropped'])}}
                            <img src="" alt="" class="img-thumbnail img-responsive" id="thumbnail" />
                        </div>
                        <br>    
                        {{Form::hidden('_method','PUT')}}
                        
                    {{Form::submit('Submit',['class'=> 'btn btn-primary'])}}
                    </div>
                        {!! Form::close()!!}

                </div> <!-- end of panel-body -->       
            </div> <!-- end of panel -->
        </div> <!-- end of col-->
    </div><!-- end of row-->
</div><!-- end of container-->
@endsection