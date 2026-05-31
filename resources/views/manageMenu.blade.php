@extends('layouts.dashboard')

@section('content')
<div class="container">
        <div class="d-flex justify-content-between mb-3 mt-5">
          <h3 style="font-family: 'Poppins', sans-serif;
  font-weight: 400;
  font-style: normal;">
            Manage Menu
          </h3>
          <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#AddModal" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><i class="bi bi-plus"></i>Add Menu</button>
        </div>
        <div class="row me-3">
          <table class="table ms-3">
            <thead class= "table-light"  style="font-family: 'Poppins', sans-serif;
  font-weight: 400;
  font-style: normal;">
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Picture</th>
                
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($menuList as $manageMenu)
                    <tr>
                      <td>{{$loop->iteration }}</td>
                      <td>{{$manageMenu->menu_name }}</td>
                      <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$manageMenu->menu_description }}</td>
                      <td>{{$manageMenu->menu_price}}</td>
                      <td>{{$manageMenu->menu_category }}</td>
                      <td>{{$manageMenu->menu_picture == '' ? 'N/A' : $manageMenu->menu_picture}}</td>

                      <td>
                        <a type='button' class='btn btn-warning' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'  data-bs-toggle='modal' data-bs-target='#EditModal{{$manageMenu->menu_id  }}'><i class="bi bi-pencil"></i></a>
                        <a type='button' class='btn btn-danger' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'  data-bs-toggle='modal' data-bs-target='#DeleteModal{{ $manageMenu->menu_id }}'><i class="bi bi-trash-fill"></i></a>
                      </td>
                    </tr> 
                  
                  <div class="modal fade" id="EditModal{{ $manageMenu->menu_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form method="post" action = "/editMenu/{{ $manageMenu->menu_id }}" enctype="multipart/form-data">
                          @csrf
                          <div class="row g-3">
                            <input type="hidden" name="menu_id" class="form-control" id="" value="{{ $manageMenu->menu_id }}">
                            <div class="col-md-6">
                              <label for="name" class="form-label">Name</label>
                              <input type="text"name="editname" class="form-control" id="inputEmail4" value="{{ $manageMenu->menu_name }}">
                            </div>
                            <div class="col-md-6">
                              <label for="price" class="form-label">Price</label>
                              <input type="text" name="editprice" class="form-control" id="inputPassword4" value="{{ $manageMenu->menu_price}}">
                            </div>
      
                            <div class=" col-12 form-floating">
                              <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="editdescription" style="height: 80px">{{ $manageMenu->menu_description }}</textarea>
                              <label for="floatingTextarea">Description</label>
                            </div>
                             
                            <div class="col-12">
                              <label for="inputcategory" class="form-label">Category</label>
                              <select id="inputcategory" name="editcategory" class="form-select">
                                <option {{ $manageMenu->menu_category == 'foods' ? 'selected' : '' }} value="foods">Foods</option>
                                <option {{ $manageMenu->menu_category == 'drinks' ? 'selected' : '' }} value="drinks">Drinks</option>
                                </select>
                            </div>
                            <div class="col-12">
                              <label for="inputpicture" class="form-label">Picture</label>
                              <input class="form-control form-control-sm" id="formFileSm" type="file" name="menupic">
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
                  <div class="modal fade" id="DeleteModal{{ $manageMenu->menu_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                        <p> Are you sure you want to delete this record?</p>
                        </div>
                        <div class="modal-footer">
                          <form method="post" action="/deleteMenu">
                            @csrf
                            <input type="hidden" name="menu_id" class="form-control" id="" value="{{ $manageMenu-> menu_id }}">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submitdelete" class="btn btn-danger">Confirm Delete</button>
                          </form>   
                          </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal fade" id="AddModal" style="font-family: 'Poppins', sans-serif;
      font-weight: 400;
      font-style: normal;" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Menu</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" action="/addMenu" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">

                  <div class="col-md-6 floating-group">
                    <input type="text" name="menu_name" id="menu_name" required>
                    <label for="menu_name">Name</label>
                  </div>

                  <div class="col-md-6 floating-group">
                    <input type="text" name="menu_price" id="menu_price" required>
                    <label for="menu_name">Price</label>
                  </div>
          
                  <div class="col-12">
                    <label for="category" class="form-label">Category</label>
                    <select id="inputState" name="menu_category" class="form-select">
                      <option selected value="foods">Foods</option>
                      <option selected value="drinks">Drinks</option>
                      </select>
                  </div>
                  <div class="col-12">
                    <label for="picture" class="form-label">Picture </label>
                    <input class="form-control form-control-sm" id="formFileSm" type="file" name="menu_picture">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit" class="btn btn-primary">Add New Menu</button>
              </div>
            </form>
          </div>
        </div>
      </div>
@endsection