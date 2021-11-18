@extends('layouts.app')

@section('content')
 {{-- post section --}}
 <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="{{url('/')}}">Miniblog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
 </div>
 <div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
           <div class="post-min-section">
               <div class="card">
                   <img class="card-img-top" src="{{asset($posts->image)}}" alt="Card image cap" style="height: 220px;">
                   <div class="card-body">
                     <div class="auther">
                         <strong>Created By : {{Auth::user()->name}}</strong>
                         <strong class="float-right">Category: {{$posts->category->category_name}}</strong>
                         <p>Created At: {{$posts->created_at}}</p>
                     </div>
                     <hr>
                     <div class="body-post">
                        <h5 class="card-title">{{$posts->title}}</h5>
                        <p class="card-text">{{ $posts->description}}</p>
                     </div>
                   </div>
                 </div>
           </div>
        </div>
        {{-- categories section --}}
        <div class="col-lg-4">
            <div class="min-categories">
               <div class="list-group">
                   <a href="#" class="list-group-item list-group-item-action active">
                    Categories
                   </a>
                    @foreach ($categories  as $category)
                        
                   <a href="{{route('categoryPost',$category->id)}}" class="list-group-item list-group-item-action">{{$category->category_name}}</a>
                   @endforeach
                 </div>
            </div>
        </div>
    </div>
</div>
{{-- post section --}}

{{-- Related post --}}
<div class="container">
    <div class="pt-4">
       <h4 >Related Post</h4>
    </div>
    <div class="row">
        <div class="col-lg-12 mt-3">
           <div class="row">
               @foreach($relatedPosts as $rp)
               <div class="col-lg-6">
                   <div class="related-post">
                       <div class="card">
                           <img class="card-img-top" src="{{asset($rp->image) }}" style="height: 220px;">
                           <div class="card-body">
                             <h5 class="card-title">{{$rp->title}}</h5>
                             <p class="card-text">{{$rp->description}}</p>
                           
                           </div>
                         </div>
                   </div>
               </div>
            @endforeach
           </div>
        </div>
        
    </div>
</div>
<hr>
<div class="container-fluid">
    <footer class="bg-light p-4 ">
        <p class="text-center font-weight-bolder">&copy; right by Rasel</p>
    </footer>
</div>
@endsection
