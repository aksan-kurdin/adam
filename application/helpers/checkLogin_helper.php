<?php

function checkIfLoginStillActive()
{
    $CI = &get_instance();
    $level = $CI->session->userdata('level');
    if (!empty($level)) {
        redirect('dashboard');
    }
}

function checkIfNotLoginYet()
{
    $CI = &get_instance();
    $level = $CI->session->userdata('level');
    if (empty($level)) {
        redirect('auth/login');
    }
}

function isLoggedIn()
{
    $CI = &get_instance();
    $level = $CI->session->userdata('username');
    return empty($username);
}
