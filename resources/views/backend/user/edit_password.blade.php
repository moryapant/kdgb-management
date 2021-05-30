@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Change password</h3>
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
        
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
          @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
          @endforeach
              </ul>
          </div>
          @endif


          <div class="col-12">
            <form novalidate method="post" action="{{route('password.change')}}">
                @csrf
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

              <div class="text-xs-right">
                {{-- <button type="submit" class="btn btn-rounded btn-info">Submit</button> --}}
                <input type="submit" class="btn btn-primary mb-5 btn-rounded" value="submit">
              </div>
            </form>
                 
                  
                 
              
  
                   
                  
              
                
              
      
              </div>
              <!-- /.col -->
              </div>
          
          <!-- /.col -->
        
        <!-- /.row -->
     
      <!-- /.content -->
    
    </div>
</div>


@endsection