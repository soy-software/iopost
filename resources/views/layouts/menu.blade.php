<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">
    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
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
                
                @can('Usuarios')
                <li class="nav-item">
                    <a href="{{ route('usuarios') }}" class="nav-link" id="menuUsuarios">
                        <i class="icon-home4"></i>
                        <span>
                            Usuarios
                        </span>
                    </a>
                </li>
                @endcan

                {{-- menu para la administracion de maestrias --}}
                <li class="nav-item">
                    <a href="{{ route('maestrias') }}" class="nav-link ">
                        <i class="icon-newspaper"></i>
                        <span>
                            Maestrías
                        </span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Layouts</span></a>
            
                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="index.html" class="nav-link active">Default layout</a></li>
                        <li class="nav-item"><a href="../../../../layout_2/LTR/default/full/index.html" class="nav-link">Layout 2</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Themes</span></a>
            
                    <ul class="nav nav-group-sub" data-submenu-title="Themes">
                        <li class="nav-item"><a href="index.html" class="nav-link active">Default</a></li>
                        <li class="nav-item"><a href="../../../LTR/material/full/index.html" class="nav-link">Material</a></li>
                    </ul>
                </li>
            
            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->
</div>