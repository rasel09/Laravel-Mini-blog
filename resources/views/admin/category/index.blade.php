@extends('admin.admin_master')
@section('category')
    active
@endsection
@section('admin_contant')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">categories
                
            </h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
              @if (Session('success'))
                  <p class="alert alert-success">{{Session('success')}}</p>
              @endif
              <div class="card">
                  <div class="card-body">
                      <h5>Category List:
                      <a style="float:right" href="{{route('categories.create')}}">Add New</a>
                    </h5>
                      <table class="table table-bordered">
                         <thead>
                             <tr>
                                 <th>id</th>
                                 <th>Category_name</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($categories as $category)
                                 
                             <tr>
                                 <td>{{$category->id}}</td>
                                 <td>{{$category->category_name}}</td>
                                 <td>
                                     <a href="{{route('categories.edit',$category->id)}}" class="btn btn-success btn-sm"><i class="fas fa-pen"></i></a>
                                     <form class="d-inline" action="{{route('categories.destroy',$category->id)}}" method="POST">
                                         @csrf
                                         @method('delete')
                                         <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                     </form>
                                 </td>
                             </tr>
                             @endforeach
                         </tbody>
                      </table>
                      <div class="mt-3">{{$categories->links('vendor.pagination.bootstrap-4')}}</div>
                  </div>
                  
              </div>
          </div>
        </div>
      
      </div>
    </section>
   
  </div>
@endsection
