@extends('admin.admin_master')
@section('post')
    active
@endsection
@section('admin_contant')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Post
                
            </h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Post</li>
            </ol>
          </div>
        
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12">
              @if (Session('success'))
                  <p class="alert alert-success">{{Session('success')}}</p>
              @endif
              <div class="card">
                  <div class="card-body">
                      <h5>Post List:
                      <a style="float:right" href="{{route('posts.create')}}">Add New Post</a>
                    </h5>
                      <table class="table table-bordered">
                         <thead>
                             <tr>
                                 <th>id</th>
                                 <th>Title</th>
                                 <th>Category_id</th>
                                 {{-- <th>User_id</th> --}}
                                 <th width="200">Description</th>
                                 <th >Created_at</th>
                                 <th>Image</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($posts as $post)
                                 
                             <tr>
                                 <td>{{$post->id}}</td>
                                 <td>{{$post->title}}</td>
                                 <td>{{$post->category->category_name}}</td>
                                 {{-- <td>{{$post->Auth::user()->name}}</td> --}}
                                 <td>{{$post->description}}</td>
                                 <td>{{$post->created_at->diffForHumans()}}</td>
                                 <td>
                                     <img src="{{asset($post->image)}}" alt="" style="width: 60px;height:60px;">
                                 </td>
                                 <td>
                                     <a href="{{route('posts.edit',$post->id)}}" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>
                                     <form class="d-inline" action="{{route('posts.destroy',$post->id)}}" method="POST">
                                         @csrf
                                         @method('delete')
                                         <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                     </form>
                                 </td>
                             </tr>
                             @endforeach
                         </tbody>
                      </table>
                      <div class="mt-3">{{$posts->links('vendor.pagination.bootstrap-4')}}</div>
                  </div>
                  
              </div>
          </div>
        </div>
      
      </div>
    </section>
   
  </div>
@endsection
