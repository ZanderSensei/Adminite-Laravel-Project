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
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addClassModal"><i class="fa fa-plus"></i>Add Class</button>
          </h3>

          <!-- ADD CLASS MODAL -->
          <div class="modal fade" id="addClassModal" aria-labelledby="exampleModalLabel" arial-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" style="color:black;">
                  <h6>Add new Class</h6>
                </div>
                <form action="{{route('addClass')}}" method="post">
                  @csrf
                  <div class="modal-content">

                    <div class="lg-3 row">
                      <label for="name" class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <select class="form-select" name="clas_name">
                          <option value="">Select Your Class</option>
                          <option value="Form One">Form One</option>
                          <option value="Form two">Form Two</option>
                          <option value="Form Three">Form Three</option>
                          <option value="Form Four">Form Four</option>

                        </select>
                      </div>
                    </div>

                    <div class="lg-3 row">
                      <label for="Stream" class="col-sm-3 col-form-label">Stream</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="clas_stream" placeholder="eg Blue">
                      </div>
                    </div>

                    <div class="lg-3 row">
                      <label for="Capacity" class="col-sm-3 col-form-label">Capacity</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" name="clas_capacity" placeholder="30">
                      </div>
                    </div>

                    <div class="lg-3 row">
                      <label for="Rep" class="col-sm-3 col-form-label">Class Rep</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="clas_rep" placeholder="eg David">
                      </div>
                    </div>

                    <div class="lg-3 row">
                      <label for="Class Teacher" class="col-sm-3 col-form-label">Class Teacher</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="clas_teacher" placeholder="eg Mr.Rao">
                      </div>
                    </div>

                  </div>
                  <!-- Modal Footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="addStudentBtn" class="btn btn-sm btn-success">Add Class</button>
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
                <th>Name</th>
                <th>Stream</th>
                <th>Capacity</th>
                <th>Class Rep</th>
                <th>Class Teacher</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($clases as $clas)
              <tr>
                <td>{{$clas->clas_name}}</td>
                <td>{{$clas->clas_stream}}</td>
                <td>{{$clas->clas_capacity}}</td>
                <td>{{$clas->clas_rep}}</td>
                <td>{{$clas->clas_teacher}}</td>
                <td>
                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#updateModal{{$clas->id}}"><i class="fa fa-edit"></i>Update</button>
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal{{$clas->id}}"><i class="fa fa-trash"></i>Delete</button>
                </td>
              </tr>

              <!-- deleteModal -->
              <div class="modal fade" id="deleteModal{{$clas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title fs-5" id="exampleModalLabel">Delete: {{$clas->clas_name}} {{$clas->clas_stream}} </h5>

                    </div>
                    <div class="modal-body">
                      <form action="{{route('deleteClass')}}" method="post">
                        @csrf
                      <input type="hidden" class="form-control" name="id" value="{{$clas->id}}">
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

              <div class="modal fade" id="updateModal{{$clas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update: {{$clas->clas_name}} {{$clas->clas_stream}}</h5>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{route('updateClass')}}">
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{$clas->id}}">
                        <div class="mb-3 row">
                          <label for="className">Class Name</label>
                          <select name="clas_name" class="form-control" id="">
                            <option value="{{$clas->clas_name}}">{{$clas->clas_name}}</option>
                            <option value="Form One">Form One</option>
                            <option value="Form Two">Form Two</option>
                            <option value="Form Three">Form Three</option>
                            <option value="Form Four">Form Four</option>
                          </select>
                        </div>

                        <div class="mb-3 row">
                          <label for="classStream">Class Stream</label>
                          <div>
                            <input type="text" name="clas_stream" class="col-sm-3 col-form-label form-control" value="{{$clas->clas_stream}}">
                          </div>
                        </div>

                        <div class="mb-3 row">
                          <label for="classCapacity">Class Capacity</label>
                          <div>
                            <input type="number" name="clas_capacity" class="col-sm-3 col-form-label form-control" value="{{$clas->clas_capacity}}">
                          </div>
                        </div>

                        <div class="mb-3 row">
                          <label for="rep">Class Representatives</label>
                          <div>
                            <input type="text" name="clas_rep" class="col-sm-3 col-form-label form-control" value="{{$clas->clas_rep}}">
                          </div>
                        </div>

                        <div class="mb-3 row">
                          <label for="classteacher">Class Teacher</label>
                          <div>
                            <input type="text" name="clas_teacher" class="col-sm-3 col-form-label form-control" value="{{$clas->clas_teacher}}">
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
<div class="modal fade" id="addClassModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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