@extends('layouts.app')

@section('content')
 <div class="divider col-sm-12 col-xs-12 col-md-12">
          <div class="header-text"><span>Gallery</span></div>
          <br>
          @if(!Auth::guest())
          <a href="/galleries/create" class="btn btn-success"> Create Gallery</a>
          @endif
        </div>
        

<section id="clients">
  <div class="container">
  <!-- Team Inner -->
  <div class="inner team">
    <!-- Members -->
    <div class="team-members inner-details">
    <h1>Photo Albums</h1>
      @if(count($galleries)>0)
        @foreach($galleries as $gallery)
        <!-- Looped -->
        <!-- Member -->
        
        <div class="col-xs-12 col-md-4 col-sm-6 member animated" data-animation="fadeInUp" data-animation-delay="500">
            <a href="/galleries/{{$gallery->id}}">
          <div class="member-inner  fill-gallery">
            <!-- Team Member Image -->
            <a class="team-image">
              <!-- Img -->
              <img src="/storage/gallery_images/{{$gallery->images[0]->path}}" alt="" class="fill-gallery-img"/>
            </a>
            <div class="member-details">
              <div class="member-details-inner">
                <!-- Name -->
                <h2 class="member-name light">{{$gallery->title}}</h2>
                <!-- Description -->
                <p class="member-description">{{$gallery->description}}</p>
                <!-- Socials -->
                <div class="socials">
                  <!-- Image -->
                  <a href="/galleries/{{$gallery->id}}"><i class="fa fa-camera"></i></a>
                </div><!-- End Socials -->
              </div> <!-- End Detail Inner -->
            </div><!-- End Details -->
          </div> <!-- End Member Inner -->        
        </a> 
        </div><!-- End Member -->

        @endforeach
@else
<h1>No Photo Albums</h1>
@endif
     
    </div><!-- End Members -->
  </div><!-- End Team Inner -->
  <br>
  <br>
  <div class="col-md-12 col-sm-12 col-xs-12" id="video-container">
  <h1>Videos</h1>
  @if(count($videos)>0)
  <p><strong>YouTube Videos</strong></p>
  @foreach($videos as $video)
  <div class="col-md-4 col-sm-6 col-xs-12" id="videoframe">
    <div class="container col-12">
        <iframe src="http://www.youtube.com/embed/{{$video->id->videoId}}" frameborder="0" allowfullscreen></iframe>

    </div>
       </div>
  @endforeach
  @else
  <h1>No Videos</h1>
  @endif
</div>
</div>
</section><!-- End Team Section -->


    

@endsection