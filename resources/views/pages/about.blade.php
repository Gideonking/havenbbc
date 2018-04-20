@extends('layouts.app')

@section('content')

	
			<section class="section-spaced" style="background-color:darkslateblue">
        
		        <div class="container">	
              <div class="divider col-sm-12 col-xs-12 col-md-12" style="color:blanchedalmond">
                <div class="header-text"><span>About</span> Us</div>
            </div>
		          <div class="row">
		            <div class="col-md-12">
		              <div class="col-md-4 col-xs-12 col-sm-12">
		                <div class="box-img">
		                    <img src="/storage/page_images/bible.jpg"  width="100%" alt="" />
                            <h3 class="titleimg-card">Saved</h3>
                            <p class="img-card">
                              We are composed of saved believers
                    
                            </p>
		                  </div>
		                 </div>
		               <div class="col-md-4 col-xs-12 col-sm-12">
                        <div class="box-img">
                            <img src="/storage/page_images/help.jpg"  width="100%" alt="" />
                            <h3 class="titleimg-card">Serving</h3>
                            <p class="img-card">
                              We are serving the Lord
                            </p>
                          </div>
                         </div>
		                 <div class="col-md-4 col-xs-12 col-sm-12">
		                    <div class="box-img">
		                        <img src="/storage/page_images/biblestudy.jpg" width="100%" alt="" />
                            <h3 class="titleimg-card">Sharing</h3>
                            <p class="img-card">
                              We constantly share God's Word to other people.
                              Obeying Christ's Great Commission.
                            </p>
		                    </div>
		                 </div>
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
              Started at after the World War 2, the army was very tired under the leadership of ptr so and so 
              After that, there was , nd ther is , including the known. At 2002 ptr was ordained as 
              and ther were many there and people all gathering in same unity of the believers

            </p>
          </div>
      </div>
  </div>
</section>
<!-- Our Belief -->
<section class="section-spaced">
    <div class="container">
        <div class="divider col-sm-12 col-xs-12 col-md-12">
            <div class="header-text">Our <span>Belief</span></div><br>
            <div class="container">

 
@if(count($about['belief'])>0)

@for($i=0;$i<count($about['belief']);$i++)
<div class="col-md-6">
                <div class="panel-group panel-responsive">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapse{{$i}}">{{$about['belief'][$i]['topic']}}</a>
                      </h4>
                    </div>
                    <div id="collapse{{$i}}" class="panel-collapse collapse">
                      <div class="panel-body">
                        @foreach($about['belief'][$i]['stand'] as $stand)
                        <p class="lead">{{$stand}}</p>
                        @endforeach
                        @foreach($about['belief'][$i]['verses'] as $verse)
                        <p><i>{{$verse}}</i></p>
                        @endforeach
                      </div>
                    </div>
                  </div>
                  </div>

                </div>
@endfor
@endif
            </div>
        </div>
    </div>
  </section>

@endsection