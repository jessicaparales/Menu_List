@extends('layouts.dashboard')
@section('content')

<div class="container">
            <div class="row mt-5">
                <div class="col-4 mt-5">
                    <div class="card text-center float-end" style="width: 18rem;">
                            <div class="card-body" style="font-family: 'Poppins', sans-serif;
                            font-weight: 400;
                            font-style: normal;">
                                <h5 class="card-title">Profile Picture</h5>
                                @if(session('user')->profile_picture)
                                  <img src="uploads/{{ session('user')->profile_picture }}" class="card-img-top  rounded-circle mb-3" alt="..." width="200" height="250">
                                @else
                                <img src="/img/5.png" class="card-img-top" alt="...">
                                @endif
                                <div class="mb-3">
                                    <form method="POST" action="/editPicture" enctype="multipart/form-data">
                                        @csrf
                                        <input class="form-control form-control-sm" id="formFileSm" type="file" name="profile_pic">
                                        <button type="submit" class="btn btn-primary btn-sm w-100 mt-3">Change Photo</button>
                                    </form>
                                </div>
                           
                            </div>
                        </div>
                    </div>
                <div class="col-7">
                <div class="card">
                            <div class="card-body" style="font-family: 'Poppins', sans-serif;
                            font-weight: 400;
                            font-style: normal;">
                                <h5 class="card-title border-bottom pb-3">User Profile</h5>
                                <form method="post" action="/editProfile" class="row g-3">
                                    @csrf
                                <div class="col-md-6 floating-group">
                                        <input type="text" name="firstname" id="inputEmail4" value="{{ session('user')->firstname }}" required>
                                        <label for="inputEmail4"> First Name</label>
                                      </div>
                                <div class="col-md-6 floating-group">
                                        <input type="text" name="lastname" id="inputEmail4" value="{{ session('user')->lastname }}" required>
                                        <label for="inputEmail4"> Last Name</label>
                                     </div>
                                <div class="col-md-6 floating-group">
                                        <input type="email" name="email" id="inputPassword4" value="{{ session('user')->email }}" required>
                                        <label for="inputPassword4"> Email</label>
                                     </div>
                                <div class="col-md-6 floating-group">
                                    <input type="password" name="current_password" id="inputAddress">
                                    <label for="inputAddress"> Password</label>
                                  </div>
                                <div class="col-md-6 floating-group">
                                    <input type="text" name="new_pass" id="inputpass">
                                    <label for="inputAddress2"> New Password</label>
                                  </div>
                                <div class="col-md-6 floating-group">
                                    <input type="password" name="confirm_pass" id="inputpass">
                                    <label for="inputAddress2"> Confirm Password</label>
                                  </div>
                                <div class="col-12">
                                <button type="submit" name="update_user" class="btn btn-success btn-sm">Save Changes</button>
                                <a href="/showProfile" class="btn btn-secondary btn-sm">Cancel</a>
                                </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection