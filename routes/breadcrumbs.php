<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('employees.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('社員一覧', route('employees.index'));
});


Breadcrumbs::for('employees.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('employees.index');
    $trail->push('社員詳細', route('employees.show', $id));
});


