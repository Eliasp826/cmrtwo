<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CRMTWO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('panel.control') }}" class="nav-link" {{ request()->is
                                      ('panel.control') ? 'active' : ''}}>
                                <i class="fas fa-tachometer-alt"></i>
                                <p>Panel de Control</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-poll"></i>
                                <p>Analsis</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Gestor de Clientes</li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Clientes
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('client.manager') }}" class="nav-link" {{ request()->is
                                      ('client.manager') ? 'active' : ''}}>
                                <i class="nav-icon fas fa-th-list m-1"></i>
                                <p>Todo los Clientes
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-astronaut m-1"></i>
                                <p>Nuevo Clientes
                                    <span class="right badge badge-danger">New</span></p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Gestor Proyectos</li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Proyectos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('project.index') }}" class="nav-link" {{ request()->is
                            ('project.index') ? 'active' : ''}}>
                                <i class="nav-icon fas fa-th-list m-1"></i>
                                <p>Todo los Proyectos
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chalkboard m-1"></i>
                                <p>Nuevo Proyectos
                                    <span class="right badge badge-danger">New</span></p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Gestor Tarea</li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Tarea
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('tarea.pendiente')}}" class="nav-link" {{ request()->is
                        ('tarea.pendiente') ? 'active' : ''}}>
                                <i class="nav-icon fas fa-th-list m-1"></i>
                                <p>Todo las Tarea
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chalkboard m-1"></i>
                                <p>Nuevo Tarea
                                    <span class="right badge badge-danger">New</span></p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Gestor de Usuario</li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Gestion de Usuario
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.usuarios') }}" class="nav-link{{ request()->is
                                 ('admin/usuarios') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th-list m-1"></i>
                                <p>Lista Usuarios
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-plus m-1"></i>
                                <p>Nuevo Usuarios
                                    <span class="right badge badge-danger">New</span></p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header"></li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-astronaut"></i>
                        <p>
                            Cita
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>


                <li class="nav-header">Configuracion</li>
                <li class="nav-item">
                    <a href="{{ route('project.index') }}" class="nav-link" {{ request()->is
                            ('project.index') ? 'active' : ''}}>
                        <i class="nav-icon fas fa-chalkboard"></i>
                        <p>
                            Perfil
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
