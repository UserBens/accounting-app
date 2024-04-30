<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-orange elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link text-center">
        {{-- <img src="{{asset('template')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        {{-- <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse2.mm.bing.net%2Fth%3Fid%3DOIP.dslXiO2DR5mYsNKZa8f8_gAAAA%26pid%3DApi&f=1&ipt=dadf6b59e2457fa578ca99f9f2a232f051528c0c5f50644c70ac19cb47b1766c&ipo=images" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-bold">Great Crystal School</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-start">
            <div class="image">
                <img src="{{ asset('images/admin.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block brand-text" style="font-size: 1.2em;">
                    {{-- @if (session('role') == 'superadmin')
                        Super Admin
                    @else
                        {{ ucwords(session('role')) }}
                    @endif --}}
                    Accounting
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="true">
                <!-- Add icons to the links using the .nav-icon class
      with font-awesome or any other icon font library -->

                <li class="ml-1 nav-item">
                    <a href="{{ url('/admin/dashboard') }}"
                        class="nav-link {{ session('page') && session('page')->page ? (session('page')->page == 'dashboard' ? 'active' : '') : '' }}">
                        <i class="mr-2 fa-regular fa-folder-open"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- @if (session('role') !== 'accounting')
                   




                   
                   
                    <li
                        class="nav-item {{ session('page') && session('page')->page ? (session('page')->page == 'books' ? 'menu-open' : '') : '' }}">
                        <a href="#"
                            class="nav-link {{ session('page') && session('page')->page ? (session('page')->page == 'books' ? 'active' : '') : '' }}">
                            <i class="nav-icon fa-solid fa-book"></i>
                            <p>
                                Book
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/books"
                                    class="nav-link {{ session('page') && session('page')->child ? (session('page')->child == 'database book' ? 'active' : '') : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif --}}

                @if (session('role') !== 'admin')
                    <li
                        class="nav-item {{ session('page') && session('page')->page ? (session('page')->page == 'payments' ? 'menu-open' : '') : '' }}">
                        <a href="#"
                            class="nav-link {{ session('page') && session('page')->page ? (session('page')->page == 'payments' ? 'active' : '') : '' }}">
                            <i class="nav-icon fa-regular fa-credit-card"></i>
                            <p>
                                Payment
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/spp-students"
                                    class="nav-link {{ session('page') && session('page')->child ? (session('page')->child == 'spp-students' ? 'active' : '') : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Students</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/payment-grades"
                                    class="nav-link {{ session('page') && session('page')->child ? (session('page')->child == 'payment-grades' ? 'active' : '') : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Grades</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/payment-books"
                                    class="nav-link {{ session('page') && session('page')->child ? (session('page')->child == 'payment-books' ? 'active' : '') : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Book</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li
                    class="nav-item {{ session('page') && session('page')->page ? (session('page')->page == 'Bills' ? 'menu-open' : '') : '' }}">
                    <a href="#"
                        class="nav-link {{ session('page') && session('page')->page ? (session('page')->page == 'Bills' ? 'active' : '') : '' }}">
                        <i class="nav-icon fa-solid fa-cash-register"></i>
                        <p>
                            Bill
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/bills/create"
                                class="nav-link {{ session('page') && session('page')->child ? (session('page')->child == 'create bills' ? 'active' : '') : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/bills"
                                class="nav-link {{ session('page') && session('page')->child ? (session('page')->child == 'database bills' ? 'active' : '') : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/bills/status"
                                class="nav-link {{ session('page') && session('page')->child ? (session('page')->child == 'status bills' ? 'active' : '') : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Status</p>
                            </a>
                        </li>
                    </ul>
                </li>





                @if (session('role') !== 'admin')
                    <li
                        class="nav-item {{ session('page') && session('page')->page ? (session('page')->page == 'Report' ? 'menu-open' : '') : '' }}">
                        <a href="#"
                            class="nav-link {{ session('page') && session('page')->page ? (session('page')->page == 'Report' ? 'active' : '') : '' }}">
                            <i class="nav-icon fa-solid fa-receipt"></i>
                            <p>
                                Report
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/reports"
                                    class="nav-link {{ session('page') && session('page')->child ? (session('page')->child == 'report bills' ? 'active' : '') : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bills</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- financial page --}}
                    <li
                        class="nav-item {{ session('page') && session('page')->page ? (session('page')->page == 'Financial' ? 'menu-open' : '') : '' }}">
                        <a href="#"
                            class="nav-link {{ session('page') && session('page')->page ? (session('page')->page == 'Financial' ? 'active' : '') : '' }}">
                            <i class="nav-icon fa-solid fa-credit-card-alt"></i>
                            <p>
                                Financial
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('income.index') }}"
                                    class="nav-link {{ session('page') && session('page')->page ? (session('page')->child == 'database income' ? 'active' : '') : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Income</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('expenditure.index') }}"
                                    class="nav-link {{ session('page') && session('page')->child ? (session('page')->child == 'database expenditure' ? 'active' : '') : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Expenditure</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Transaction Page --}}
                    <li
                        class="nav-item {{ session('page') && session('page')->page ? (session('page')->page == 'Transaction' ? 'menu-open' : '') : '' }}">
                        <a href="#"
                            class="nav-link {{ session('page') && session('page')->page ? (session('page')->page == 'Transaction' ? 'active' : '') : '' }}">
                            <i class="nav-icon fa-solid fa-comments-dollar"></i> 
                            <p>
                                Accounting
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('cash.index') }}"
                                    class="nav-link {{ session('page') && session('page')->page ? (session('page')->child == 'database Cash & Bank' ? 'active' : '') : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Cash & Bank</p>
                                </a>
                            </li>
                          
                            <li class="nav-item">
                                <a href="{{ route('account.index') }}"
                                    class="nav-link {{ session('page') && session('page')->page ? (session('page')->child == 'database Account Number' ? 'active' : '') : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Account Number</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('journal.index') }}"
                                    class="nav-link {{ session('page') && session('page')->page ? (session('page')->child == 'database Journal' ? 'active' : '') : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Journal</p>
                                </a>
                            </li>
                           
                        </ul>
                    </li>
                @endif

                @if (session('role') == 'superadmin')
                    <li class="nav-header">AUTHENTICATION</li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/user') }}"
                            class="nav-link {{ session('page') && session('page')->page ? (session('page')->page == 'user' ? 'active' : '') : '' }}">
                            <i class="fa-solid fa-user-secret nav-icon"></i>
                            <p>User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/user/change-password') }}"
                            class="nav-link {{ session('page') && session('page')->page ? (session('page')->page == 'admin' ? 'active' : '') : '' }}">
                            <i class="nav-icon fas fa-solid fa-lock"></i>
                            <p>Change my password</p>
                        </a>
                    </li>
                @else
                    <li class="nav-header">AUTHENTICATION</li>
                    <li class="nav-item">
                        <a href="{{ url('/admin/user/change-password') }}"
                            class="nav-link {{ session('page') && session('page')->page ? (session('page')->page == 'admin' ? 'active' : '') : '' }}">
                            <i class="nav-icon fas fa-solid fa-lock"></i>
                            <p>Change my password</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>

    </div>
    <!-- /.sidebar -->
</aside>
{{-- <script>
  $(".nav-item").click(function () {

    console.log('masuk')
        if($(".nav-item").hasClass("menu-open")){
          $(".nav-item").removeClass('menu-open');
        }
     }) 
</script> --}}
