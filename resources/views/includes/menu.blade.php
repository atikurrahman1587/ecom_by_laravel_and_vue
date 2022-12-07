<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right"></span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span>Website Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="layouts-horizontal.html">Horizontal</a></li>
                        <li><a href="layouts-light-sidebar.html">Light Sidebar</a></li>
                        <li><a href="layouts-compact-sidebar.html">Compact Sidebar</a></li>
                        <li><a href="layouts-icon-sidebar.html">Icon Sidebar</a></li>
                        <li><a href="layouts-boxed.html">Boxed Width</a></li>
                        <li><a href="layouts-preloader.html">Preloader</a></li>
                        <li><a href="layouts-colored-sidebar.html">Colored Sidebar</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Product Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('category.index') }}">Manage Category</a></li>
                        <li><a href="{{ route('sub-category.index') }}">Manage Sub Category</a></li>
                        <li><a href="{{ route('brand.index') }}">Manage Brand</a></li>
                        <li><a href="{{ route('color.index') }}">Manage Color</a></li>
                        <li><a href="{{ route('size.index') }}">Manage Size</a></li>
                        <li><a href="{{ route('unit.index') }}">Manage Unit</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-bitcoin"></i>
                        <span>Product Manager</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('product.add') }}">Add New Product</a></li>
                        <li><a href="{{ route('product.manage') }}">Manage Product</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-envelope"></i>
                        <span>Supplier Manager</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('supplier.add') }}">Manage Supplier</a></li>
                        <li><a href="email-read.html">Supplier Payment</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-receipt"></i>
                        <span>Inventory Module</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('stock.add') }}">New Inventory</a></li>
                        <li><a href="{{ route('stock.manage') }}">Mange Inventory</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-briefcase-alt-2"></i>
                        <span>Order Module</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="projects-grid.html">Mange Order</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
