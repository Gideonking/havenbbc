@extends('layouts.app')

@section('content')
 <div class="divider col-sm-12 col-xs-12 col-md-12">
          <div class="header-text"><span>Gallery</span> Images</div>
          <br>
          <a href="/galleries/create" class="btn btn-success"> Create Gallery</a>
        </div>
        

        <section id="clients">
       <!-- Team Inner -->
          <div class="inner team">
             
      <!-- Header -->
    

      <!-- Members -->
      <div class="team-members inner-details">
          
   
        @if(count($galleries)> 0)
        @foreach($galleries as $gallery)
        <!-- Member -->
        <div class="col-xs-4 member animated" data-animation="fadeInUp" data-animation-delay="0">
          <div class="member-inner">
            <!-- Team Member Image -->
            <a class="team-image" href="/galleries/{{$gallery->id}}">
              <!-- Img -->
              <div   class="carousel" data-ride="carousel">
                   
                <!-- Wrapper for slides -->
                <div class="carousel-inner carousel-gallery" role="listbox">
                 @if(count($gallery->images)>0)
                    @for($i=0;$i<count($gallery->images);$i++)
                    @if($i == 0)
                    <div class="item active">
                      @else
                      <div class="item">
                      @endif
                      <img src="/storage/gallery_images/{{$gallery->images[$i]->path}}" alt="" />
             
                    </div>
                    @endfor
                  @else
                  <div class="item active">
                      <img src="/storage/gallery_images/noimage.jpg" alt="" />
                  </div>
                  @endif
                </div>
            
   
            <div class="member-details">
              <div class="member-details-inner">
                <!-- Name -->
                <h2 class="member-name light">{{$gallery->title}}</h2>
                <!-- Description -->
                <p class="member-description">{{$gallery->description}}</p>
                <!-- Socials -->
                <div class="socials">
                  <!-- Link -->
                 <!-- <a href="#"><i class="fa fa-link"></i></a> -->
                </div><!-- End Socials -->
              </div> <!-- End Detail Inner -->
            </div><!-- End Details -->         </a>
          </div> <!-- End Member Inner -->
        </div><!-- End Member -->
@endforeach
@else
<h2>No Gallery</h2>
@endif

      </div><!-- End Members -->
    </div><!-- End Team Inner -->
  </section><!-- End Team Section -->


    

@endsection