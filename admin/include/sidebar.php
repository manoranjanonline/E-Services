<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="./">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-lock"></i>
        </div>
        <div class="sidebar-brand-text mx-3">TBS Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if($page_url === 'index') echo('active'); ?>">
        <a class="nav-link" href="./">
            <i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item <?php if($page_url === 'service') echo('active'); ?>">
        <a class="nav-link" href="service.php">
            <i class="fas fa-fw fa-table"></i><span>Service</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item <?php if($page_url === 'shop') echo('active'); ?>">
        <a class="nav-link" href="shop.php">
            <i class='fas fa-store-alt'></i><span>Shop</span>
        </a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item <?php if($page_url === 'bookings') echo('active'); ?>">
        <a class="nav-link" href="bookings.php">
            <i class='fa fa-file'></i><span>Bookings</span>
        </a>
    </li>
    
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Tables -->
    <li class="nav-item <?php if($page_url === 'contact-form-data') echo('active'); ?>">
        <a class="nav-link" href="contact-form-data.php">
            <i class='fa fa-file'></i><span>Contact Form Data</span>
        </a>
    </li>
     
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->