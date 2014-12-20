<?php
namespace Maple\Usecase\Lead\Process;

class ValidEmail extends ProcessBase implements ProcessInterface {

	public function check()
	{
		if ( ! filter_var($this->object->email, FILTER_VALIDATE_EMAIL))
			throw new ExceptionLead('Email address is invalid'); 
	}

}
