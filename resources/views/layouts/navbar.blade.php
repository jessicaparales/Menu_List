<!-- <nav class="nav flex-column pt-5 ps-3 sticky-top" style="width: 200px; height: 100vh; background-color: #547792;">
    <a class="nav-link text-white" style="color: white;" href="/home">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house me-3" viewBox="0 0 16 16">
        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
      </svg>Home
    </a>
  <div class="nav-link dropdown">
    <a class="dropdown-toggle text-white text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fork-knife me-3" viewBox="0 0 16 16">
        <path d="M13 .5c0-.276-.226-.506-.498-.465-1.703.257-2.94 2.012-3 8.462a.5.5 0 0 0 .498.5c.56.01 1 .13 1 1.003v5.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5zM4.25 0a.25.25 0 0 1 .25.25v5.122a.128.128 0 0 0 .256.006l.233-5.14A.25.25 0 0 1 5.24 0h.522a.25.25 0 0 1 .25.238l.233 5.14a.128.128 0 0 0 .256-.006V.25A.25.25 0 0 1 6.75 0h.29a.5.5 0 0 1 .498.458l.423 5.07a1.69 1.69 0 0 1-1.059 1.711l-.053.022a.92.92 0 0 0-.58.884L6.47 15a.971.971 0 1 1-1.942 0l.202-6.855a.92.92 0 0 0-.58-.884l-.053-.022a1.69 1.69 0 0 1-1.059-1.712L3.462.458A.5.5 0 0 1 3.96 0z"/>
      </svg>Menu
    </a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="/menu">Menu List</a></li>
      <li><a class="dropdown-item" href="/manageMenu">Manage Menu</a></li>
    </ul>
  </div>
    <a class="nav-link" style="color: white;" href="/profile" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle me-3" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
</svg>Profile</a>
  </nav> -->

  <!--  php -->

  

<aside id="layout-menu" class="d-flex flex-column flex-shrink-0 sticky-top" style="width: 260px; height: 100vh; background-color: rgb(21, 129, 191);">
  
  <div class="d-flex align-items-center justify-content-between px-3 py-3 border-bottom border-secondary" style="font-family: 'Poppins', sans-serif;
  font-weight: 400;
  font-style: normal;">
    <a href="index.html" class="d-flex align-items-center text-decoration-none">
      <img src="uploads/logoMenu.jpg" alt="Logo" style="width: 60px; height: 60px; border-radius: 50%;">
      <span class="text-white fw-bold ms-3 fs-5" style="font-family: 'Poppins', sans-serif;
  font-weight: 400;
  font-style: normal;">Jisicafe</span>
    </a>
    <a href="javascript:void(0);" class="text-white d-xl-none">
      <i class="bx bx-chevron-left fs-4"></i>
    </a>
  </div>

  <nav class="flex-grow-1 py-2">
    <ul class="nav flex-column px-2">

      <li class="nav-item">
        <a href="/home" class="nav-link text-white d-flex align-items-center gap-2 rounded px-3 py-2">
          <i class="bx bx-home-alt fs-5"></i>
          <span>Home</span>
        </a>
      </li>

      <li class="nav-item">
        <a href="#scheduleMenu" class="nav-link text-white d-flex align-items-center gap-2 rounded px-3 py-2"
          data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="eventsMenu">
          <i class="bx bx-calendar-event fs-5"></i>
          <span>Menu</span>
          <i class="bx bx-chevron-down ms-auto"></i>
        </a>
        <div class="collapse" id="scheduleMenu">
          <ul class="nav flex-column ps-4">
            <li class="nav-item">
              <a href="/menu" class="nav-link text-white-50 py-1">Menu List</a>
            </li>
            <li class="nav-item">
              <a href="/manageMenu" class="nav-link text-white-50 py-1">Manage Menu</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item">
        <a href="#accountMenu" class="nav-link text-white d-flex align-items-center gap-2 rounded px-3 py-2"
          data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="accountMenu">
          <i class="bx bx-dock-top fs-5"></i>
          <span>Account Settings</span>
          <i class="bx bx-chevron-down ms-auto"></i>
        </a>
        <div class="collapse" id="accountMenu">
          <ul class="nav flex-column ps-4">
            <li class="nav-item">
              <a href="/users" class="nav-link text-white-50 py-1">Manage Accounts</a>
            </li>
            <li class="nav-item">
              <a href="/profile" class="nav-link text-white-50 py-1">View Profile</a>
            </li>
          </ul>
        </div>
      </li>

    </ul>
  </nav>

  <div class="mt-auto p-3 border-top border-light">
    <a href="/logout"
      class="btn text-white w-100 d-flex align-items-center justify-content-end gap-2">
      <i class="bx bx-log-out"></i>
      Logout
    </a>
  </div>
</aside>