@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">User Profile</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="badge badge-dark ml-2" aria-current="page">{{$user->role}}</li>
                             {{-- <li class="breadcrumb-item active" aria-current="page">User List</li> --}}
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="row">
    

          <div class="col-12">
  <!-- /.box -->
  <div class="box box-widget widget-user">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-black" center center;">
      <h3 class="widget-user-username font-weight-bold text-white">{{$user->name}}</h3>
      <a href="{{route('profile.edit')}}" class ="btn btn-primary btn-rounded mb-5" style="float: right;">Edit Profile</a>
      {{-- <h6 class="widget-user-desc">{{$user->role}}</h6> --}}
      <h6 class="widget-user-desc">{{$user->email}}</h6>
    
    </div>
    <div class="widget-user-image">
      <img class="rounded-circle" style="center center;
      width: 100px; height: 100px; 
      object-fit: cover"  src="
      
    {{
        
        (!empty($user->image)) ? url('upload/user_image/'.$user->image) : url('upload/no_image.jpg')
        
    }}
        
        " alt="User Avatar">
    </div>

  
    <div class="box-footer mt-5">
      <div class="row">
        <div class="col-sm-4">
          <div class="description-block">
            <h5 class="description-header">Address</h5>
            <span class="font-weight-bolder text-white">{{$user->address}}</span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-4 br-1 bl-1">
          <div class="description-block">
            <h5 class="description-header">DOB</h5>
            <span class="font-weight-bolder text-white">{{$user->dob}}</span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
        <div class="col-sm-4">
          <div class="description-block">
            <h5 class="description-header">Mobile</h5>
            <span class="font-weight-bolder text-white">{{$user->mobile}}</span>
          </div>
          <!-- /.description-block -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
  </div>
        
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>


@endsection