<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('advertisement', function ($trail) {
    $trail->parent('home');
    $trail->push('List of Advertisements', route('advertisement-list'));
});

Breadcrumbs::for('advertisement-article', function ($trail, $advertisment) {
    $trail->parent('advertisement');
    $trail->push($advertisment->title, route('show-advertisement', $advertisment));
});

Breadcrumbs::for('advertisement-edit', function ($trail, $advertisment) {
    $trail->parent('home');
    $trail->push('Edit: ' . $advertisment->title, route('edit-advertisement', $advertisment));
});

Breadcrumbs::for('edit-user', function ($trail, $user) {
    $trail->parent('home');
    $trail->push('Edit: ' . $user->name, route('edit-user', $user));
});