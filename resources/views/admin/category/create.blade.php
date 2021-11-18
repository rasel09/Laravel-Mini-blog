@extends('admin.admin_master')

@section('admin_contant')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Category
                
            </h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Category</li>
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
                    <form action="{{route('categories.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="category_name">Category_name</label>
                          <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Category_name">
                        </div>
                        @error('category_name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        <button type="submit" class="btn btn-success">Add_Category</button>
                    </form>
                  </div>
              </div>
          </div>
        </div>
      
      </div>
    </section>
   
  </div>
@endsection
