<div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="" class="simple-text logo-normal">
          Admin Dashboard
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="{{url('/profil')}}">
              <i class="nc-icon nc-single-02"></i>
              <p>Profile</p>
            </a>
          </li>
          <li>
                <a class="dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown">
                  <i class="nc-icon nc-bullet-list-67"></i>
                  <span>Data Master</span>
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{url('/kategori')}}">Kategori</a>
                  <a class="dropdown-item" href="{{url('/penulis')}}">Penulis</a>
                  <a class="dropdown-item" href="{{url('/tag')}}">Tag</a>
                </div>
              </li> 
          <li>
            <a href="{{url('/berita')}}">
              <i class="nc-icon nc-layout-11"></i>
              <p>Berita</p>
            </a>
          </li>
          <li>
            <a href="{{url('/pengumuman')}}">
              <i class="nc-icon nc-calendar-60"></i>
              <p>Pengumuman</p>
            </a>
          </li>
          <li>
            <a href="{{url('/user')}}">
              <i class="nc-icon nc-tile-56"></i>
              <p>Konten</p>
            </a>
          </li>
          <li>
            <a href="{{url('/user')}}">
              <i class="nc-icon nc-circle-10"></i>
              <p>Manajemen User</p>
            </a>
          </li>
          <li class="active-pro">
            <a onclick="event.preventDefault();
              document.getElementById('logout').submit()">
            <button style="margin:20px;" class="btn btn-warning">
              <p>Log Out</p>
            <form action="{{ url('/logout')}}" method="post" id="logout" style="display:none;">
            @csrf
            </form>
            </a>
            </button>
          </li>
        </ul>
      </div>
    </div>
