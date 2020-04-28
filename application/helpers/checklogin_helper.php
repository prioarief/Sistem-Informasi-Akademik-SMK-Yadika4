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

// function login_admin()
// {
// 	$ini = get_instance();
// 	if (!$ini->session->userdata('id_petugas')) {
// 		redirect('Home');
// 	}
// }

// function hakAkses()
// {
// 	$ini = get_instance();
// 	if ($ini->session->userdata('id_petugas')) {
// 		redirect('Admin');
// 	}
// }
