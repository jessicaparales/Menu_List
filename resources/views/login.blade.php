@extends('layouts.main')
@section('style')
    <link rel="stylesheet" href="style.css">
@endsection
@section('content')


<div class="d-flex justify-content-center align-items-center min-vh-100 py-4">     
    <div class="container">
        <div class="row bg-dark">
            <div class="col-12 col-md-7 px-5 py-5 background">
                <div class="d-flex ps-md-5 h-100 w-100 flex-column">
                    <img src="uploads/logoMenu.jpg" alt="logo.jpg" height="60" width="60" class="img-fluid mb-4 mb-md-5 rounded-circle">
                    <h1 class="text-white fs-1"> Hello, <br> Welcome!</h1>
                    <p class="text-white small w-100 w-md-75" style="font-family: 'Lora', serif;">Welcome to a dining experience designed exclusively for you. Our reservation-only restaurant ensures personalized attention for every guest. We blend artisanal coffee with innovative cuisine in a cozy atmosphere, featuring a seasonal menu that showcases regional flavors.</p>
                </div>
            </div>
            <div class="col-12 col-md-5 px-5 py-5" style="background-color:rgb(58, 139, 149);">

            <form method="post" action="/login">
                @csrf
                <h2 class="mt-4 text-white" style="font-family: 'Lora', serif;">Sign In</h2>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-white">Email address</label>
                    <input type="email" name="email"  class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div> 
                
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label text-white">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleFormControlInput2" placeholder="********">
                </div>
                
                <div class="d-flex justify-content-between w-100 mt-3 flex-wrap">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="checkChecked" checked>
                        <label class="form-check-label text-white" for="checkChecked">
                        Remember Me
                        </label>
                    </div>
                    <a href="#" class="text-white">Forget Password?</a>
                </div>
                <input class="btn btn-light w-100 mt-3" name="submit" type="submit" value="Sign In">
                <p class="text-center mt-3 text-white">or</p>
                <button type="button" class="btn btn-outline-light w-100">Sign in with other</button>
                <div class="d-flex mt-4 text-white">
                    <p>Don't have an account?</p>
                    <a href="/signup" class="ms-2 text-white">Sign Up</a>
                </div>
            </form>    
            </div>
        </div>

        </div>
    </div>
</div>
@endsection