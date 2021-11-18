@extends('admin.admin_master')

@section('admin_contant')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Slider
                
            </h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Slider</li>
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
                    <form action="{{route('slider.update',$sliders->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                          <label for="slider_image">Slider_image</label>
                          <input type="file" name="image" id="slider_image" class="form-control" value="$sliders->image">
                        </div>
                        <div>
                            <img src="{{asset($sliders->image)}}" alt="" style="width:170px; height:120px;">
                        </div>
                        @error('image')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        <button type="submit" class="btn btn-success mt-3">Update_Slider</button>
                    </form>
                  </div>
              </div>
          </div>
        </div>
      
      </div>
    </section>
   
  </div>
@endsection
