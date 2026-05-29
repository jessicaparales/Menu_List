<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css">
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
  

    <title>Dashboard</title>

    <style>
      body{
        overflow-x: hidden;
      }

      .floating-group {
    position: relative;
  
}
.floating-group input {
    width: 100%;
    height: 42px;
    background: transparent;
    border: 1px solid #777A8D;
    padding: 0 15px;
    font-family: "Poppins", sans-serif;
    font-size: 14px;
    border-radius: 6px;
    transition: all 0.3s ease;
}
.floating-group label {
    position: absolute;
    top: 11px;
    left: 12px;
    font-family: "Poppins", sans-serif;
    font-size: 0.9rem;
    font-weight: 600;
    color: #9da0a5;
    background: #fff;
    padding: 0 8px;
    pointer-events: none;
    transition: all 0.3s ease;
}
.floating-group input:focus + label,
.floating-group input:valid + label {
    top: -7px;
    font-size: 11px;
    color: #23386b;
}
.floating-group input:focus {
    border-color: #23386b;
    outline: none;
    box-shadow: none;
}
    </style>
</head>
<body>
<div class="d-flex" style="min-height: 100vh;">
    @include('layouts.navbar')

    <div class="flex-grow-1 p-4" style="min-width: 0; overflow-x: hidden;">
      @yield('content')
    </div>
</div>
    @if(session('error'))
      <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div class="toast align-items-center text-bg-danger border-0" role="alert">
          <div class="d-flex">
            <div class="toast-body">
              {{ session('error') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
          </div>
        </div>
      </div>
    @endif

    @if(session('success'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
      <div class="toast align-items-center text-bg-success border-0" role="alert">
        <div class="d-flex">
          <div class="toast-body">
            {{ session('success') }}
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
      </div>
    </div>
    @endif
  
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        const toastElist = document.querySelectorAll('.toast');
            toastElist.forEach(function(toastEl){
                const toast= new bootstrap.Toast(toastEl,{
                    delay: 3000
                });
                toast.show();
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    @yield('script')
</body>
</html>