@extends('layouts.dashboard')
@section('content')
<div class="container">
        <div class="d-flex justify-content-between mb-3 mt-5">
          <h3>
            Manage Users
          </h3>
          <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#AddModal" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Add New User</button>
        </div>
        <div class="row">
          <table class="table">
            <thead class= "table-dark">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              
           
                    <tr>
                      <td>{{$loop->iteration }}</td>
                      <td>{{$user->firstname }}</td>
                      <td>{{$user->lastname }}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->role}}</td>
                      <td><span class='badge bg-success'>{{$user->status}}</span></td>
                      <td>
                        <a type='button' class='btn btn-warning' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'  data-bs-toggle='modal' data-bs-target='#EditModal{{$user->id  }}'>Edit</a>
                        <a type='button' class='btn btn-danger' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'  data-bs-toggle='modal' data-bs-target='#DeleteModal{{ $user->id }}'>Delete</a>
                      </td>
                    </tr> 
                  
                  <div class="modal fade" id="EditModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form method="post" action = "/editUser/{{ $user->id }}">
                          @csrf
                          <div class="row g-3">
                            <input type="hidden" name="id" class="form-control" id="" value="{{ $user->id }}">
                            <div class="col-md-6">
                              <label for="fname" class="form-label">Firstname</label>
                              <input type="text"name="editfname" class="form-control" id="inputEmail4" value="{{ $user->firstname }}">
                            </div>
                            <div class="col-md-6">
                              <label for="lnames" class="form-label">Last Name</label>
                              <input type="text" name="editlname" class="form-control" id="inputPassword4" value="{{ $user->lastname }}">
                            </div>
                            <div class="col-12">
                              <label for="inputemail" class="form-label">Email</label>
                              <input type="email" name="editemail"class="form-control" id="inputAddress" value="{{ $user->email }}">
                            </div>
                            <div class="col-12">
                              <label for="inputState" class="form-label">Role</label>
                              <select id="inputState" name="editrole" class="form-select">
                                <option selected value="admin">Admin</option>
                                <option selected value="user">User</option>
                              </select>
                            </div>
                            <div class="col-12">
                              <label for="inputstatus" class="form-label">Status</label>
                              <input type="text" name="editstatus"class="form-control" id="inputstatus" value="{{ $user->status }}">
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" name="submitedit" class="btn btn-warning" >Update</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="DeleteModal{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                        <p> Are you sure you want to delete this record?</p>
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="id" class="form-control" id="" value="">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <a href="/deleteUser/{{ $user->id }}" name="submitdelete" class="btn btn-danger">Confirm Delete</a>
                          </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal fade" id="AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add New User</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="/addUser">
                @csrf
                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" name="fname" class="form-control" id="fname">
                  </div>
                  <div class="col-md-6">
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" name="lname" class="form-control" id="lname">
                  </div>
                  <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="@gmail.com">
                  </div>
                  <div class="col-12">
                    <label for="password" class="form-label">Password </label>
                    <input type="text" name="password" class="form-control" id="password">
                  </div>
                  <div class="col-12">
                    <label for="inputState" class="form-label">Role</label>
                    <select id="inputState" name="role" class="form-select">
                      <option selected value="admin">Admin</option>
                      <option selected value="user">User</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Add New User</button>
              </div>
            </form>
          </div>
        </div>
      </div>
@endsection