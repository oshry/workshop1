<?php
namespace Maple\Usecase\Lead\Process;

class ProcessBase {

	protected $object;

	public function set($object)
	{
		$this->object = $object;
	}

}
