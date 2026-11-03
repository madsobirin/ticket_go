<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('the register page returns a successful response', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('the login page returns a successful response', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});
