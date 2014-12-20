<?php
require 'vendor/autoload.php';

ini_set('auto_detect_line_endings', true);
$climate = new League\CLImate\CLImate;


$lead = new Maple\Entity\Lead;
$repo = new Maple\Repository\Lead;
$usecase = new Maple\Usecase\Lead\Process(
	NULL,
	$lead,
	$repo
);

$data = $usecase->execute();

$climate->table($data);
