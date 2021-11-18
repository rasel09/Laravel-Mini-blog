@extends('layouts.app')

@section('content')
{{-- navbar section --}}

 <div class="container-fluid mb-2">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="#">Miniblog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            @foreach ($categories as $category)
            <li class="nav-item active">

                 <a class="nav-link" href="{{route('categoryPost',$category->id)}}">{{$category->category_name}}</a>
         
            </li>
            @endforeach
          </ul>
          <form class="form-inline my-2 my-lg-0" method="POST" action="{{route('searchPost')}}">
            @csrf
            <input class="form-control" type="search" placeholder="Search" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
 </div>

 {{-- slider section --}}
 <div class="container-fluid">
       <!-- Carousel Slideshow -->
       <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
        @foreach ($sliders as $key => $slider)
            
     
       
          <div class="carousel-item {{$key == 0 ? 'active':'' }} ">
            <img class="d-block w-100" src="{{asset($slider->image)}}" alt="First slide">
          </div>
          
          
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    <!-- End Carousel Slideshow -->
 </div>

 <div class="container mt-4">
     <div class="row">
         @foreach ($posts as $post)

        <div class="col-lg-4">
           <div class="card mb-4">
               <img src="{{asset($post->image)}}" class="card-img-top" alt="..." style="height:220px;">
               <div class="card-body">
                 <h5 class="card-title">{{$post->title}}</h5>
                 <div class="btn-group" role="group">
                       <a href="{{route('singlePost',$post->id)}}" class="btn btn-light">View</a>
                     
                 </div>
               </div>
             </div>
        </div>
        @endforeach
    </div>
    <div class="mt-3">{{$posts->links('vendor.pagination.bootstrap-4')}}</div>
 </div>
 <hr>
 <div class="container-fluid">
    <footer class="bg-light p-4 ">
        <p class="text-center font-weight-bolder">&copy; right by Rasel</p>
    </footer>
</div>
@endsection
