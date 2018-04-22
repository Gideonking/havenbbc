@extends('layouts.app')

@section('content')

<section class="section-spaced">
<div class="container">
    <div class="divider col-sm-12 col-xs-12 col-md-12">
        <div class="header-text"> <span>Blog</span></div>
    </div>



    @if(!Auth::guest())
      <a href="/blog/create" class="btn btn-success pull-right"> Create post</a>
    @endif
    
        
    @include('inc.messages');
          @if(count($posts)> 0)
          @foreach($posts as $post)
          <div class="col-md-12">
              <div class="tab-content">
              <div class="featured-img">
                <img src="/storage/blog_images/{{$post->cover_image}}" width="150" alt="">
              </div>
              <div class="featured-blog">
                <a href="blog/{{$post->id}}"> <h3>{{$post->title}}</h3></a>
                <a href="blog/{{$post->id}}"><button class="button-info">Read More</button></a>
                @if(!Auth::guest())
                  <a href="blog/{{$post->id}}/edit"><button class="button-info">Edit</button></a>
                @endif
              </div>
            </div>
            </div>
          @endforeach
          @else
            <h2>No Posts</h2>
          @endif

</div>
</div>
</section>
@endsection
