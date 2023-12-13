<?php

$projects = [];

$projectsFolder = 'projects';
$projectsFolders = array_diff(scandir($projectsFolder), array('..', '.', '.DS_Store'));

foreach ($projectsFolders as $projectFolder) {
	$project = new stdClass();
	$project->id = $projectFolder;
	$project->images = [];

	$contentFiles = array_diff(scandir($projectsFolder.'/'.$projectFolder), array('..', '.', '.DS_Store'));

	foreach ($contentFiles as $contentFile)
	{
		if (pathinfo($projectsFolder.'/'.$projectFolder.'/'.$contentFile, PATHINFO_EXTENSION) == 'html')
		{
			$project->description = file_get_contents($projectsFolder.'/'.$projectFolder.'/'.$contentFile);
			$project->height = pathinfo($projectsFolder.'/'.$projectFolder.'/'.$contentFile, PATHINFO_FILENAME);
		}
		else if (in_array(strtolower(pathinfo($projectsFolder.'/'.$projectFolder.'/'.$contentFile, PATHINFO_EXTENSION)), ['jpg','jpeg','png','gif']))
		{
			array_push($project->images, $projectsFolder.'/'.$projectFolder.'/'.$contentFile);
		}
	}
	
	array_push($projects, $project);
}

?>