@extends('layouts.app')

@section('content')
<section>

    <div class="divider col-sm-12 col-xs-12 col-md-12">
        <div class="header-text">
            <span>Ministries</span></div>
        </div>
       
                <section class="work-block">   
                  <div class="form-group"><a href="/ministries/create" class="btn btn-success"> Create Ministry</a>
                  </div>
                    
                   
                        <div class="container">
                          
                          <div class="row">
                            <div class="col-md-12">
                                @if(count($ministries)> 0)
                                @foreach($ministries as $ministry)
                                <a href="/ministries/{{$ministry->id}}">
                              <div class="col-md-4 col-xs-12 col-sm-12">
                                <div class="box-img">
                                    <img src="/storage/ministry_images/{{$ministry->cover_image}}"  width="100%" alt="" />
                                    <h3 class="titleimg-card">{{$ministry->title}}</h3>
                                    <p class="img-card">{{$ministry->description}}</p>
                                  </div>
                                 </div>
                                </a>
                                 @endforeach
                                 @else
                             
                                 <h2>No Ministry</h2>
                                 @endif
                                    




                               </div>
                               
                          </div>
                        </div>
        
                   </section>
        


</section>
@endsection