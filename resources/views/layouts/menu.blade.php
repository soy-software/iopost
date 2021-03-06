<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navegación
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Navegación</div>
                    <i class="icon-menu" title="Navegación"></i>
                </li>

                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link" id="menuHome">
                        <i class="fas fa-home"></i>
                        <span>
                            Administración
                        </span>
                    </a>
                </li>

                @can('G. Usuarios')
                <li class="nav-item">
                    <a href="{{ route('usuarios') }}" class="nav-link" id="menuUsuarios">
                        <i class="fas fa-users"></i>
                        <span>
                            Usuarios
                        </span>
                    </a>
                </li>
                @endcan

                {{-- menu para la administracion de maestrias --}}
                @can('G. Maestrías')

                <li class="nav-item">
                    <a href="{{ route('maestrias') }}" class="nav-link" id="menuMaestria">
                        <i class="icon-newspaper"></i>
                        <span>
                            Maestrías
                        </span>
                    </a>
                </li>
                @endcan

                @can('accederMisMaestrias',App\Models\Maestria::class)
                    <li class="nav-item">
                        <a href="{{ route('misMaestrias') }}" class="nav-link" id="menuMisMaestria">
                            <i class="icon-newspaper"></i>
                            <span>
                                Mis maestrías
                            </span>
                        </a>
                    </li>
                @endcan


                {{--  menu mis inscripciones  --}}
                <li class="nav-item">
                    <a href="{{ route('misInscripciones') }}" class="nav-link" id="menuMisInscripciones">
                        <i class="fas fa-clipboard-check"></i>
                        <span>
                            Mis pagos
                        </span>
                    </a>
                </li>

                @role('Tesorero')
                    <li class="nav-item">
                        <a href="{{ route('cobros') }}" class="nav-link" id="menuaprobarRegistroMaestrias">
                            <i class="fas fa-money-check-alt"></i>
                            <span>
                                Cobros
                            </span>
                        </a>
                    </li>
                @endrole

                @role('Administrador')
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">SISTEMA</div>
                    <i class="icon-menu" title="Sistemas"></i>
                </li>

                <li class="nav-item">
                    <a href="{{ route('roles') }}" class="nav-link" id="menuRoles">
                        <i class="fas fa-unlock-alt"></i>
                        <span>
                            Roles y permisos
                        </span>
                    </a>
                </li>
                @endrole

                {{--  <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Layouts</span></a>
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="" class="nav-link active">Default layout</a></li>
                        <li class="nav-item"><a href="" class="nav-link">Layout 2</a></li>
                    </ul>
                </li>  --}}

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->
</div>
