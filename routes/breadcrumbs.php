<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('Home'), route('home'));
});

Breadcrumbs::for('site.homepage', function ($trail) {
    $trail->push(trans('homepage.homepage'), route('homepage'));
});

Breadcrumbs::for('site.register-step', function ($trail) {
    $trail->push(trans('sentence.register'), route('register.step'));
});


Breadcrumbs::for('cookies', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.cookies-policy'), route('cookies.show'));
});

Breadcrumbs::for('regulation', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.regulation'), route('regulation.show'));
});

Breadcrumbs::for('opinion-summary', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.thanks-for-opinion'), route('thanks-opinion'));
});

Breadcrumbs::for('contact-form', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('email.contact-form'), route('contact.show'));
});

Breadcrumbs::for('advertisement', function ($trail) {
    $trail->parent('site.homepage');
    $trail->push(trans('offer.offers-list'), route('advertisement-list'));
});

Breadcrumbs::for('visitors', function ($trail) {
    $trail->parent('site.homepage');
    $trail->push(trans('sentence.visitors-list'), route('watch-visitors-on-map'));
});

Breadcrumbs::for('archive', function ($trail) {
    $trail->parent('site.homepage');
    $trail->push(trans('offer.offers-archive'), route('advertisement-archive'));
});

Breadcrumbs::for('courses', function ($trail) {
    $trail->parent('site.homepage');
    $trail->push(trans('sentence.courses'), route('course.index'));
});

Breadcrumbs::for('course-article', function ($trail, $course) {
    $trail->parent('courses');
    $trail->push($course->title, route('show-course', ['id' => $course->id, 'slug' => $course->slug]));
});

Breadcrumbs::for('participant-info', function ($trail, $participant) {
    $trail->parent('user-courses');
    $trail->push($participant->first_name . ' ' . $participant->last_name, route('user-course-participant-show', ['id' => $participant->id, 'course' => $participant->company_course_id]));
});

Breadcrumbs::for('user-courses', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.courses'), route('user-course-list'));
});

Breadcrumbs::for('advertisement-article', function ($trail, $advertisment) {
    $trail->parent('advertisement');
    $trail->push($advertisment->title, route('show-advertisement', ['id' => $advertisment->id, 'slug' => $advertisment->slug]));
});

Breadcrumbs::for('foreign', function ($trail) {
    $trail->parent('site.homepage');
    $trail->push(trans('offer.offers-list'), route('foreign-list'));
});

Breadcrumbs::for('foreign-article', function ($trail, $advertisement) {
    $trail->parent('foreign');
    $trail->push($advertisement->title, route('show-foreign', ['id' => $advertisement->id, 'slug' => $advertisement->slug]));
});

Breadcrumbs::for('create-offer', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('offer.user-offers'), route('user-advertisement-list'));
    $trail->push(trans('offer.offer-create-poland'), route('create-advertisement'));
});

Breadcrumbs::for('create-offer-foreign', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('offer.user-foreigns'), route('user-foreign-list'));
    $trail->push(trans('offer.offer-create-foreign'), route('create-advertisement'));
});

Breadcrumbs::for('advertisement-edit', function ($trail, $advertisment) {
    $trail->parent('home');
    $trail->push(trans('offer.user-offers'), route('user-advertisement-list'));
    $trail->push(trans('sentence.edit') . ' ' . $advertisment->title, route('edit-advertisement', $advertisment));
});

Breadcrumbs::for('foreign-edit', function ($trail, $foreign) {
    $trail->parent('home');
    $trail->push(trans('offer.user-foreigns'), route('user-foreign-list'));
    $trail->push(trans('sentence.edit') . ' ' . $foreign->title, route('edit-foreign', $foreign));
});

Breadcrumbs::for('course-edit', function ($trail, $course) {
    $trail->parent('home');
    $trail->push(trans('sentence.user-courses'), route('user-course-list'));
    $trail->push(trans('sentence.edit') . ' ' . $course->title, route('edit-course', $course));
});

Breadcrumbs::for('edit-user', function ($trail, $user) {
    $trail->parent('home');
    $trail->push(trans('sentence.edit') . ' ' . $user->name, route('edit-user', $user));
});

Breadcrumbs::for('user-advertisements', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('offer.user-offers'), route('user-advertisement-list'));
});

Breadcrumbs::for('user-foreigns', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('offer.user-foreigns'), route('user-foreign-list'));
});

Breadcrumbs::for('average-salary', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('offer.average-salary'), route('average-salary'));
});

Breadcrumbs::for('user-advertisement-article', function ($trail, $advertisment) {
    $trail->parent('user-advertisements');
    $trail->push($advertisment->title, route('user-advertisement-show', [$advertisment, $advertisment->slug]));
});

Breadcrumbs::for('user-preferences', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.your-preferences'), route('user-prefered-locations'));
});

Breadcrumbs::for('contacts', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('email.contact-list'), route('user-contact'));
});

Breadcrumbs::for('rooms', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('email.contact-list'), route('user-rooms'));
});

Breadcrumbs::for('room', function ($trail, $room) {
    $trail->parent('rooms');
    $trail->push(trans('email.reply-form'), route('show-room', $room));
});

Breadcrumbs::for('reply', function ($trail) {
    $trail->parent('contacts');
    $trail->push(trans('email.reply-form'), route('user-reply'));
});

Breadcrumbs::for('categories', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.category-list'), route('categories.index'));
});

Breadcrumbs::for('categories.create', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.category-list'), route('categories.index'));
    $trail->push(trans('sentence.category-create'), route('categories.create'));
});

Breadcrumbs::for('categories.edit', function ($trail, $category) {
    $trail->parent('home');
    $trail->push(trans('sentence.category-list'), route('categories.index'));
    $trail->push(trans('sentence.edit') . $category->name, route('categories.edit', $category));
});

Breadcrumbs::for('jooblies', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('preview.list'), route('preview-list'));
});

Breadcrumbs::for('preview.edit', function ($trail, $preview) {
    $trail->parent('home');
    $trail->push(trans('preview.list'), route('preview-list'));
    $trail->push(trans('sentence.edit') . $preview->title, route('preview-edit', $preview));
});

Breadcrumbs::for('preview-article', function ($trail, $preview) {
    $trail->parent('home');
    $trail->push($preview->title, route('preview-show', $preview));
});

Breadcrumbs::for('mailinglist.create', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('email.mailinglist-list'), route('mailinglists.index'));
    $trail->push(trans('email.mailinglist-create'), route('mailinglists.create'));
});

Breadcrumbs::for('mailinglists', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('email.mailinglist-list'), route('mailinglists.index'));
});

Breadcrumbs::for('mailinglist.edit', function ($trail, $mailinglist) {
    $trail->parent('home');
    $trail->push(trans('email.mailinglist-list'), route('mailinglists.index'));
    $trail->push(trans('sentence.edit') . $mailinglist->title, route('mailinglists.edit', $mailinglist));
});

Breadcrumbs::for('recipient.create', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('email.recipients-list'), route('recipients.index'));
    $trail->push(trans('email.recipients-create'), route('recipients.create'));
});

Breadcrumbs::for('recipients', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('email.recipients-list'), route('recipients.index'));
});

Breadcrumbs::for('recipients.edit', function ($trail, $recipient) {
    $trail->parent('home');
    $trail->push(trans('email.recipients-list'), route('recipients.index'));
    $trail->push(trans('sentence.edit') . $recipient->email, route('recipients.edit', $recipient));
});

Breadcrumbs::for('newsletters', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('email.newsletters-list'), route('newsletters.index'));
});

Breadcrumbs::for('newsletter.create', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('email.newsletters-list'), route('newsletters.index'));
    $trail->push(trans('email.newsletters-create'), route('newsletters.create'));
});

Breadcrumbs::for('posts.create', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.posts-list'), route('posts.index'));
    $trail->push(trans('sentence.post-create'), route('posts.create'));
});

Breadcrumbs::for('posts', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.posts-list'), route('posts.index'));
});

Breadcrumbs::for('posts.edit', function ($trail, $post) {
    $trail->parent('home');
    $trail->push(trans('sentence.posts-list'), route('posts.index'));
    $trail->push(trans('sentence.edit') . $post->title, route('posts.edit', $post));
});

Breadcrumbs::for('posts.list', function ($trail) {
    $trail->parent('site.homepage');
    $trail->push(trans('sentence.posts-list'), route('blog.index'));
});

Breadcrumbs::for('blog-post', function ($trail, $post) {
    $trail->parent('site.homepage');
    $trail->push(trans('sentence.posts-list'), route('blog.index'));
    $trail->push($post->title, route('blog.show', $post));
});

Breadcrumbs::for('tag.list', function ($trail, $tag) {
    $trail->parent('home');
    $trail->push(trans('sentence.posts-list'), route('blog.index'));
    $trail->push($tag, route('postTag', $tag));
});

Breadcrumbs::for('pages.create', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.pages-list'), route('pages.index'));
    $trail->push(trans('sentence.pages-create'), route('pages.create'));
});

Breadcrumbs::for('pages.edit', function ($trail, $page) {
    $trail->parent('home');
    $trail->push(trans('sentence.pages-list'), route('pages.index'));
    $trail->push(trans('sentence.edit') . $page->title, route('pages.edit', $page));
});

Breadcrumbs::for('pages', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.pages-list'), route('pages.index'));
});

Breadcrumbs::for('users', function ($trail) {
    $trail->parent('home');
    $trail->push(trans('sentence.user-list'), route('users.list'));
});

Breadcrumbs::for('participants', function ($trail, $course) {
    $trail->parent('home');
    $trail->push(trans('sentence.courses'), route('user-course-list'));
    $trail->push(trans('sentence.participants') . ': ' . $course->title, route('user-course-participants', $course));
});

Breadcrumbs::for('site.page', function ($trail, $page) {
    $trail->parent('site.homepage');
    $trail->push($page->title, route('site.page', $page->slug));
});

Breadcrumbs::for('company-list', function ($trail) {
    $trail->parent('site.homepage');
    $trail->push(trans('company.company-list'), route('company-list'));
});

Breadcrumbs::for('company-site', function ($trail, $company) {
    $trail->parent('company-list');
    $trail->push(trans('company.company-offers') . ' ' . $company->profile->company_name, route('company-show', $company));
});