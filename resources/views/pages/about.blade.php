@extends('layouts.app')

@section('content')
	
			<section class="section-spaced" style="background-color:darkslateblue">
        
		        <div class="container">	
              <div class="divider col-sm-12 col-xs-12 col-md-12" style="color:blanchedalmond">
                <div class="header-text"><span>About</span> Us</div>
            </div>
            <p class="lead text-center">{{$about->about[0]->main}}</p>
       
            <div class="row">

		            <div class="col-md-12">

@if(count($about->about)>0)
@foreach($about->about[0]->motto as $motto)
		              <div class="col-md-4 col-xs-12 col-sm-12  fromBottom">
		                <div class="box-img">
		                    <img src="/storage/page_images/{{$motto->image}}"  width="100%" alt="" />
                            <h3 class="titleimg-card">{{$motto->tag}}</h3>
                            <p class="img-card">
                                {{$motto->description}}
                            </p>
		                  </div>
                     </div>
       @endforeach              
                  
@endif
		               </div>
		          </div>
		        </div>

       </section>
       
<!-- History -->
<section class="section-spaced">
  <div class="container">
      <div class="divider col-sm-12 col-xs-12 col-md-12">
          <div class="header-text"><span>History</span></div><br>
          <div class="container">
            <p>
       {{$about->history[0]}}
            </p>
          </div>
      </div>
  </div>
</section>
<!-- Our Belief -->
<section class="section-spaced">
    <div class="container">
        <div class="divider col-sm-12 col-xs-12 col-md-12 ">
            <div class="header-text">Our <span>Belief</span></div><br>
            <div class="container">

 
@if(count($about->belief)>0)

@for($i=0;$i<count($about->belief);$i++)
@if($i == 0)
    <div class="col-md-6">
@elseif((count($about->belief)/2) == ($i))
    </div>
    <div class="col-md-6">
@endif
    <div class="col-md-12 fromBottom">
      <div class="panel-group panel-responsive ">
        <div class="panel panel-primary">
          <div class="panel-heading">
              <a data-toggle="collapse" href="#collapse{{$i}}">
            <h4 class="panel-title">
             <span style="color:white"> {{$i+1}} - {{$about->belief[$i]->topic}}
              <span class="glyphicon glyphicon-triangle-bottom pull-right" aria-hidden="true"></span>
             </span>
            </h4>
          </div>
        </a>
          <div id="collapse{{$i}}" class="panel-collapse collapse">
            <div class="panel-body">
              @foreach($about->belief[$i]->stand as $stand)
                <p>{{$stand}}</p>
              @endforeach
              <br>
              <blockquote>
                @foreach($about->belief[$i]->verses as $verse)
                <p><i>{{$verse}}</i></p>
                @endforeach
              </blockquote>
            </div>
          </div>
        </div>
      </div>
    </div>
@if($i == count($about->belief)-1)
  </div>
@endif
@endfor
@endif
            </div>
        </div>
    </div>
  </section>

@endsection