<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('landing-page')}}">
    <img src="{{asset('images/kiyix_logo_white.png')}}" style="height:100px;width:auto;padding:20px;" alt="Kaneslor Logo">
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{route('employer.home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Vacancy
</div>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#vacancies"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-book"></i>
        <span>  My Vacancies  </span>
    </a>
    <div id="vacancies" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="{{route('employer.create_job_vacancy_page')}}">Create Vacancy</a>
            <a class="collapse-item" href="{{route('employer.view_vacancies')}}">View Vacancies</a>
            <!-- <a class="collapse-item" href="#">View Job applications</a> -->
        </div>
    </div>
</li>

<!-- Heading -->
<div class="sidebar-heading">
    Settings 
</div>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#profile"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>  Profile</span>
    </a>
    <div id="profile" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <!-- <a class="collapse-item" href="#">Make Payment </a> -->
            <a class="collapse-item" href="{{route('employer.view-profile')}}">View Profile</a>
        </div>
    </div>
</li>

<hr/>

<li class="nav-item d-flex justify-content-center">
    <a class=" btn btn-block btn-danger text-white " href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-white"></i>
            Logout
    </a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- Sidebar Message -->
<!--  -->

</ul>
<!-- End of Sidebar -->