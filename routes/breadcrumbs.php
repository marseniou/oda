<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('welcome', function (BreadcrumbTrail $trail) {
    $trail->push('Αρχική', route('welcome'));
});

// Home > Blog
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->parent('welcome');
    $trail->push('Blog', route('blog'));
});
// Home > Concerts
Breadcrumbs::for('concerts', function (BreadcrumbTrail $trail) {
    $trail->parent('welcome');
    $trail->push('Συναυλίες', route('concerts'));
});

// Home > Blog > [Category]
Breadcrumbs::for('post', function (BreadcrumbTrail $trail, $post) {
    $trail->parent('blog');
    $trail->push($post->title, route('post', $post));
});