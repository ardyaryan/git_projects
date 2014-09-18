<?php

class TestController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
		echo "<br/><br/> this is from inside TestController/indexAction();";
    }
	public function contactAction()
    {
        // action body
		echo "<br/><br/> this is from inside TestController/contactAction();";
    }
	public function registerAction()
	{
		$form = new Application_Form_Register();
		$this->view->form = $form;
	}
	public function saveAction()
	{
		//save
		/*
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$username = $_POST['username'];
		
		*/
		echo "<br/><br/>this is saveAction Method<br/><br/>";
		//$this->getRequest()->getPost('name');
		//
		$register = new Application_Model_Register();
		$register->createUser(array(
			'name'=> ($this->getRequest()->getPost('name')),
			'email'=>($this->getRequest()->getPost('email')),
			'username'=>($this->getRequest()->getPost('username')),
			'password'=>($this->getRequest()->getPost('password')),		
		));
		
	}


}

