   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="<?= BASE_URL_ADMIN ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>


<!-- thêm các danh mục quản lí vào đây -->
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
        aria-expanded="true" aria-controls="collapseOne">
        <i class="fas fa-fw fa-cog"></i>
        <span>Quản lí khách hàng</span>
    </a>
    <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Quản lí khách hàng</h6>
            <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=users">Danh sách</a>
            <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=users-create">Thêm mới khách hàng</a>

        </div>
    </div>
</li>
<!-- end 1 nhánh -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Quản lí loại hàng</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Quản lí loại hàng</h6>
            <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=category">Danh sách</a>
            <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=category-create">Thêm mới loại hàng</a>

        </div>
    </div>
</li>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
        aria-expanded="true" aria-controls="collapseThree">
        <i class="fas fa-fw fa-cog"></i>
        <span>Quản lí sản phẩm</span>
    </a>
    <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Quản lí sản phẩm</h6>
            <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=product">Danh sách sản phảm</a>
            <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=product-create">Thêm mới sản phẩm</a>

        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
        aria-expanded="true" aria-controls="collapseFour">
        <i class="fas fa-fw fa-cog"></i>
        <span>Quản lí bình luận</span>
    </a>
    <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Quản lí bình luận</h6>
            <a class="collapse-item" href="<?= BASE_URL_ADMIN ?>?act=comment">Danh sách bình luận</a>
        </div>
    </div>
</li>



<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->

</ul>
<!-- End of Sidebar -->