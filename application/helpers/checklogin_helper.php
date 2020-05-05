<?php

function login_true()
{
	$ini = get_instance();
	if (!$ini->session->userdata('akses')) {
		redirect('Auth');
	}
}

function login_false()
{
	$ini = get_instance();
	if ($ini->session->userdata('akses')) {
		redirect('Home');
	}	
}

function login_tu()
{
	$ini = get_instance();
	if ($ini->session->userdata('akses') != 'TU') {
		redirect('TU/Auth');
	}	
}

