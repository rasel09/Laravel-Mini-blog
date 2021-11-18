@extends('admin.admin_master')

@section('admin_contant')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Post
                
            </h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Post</li>
            </ol>
          </div>
        
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-10">
              <div class="card">
                  <div class="card-body">
                    <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                        </div>
                        @error('title')
                            <p class="text-danger">{{$message}}</p>
                        @enderror

                            <div class="form-group">
                              <label for="category">Category</label>
                              <select class="form-control" name="category_id" id="category">
                                <option selected>Category_name</option>
                                @foreach ($categories  as $category)

                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                              </select>
                            </div>
                        
                          @error('category')
                              <p class="text-danger">{{$message}}</p>
                          @enderror
                        
                          <div class="form-group">
                            <label for="description">Description</label>
                             <textarea name="description" id="description"  rows="6" class="form-control" placeholder="some test"></textarea>
                          </div>
                          @error('description')
                              <p class="text-danger">{{$message}}</p>
                          @enderror

                          <div class="form-group">
                            <label for="image">Image Uplode</label>
                            <input type="file" name="image" id="image" class="form-control" >
                          </div>
                          @error('image')
                              <p class="text-danger">{{$message}}</p>
                          @enderror
                        <button type="submit" class="btn btn-success">Add_Post</button>
                    </form>
                  </div>
              </div>
          </div>
        </div>
      
      </div>
    </section>
   
  </div>
@endsection
