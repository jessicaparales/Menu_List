@extends('layouts.main')
@section('content')
<div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="col-md-4 col-sm-8">
        <div class="card py-5 px-5 align-items-center" style="width: 30rem ;
        background-color:rgb(21, 129, 191);">
            <h1 style= "color: white; font-family: 'Lora', serif ;">Sign Up</h1>
            <p style="color: white;" class="small">Sign up to continue</p>
            <form method="post" action="/signup" class="w-100">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3 mt-3 ">
                        <label for="email" class="form-label text-white">First Name:</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter name" name="firstname" required>
                    </div>
                    <div class="col-md-6 mb-3 mt-3 ">
                        <label for="email" class="form-label text-white">Last Name:</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter name" name="lastname" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label text-white">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="pwd" class="form-label text-white">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="pwd" class="form-label text-white"> Confirm Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Confirm password" name="cnfrm" required>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-outline-light w-100">Sign Up</button>
                <div class="text-center mt-3">
                    <a href="/login" class="text-white">Already have an account?</a>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection