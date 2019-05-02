<?php
	if(!Session()->has('manager_permission') || !Session()->has('login'))
	{
		redirect()->to('admin')->send();
	}

	if(Session()->get('manager_permission') !== 'admin' || Session()->get('login') !== true) 
	{
		redirect()->to('admin')->send();
	}
?>