
<aside id="layout-menu" class="d-flex flex-column flex-shrink-0 sticky-top" style="width: 260px; height: 100vh; background-color: rgb(21, 129, 191);">
  
  <div class="d-flex align-items-center justify-content-between px-3 py-3 border-bottom border-secondary" style="font-family: 'Poppins', sans-serif;
  font-weight: 400;
  font-style: normal;">
    <a href="/home" class="d-flex align-items-center text-decoration-none">
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