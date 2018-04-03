<?php
	// Start the session
	session_start();
?>

<?php include 'application.php'; ?>
<?php include 'header.php'; ?>

<body>

<div id="app">
  <div class="inner">	

    <div id="element--bigmap" class="element--primary">
  		<?php include 'bigmap.php'; ?>
  	</div>

    <div id="element--lilmap" class="element--primary">
  		<?php include 'lilmap.php'; ?>
  	</div>

    <div id="element--guidemap" class="element--primary">
  		<?php include 'guidemap.php'; ?>
  	</div>

    <div id="element--title" class="element--primary">
  		<?php include 'title.php'; ?>
  	</div>

  	<div id="element--nav" class="element--primary">
  		<?php include 'intro.php'; ?>
  	</div>

    <?php /* ?>
  	<div id="element--info" class="element--primary">
  		<?php include 'info.php'; ?>
  	</div>
    <?php */ ?>

  </div>
</div>

</body>

<?php include 'footer.php'; ?>
