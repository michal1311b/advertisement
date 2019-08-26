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

Breadcrumbs::for('user-advertisements', function ($trail) {
    $trail->parent('home');
    $trail->push('User List of Advertisements', route('user-advertisement-list'));
});

Breadcrumbs::for('user-advertisement-article', function ($trail, $advertisment) {
    $trail->parent('user-advertisements');
    $trail->push($advertisment->title, route('user-advertisement-show', $advertisment));
});

Breadcrumbs::for('contacts', function ($trail) {
    $trail->parent('home');
    $trail->push('List of contacts', route('user-contact'));
});