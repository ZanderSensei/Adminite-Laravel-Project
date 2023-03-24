@extends('layouts.backend')
@section('content')

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">


      <div class="box">
        <div class="box-header">
          <h3 class="box-title">
            20 Clases
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addStudentModal"><i class="fa fa-plus"></i>Add Student</button>
          </h3>

          <!-- ADD STUDENT MODAL -->
          <div class="modal fade" id="addStudentModal" aria-labelledby="exampleModalLabel" arial-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" style="color:black;">
                  <h6>Add new Student</h6>
                </div>
                <form action="{{route('addStudent')}}" method="post">
                  @csrf
                  <div class="modal-content">

                    <div class="lg-3 row">
                      <label for="fname" class="col-sm-3 col-form-label">First Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="stud_fname" placeholder="eg James">
                      </div>
                    </div>

                    <div class="lg-3 row">
                      <label for="lname" class="col-sm-3 col-form-label">Last Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="stud_lname" placeholder="eg Kimani">
                      </div>
                    </div>

                    <div class="lg-3 row">
                      <label for="Id" class="col-sm-3 col-form-label">Student Id</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" name="stud_id" placeholder="663374">
                      </div>
                    </div>

                    <div class="lg-3 row">
                      <label for="birth_no" class="col-sm-3 col-form-label">Birth No</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" name="birth_no" placeholder="eg 104023">
                      </div>
                    </div>

                    <div class="lg-3 row">
                      <label for="Address" class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="address" placeholder="eg Thika">
                      </div>
                    </div>

                  </div>
                  <!-- Modal Footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="addStudentBtn" class="btn btn-sm btn-success">Add Student</button>
                  </div>

                </form>


              </div>
            </div>

          </div>

        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Student ID</th>
                <th>Birth No</th>
                <th>Address</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($students as $student)
              <tr>
                <td>{{$student->stud_fname}}</td>
                <td>{{$student->stud_lname}}</td>
                <td>{{$student->stud_id}}</td>
                <td>{{$student->birth_no}}</td>
                <td>{{$student->address}}</td>
                <td>
                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#updateModal{{$student->id}}"><i class="fa fa-edit"></i>Update</button>
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$student->id}}"><i class="fa fa-trash"></i>Delete</button>
                </td>
              </tr>

              <!-- deleteModal -->
              <div class="modal fade" id="deleteModal{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title fs-5" id="exampleModalLabel">Delete: {{$student->stud_fname}} {{$student->stud_id}} </h5>

                    </div>
                    <div class="modal-body">
                      <form action="{{route('deleteStudent')}}" method="post">
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{$student->id}}">
                        <p>This action cannot be undone</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-undo" aria-hidden="true"></i>Cancel</button>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-trash"></i>Delete</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- end of deleteModal -->

              <!-- modal for update -->

              <div class="modal fade" id="updateModal{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update: {{$student->stud_fname}} {{$student->stud_id}}</h5>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{route('updateStudent')}}">
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{$student->id}}">

                        <div class="mb-3 row">
                          <label for="firstName">First Name</label>
                          <div>
                            <input type="text" name="stud_fname" class="col-sm-3 col-form-label form-control" value="{{$student->stud_fname}}">
                          </div>
                        </div>  
                        
                        <div class="mb-3 row">
                          <label for="secondName">Second Name</label>
                          <div>
                            <input type="text" name="stud_lname" class="col-sm-3 col-form-label form-control" value="{{$student->stud_lname}}">
                          </div>
                        </div>    
                        
                        <div class="mb-3 row">
                          <label for="studentID">Student ID</label>
                          <div>
                            <input type="number" name="stud_id" class="col-sm-3 col-form-label form-control" value="{{$student->stud_id}}">
                          </div>
                        </div>   

                        <div class="mb-3 row">
                          <label for="birthNo">Birth No</label>
                          <div>
                            <input type="number" name="birth_no" class="col-sm-3 col-form-label form-control" value="{{$student->birth_no}}">
                          </div>
                        </div>  

                        <div class="mb-3 row">
                          <label for="address">Address</label>
                          <div>
                            <input type="text" name="address" class="col-sm-3 col-form-label form-control" value="{{$student->address}}">
                          </div>
                        </div> 

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-undo" aria-hidden="true"></i>Cancel</button>
                      <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>Update</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- end of model for update -->


              @endforeach
            </tbody>

          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->



<!-- Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection