<div class="text-center d-lg-none w-100">
    <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
        <i class="icon-unfold mr-2"></i>
        Información
    </button>
</div>

<div class="navbar-collapse collapse" id="navbar-footer">
    <span class="navbar-text">
        &copy; {{ date('Y') }}.
        <a href="#">{{ config('app.name','UTC-POSGRADOS') }}</a> by 
        <a href="https://soysoftware.com" target="_blanck">
            SOYSOFTWARE
        </a>
    </span>

    <ul class="navbar-nav ml-lg-auto">
        <li class="nav-item">
            <a href="https://soysoftware.com" target="_blanck" class="navbar-nav-link font-weight-semibold">
                <span class="text-pink-400">
                    <i class="fas fa-helicopter"></i> Soporte
                </span>
            </a>
        </li>
    </ul>
</div>