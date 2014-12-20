<?php
namespace Maple\Usecase\Lead;

use Maple\Entity;
use Maple\Repository;
use Maple\Usecase\Lead\Process;

class Process {

	protected $lead;
	protected $repo;

	public function __construct(
		$limit = NULL,
		Entity\Lead $lead,
		Repository\Lead $repo
	)
	{
		$this->limit = $limit;
		$this->lead = $lead;
		$this->repo = $repo;
	}

	public function set($limit)
	{
		$this->limit = $limit;
	}

	public function execute()
	{
		if ($limit !== NULL && ! is_numeric($limit))
			throw Exception('Invalid input value for limit');

		$processes = [
			new Process\ValidEmail,
//			new Process\BlacklistDomain,
//			new Process\BlacklistWord,
//			new Process\DuplicateCharacter(3),
//			new Process\LegalCharacters
		];

		$result = [ 'good' => [], 'bad' => [] ];
		$emails = $this->repo->find_all();
		var_dump($processes);
		die;
		foreach ($emails as $email)
		{
			try
			{
				foreach ($processes as $process)
				{
					$process->set($email)
						->check();
				}
				$result['good'][] = $email;
			}
			catch (ExceptionLead $e)
			{
				$result['bad'][] = $email;
			}
		}

		return $result;
	}

}
