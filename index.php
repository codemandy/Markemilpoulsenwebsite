<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<title>Mark Emil Poulsen</title>

	<meta name="description" content="graphic designer">

	<link rel="icon" type="image/gif" href="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"/>

	<link rel="stylesheet" type="text/css" href="docs/design.css">

	<script type="text/javascript" src="docs/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="docs/script.js"></script>
</head>
<body>

	<header>
		<h1>Mark Emil Poulsen</h1>
		<p class="aboutLink"><a href="about">notes</a></p>
	</header>

	<main>

		<?php require('docs/getProjectsContent.php'); ?>

		<?php foreach ($projects as $project): ?>

			<article class="project" id="<?php echo $project->id; ?>">

				<div class="images">
					<?php foreach ($project->images as $imageSrc): ?>
						<img data-src="<?php echo $imageSrc; ?>" style="max-height: <?php echo $project->height; ?>px">
					<?php endforeach; ?>
				</div>

				<p class="description"><?php echo $project->description; ?></p>

			</article>

		<?php endforeach; ?>

	</main>

</body>
</html>
