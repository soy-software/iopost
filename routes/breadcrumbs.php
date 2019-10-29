<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Adminitración', route('home'));
});