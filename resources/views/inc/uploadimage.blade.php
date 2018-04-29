<div class="form-group">
    {{Form::label('coverimage','Cover Image')}}
    
{{Form::file('cover_image_temp',['id'=>'upload'])}}
{{Form::hidden('cover_image','',['id'=>'cropped'])}}
<img src="" alt="" class="img-thumbnail img-responsive" id="thumbnail" />

</div>