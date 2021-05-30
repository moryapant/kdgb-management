@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Edit User</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">User</li>
                              <li class="breadcrumb-item active" aria-current="page">User Registration</li>
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
      <div class="row">
        <div class="col">
          <form novalidate method="post" action="{{route('profile.update', $user->id)}}" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                  <div class="col-12">	


              <!-- errrors display for validation --->    
                    
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                @endforeach
                    </ul>
                </div>
                @endif

        <!-- errrors display for validation --->   


            
            <div class="row">          
              <div class="form-group col-md-6 align-left">
                      <h5 class="text-white">Full Name <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="text" name="name" value="{{$user->name}}" class="form-control" required data-validation-required-message="This field is required" value="{{ old('name') }}"> </div>
                      <div class="form-control-feedback">
                        <small>Please Enter Full name </small>
                      </div>
                    </div>
                    <div class="form-group col-md-6 align-left">
                      <h5 class="text-white">Email Field <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="email" name="email" value="{{$user->email}}" class="form-control" required data-validation-required-message="This field is required" value="{{ old('email') }}"> </div>
                    </div>
                    <div class="form-group col-md-6 align-left">
                      <h5 class="text-white">Address <span class="text-danger"></span></h5>
                      <div class="controls">
                        <input type="text" name="address" value="{{$user->address}}" class="form-control" required data-validation-required-message="This field is required" value="{{ old('address') }}"> </div>
                    </div>
                   
			

                    <div class="form-group col-md-6 align-left">
                      <h5 class="text-white">Mobile <span class="text-danger"></span></h5>
                      <div class="input-group mb-5 form-group">
                        <div class="input-group-addon">
                          <i class="fa fa-phone"></i>
                        </div>
                          <input type="text" name="mobile" class="form-control" value="{{$user->mobile}}" data-inputmask="'mask':[ '(999) 999-9999']" data-mask="" required data-validation-required-message="This field is required" value="{{ old('mobile') }}">
                      </div>
                  </div>
                   
              
					<!-- /.input group -->
				  
                    {{-- <div class="form-group">
                      <h5>Password Input Field <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="password" name="password" class="form-control" required data-validation-required-message="This field is required"> </div>
                    </div> --}}
                    {{-- <div class="form-group">
                      <h5>Repeat Password Input Field <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="password" name="password_confirmation" data-validation-match-match="password" class="form-control" required> </div>
                    </div> --}}
                    {{-- <div class="form-group">
                      <h5>Select Role<span class="text-danger"></span></h5>
                  
                    </div> --}}
                  
                 
           

            <div class="form-group col-md-6 align-left">
            <h5 class="text-white">DOB <span class="text-danger"></span></h5>
            <div class="controls">
              <input class="form-control" type="date" name="dob" value="{{$user->dob}}"> 
            </div>
          </div>
                   
          <div class="form-group col-md-3 align-left">
            <h5 class="text-white">Gender<span class="text-danger"></span></h5>
            <div class="controls">
              <select name="gender" id="gender" required class="form-control">
                <option value="" selected="" disabled="">Select Gender</option>
                <option value="Male" {{($user->gender == 'Male' ? "selected" : "" )}}>Male</option>
                <option value="Female" {{($user->gender == 'Female' ? "selected" : "" )}}>Female</option>
                >
              </select>
            </div>
          </div>
          
        
         
          <div class="form-group col-md-6 align-items-center">
            <h5>Profile Image <span class="text-danger"></span></h5>
            <div class="controls">
              <input type="file" name="image" value="{{$user->image}}"" class="form-control" id="image"> 
            </div>
          </div>
        
      
       
          <div class="form-group col-md-12 mt-5">
            <div>
            <img src=" {{ (!empty($user->image)) ? url('upload/user_image/'.$user->image) : url('upload/no_image.jpg')}}" 
            class="rounded-circle" 
            style="center center;
             width: 250px; height: 250px; 
             object-fit: cover" 
            id="showImage">
          </div>
          </div>
       
        
      
						 
        <div class="text-xs-right col-md-6 mt-4">
          {{-- <button type="submit" class="btn btn-rounded btn-info">Submit</button> --}}
          <input type="submit" class="btn btn-primary mb-5 mt-5 btn-block btn-rounded" value="Submit">
        </div>     
              
               
                </form>
      
              </div>
              <!-- /.col -->
              </div>
            </div> 
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
<script type="text/javascript">

$(document).ready(function(){
  $('#image').change(function(e) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#showImage').attr('src', e.target.result);
    }

    reader.readAsDataURL(e.target.files['0']);
  });
});


</script>

@endsection