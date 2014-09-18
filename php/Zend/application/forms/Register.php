<?php

class Application_Form_Register extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
		$name = new Zend_Form_Element_Text('name');
		$name->setLabel('Name')
			 ->setRequired(true);
		$name->setAttrib('placeholder','Name');	 
		
		$email = new Zend_Form_Element_Text('email');
		$email->setLabel('e-mail')
			 ->setRequired(true);
		$email->setAttrib('placeholder', 'e-mail'); 

		$username = new Zend_Form_Element_Text('username');
		$username->setLabel('Username')
			 	 ->setRequired(true);
		$username->setAttrib('placeholder', 'Username'); 
		
		$password = new Zend_Form_Element_Password('password');
		$password->setLabel('Password')
			 	 ->setRequired(true); 
			
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Submit Form');
		
		$this->addElements(array($name,$email,$username,$password,$submit));
		$this->setAttrib('action','save');
		$this->setAttrib('method','post');
			 
    }


}

