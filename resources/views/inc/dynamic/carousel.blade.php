@if(count($slides)>0)
<section>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                   
                    @for($i = 0; $i < count($slides); $i++)
                        <li data-target="#carousel-example-generic" data-slide-to="0"
                        @if($i==0)
                        class="active"
                        @endif
                         ></li>
                    @endfor
                    
            </ol>
    
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox" class="text-header" >
    
                @for($i = 0; $i < count($slides); $i++)
                      @if($i==0)    
                <div class="item active">
                @else
                <div class="item">
                @endif
                        <img src="/storage/slide_images/{{$slides[$i]->cover_image}}" style="width:100%; height: auto">
                        <div class="carousel-caption">
                            {{$slides[$i]->title}}
                            <p>{{$slides[$i]->description}}</p>
                            @if($slides[$i]->is_linked == '1')
                            <a href="{{$slides[$i]->link}}" class="btn btn-primary btn-lg">{{$slides[$i]->label}}</a>
                            @endif
                        </div>
                </div>
                @endfor
         
            </div>
    
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    @endif

