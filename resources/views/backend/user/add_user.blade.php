@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Add User</h3>
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
                <form novalidate method="post" action="{{route('user.store')}}">
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



                    
                    <div class="form-group">
                      <h5>Full Name <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="text" name="name" class="form-control" required data-validation-required-message="This field is required" value="{{ old('name') }}"> </div>
                      <div class="form-control-feedback">
                        <small>Please Enter Full name </small>
                      </div>
                    </div>
                    <div class="form-group">
                      <h5>Email Field <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required" value="{{ old('email') }}"> </div>
                    </div>
                    <div class="form-group">
                      <h5>Password Input Field <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="password" name="password" class="form-control" required data-validation-required-message="This field is required"> </div>
                    </div>
                    <div class="form-group">
                      <h5>Repeat Password Input Field <span class="text-danger">*</span></h5>
                      <div class="controls">
                        <input type="password" name="password_confirmation" data-validation-match-match="password" class="form-control" required> </div>
                    </div>
                    <div class="form-group">
                      <h5>Select Role<span class="text-danger"></span></h5>
                      <div class="controls">
                        <select name="role" id="role" required class="form-control">
                          <option value="" selected="" disabled="">Select Role</option>
                          <option value="User">User</option>
                          <option value="Admin">Admin</option>
                          >
                        </select>
                      </div>
                    </div>
                  
                 
              
  
                   
                  </div>
                  </div>
              
                
              
                  <div class="text-xs-right">
                    {{-- <button type="submit" class="btn btn-rounded btn-info">Submit</button> --}}
                    <input type="submit" class="btn btn-primary mb-5 btn-rounded" value="submit">
                  </div>
                </form>
      
              </div>
              <!-- /.col -->
              </div>
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>


@endsection