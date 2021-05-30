@extends('admin.admin_master')
@section('admin')


<div class="content-wrapper">
    <div class="container-full">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="d-flex align-items-center">
              <div class="mr-auto">
                  <h3 class="page-title">Users List Table</h3>
                  <div class="d-inline-block align-items-center">
                      <nav>
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                              <li class="breadcrumb-item" aria-current="page">Tables</li>
                              <li class="breadcrumb-item active" aria-current="page">User List</li>
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

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">User List</h3>
                <a href="{{route('user.add')}}" class="btn btn-success mb-5" style="float: right">Add User</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>SR NO.</th>
                              <th>Full Name</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Action</th>
                            
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($allData as $key => $user)
                            
                          <tr>
                              <td style="width: 10%">{{$key + 1}}</td>
                              <td>{{$user['name']}}</td>
                              <td>{{$user['email']}}</td>
                              <td>{{$user['role']}}</td>
                              <td style="width: 20%">
                                <a href="{{route('user.delete',$user->id)}}" class="btn btn-danger m-1" style="float: center" id="delete">Delete</a>
                                <a href="{{route('user.edit',$user->id)}}" class="btn btn-primary m-1" style="float: center">Edit</a>
                              
                              </td>
                             
                          </tr>
                          @endforeach
                          
                      </tbody>
               
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

         
            <!-- /.box -->          
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>


@endsection