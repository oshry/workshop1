<?php
namespace Maple\Repository;

class FileRepository {

	protected $base_dir = 'data';
	protected $file = '';

	protected function get_path()
	{
		return $this->base_dir.DIRECTORY_SEPARATOR.$this->file;
	}

	public function find_all()
	{
		$text = file_get_contents($this->get_path());
		$text = str_replace("\n\r","\n", $text);
		return array_filter(explode("\n", $text));
	}

	public function find() {}
	public function create() {}
	public function update() {}
	public function delete() {}

}
