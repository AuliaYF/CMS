<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-theme.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap.css') ?>">
</head>
<body>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="<?php echo site_url() ?>">Brand</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<?php display_children(0, 0, (isset($menu_mode) ? $menu_mode : 2)); ?>
						</div><!-- /.navbar-collapse -->
					</div><!-- /.container-fluid -->
				</nav>
			</div>
			<div class="row">
				<?php getBreadcrumbs((isset($breadActive) ? $breadActive : NULL)); ?>
			</div>
			<div class="row">
				<?php
				if(isset($main_view)){
					if(file_exists(APPPATH."views/".$main_view.".php")){
						$this->load->view($main_view);
					}else{
						echo "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad perspiciatis sint doloremque magni doloribus, atque voluptatibus, ducimus illo dolore modi amet incidunt vero provident, rerum libero a eaque recusandae consectetur!";
					}
				}else{
					echo "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad perspiciatis sint doloremque magni doloribus, atque voluptatibus, ducimus illo dolore modi amet incidunt vero provident, rerum libero a eaque recusandae consectetur!";
				}
				?>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/dataTables.bootstrap.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/general.js') ?>"></script>
	<?php
	if(isset($main_view)){
		echo "<script type=\"text/javascript\" src=\"".base_url('assets/js/view/'.explode("/", $main_view)[1].'.js')."\"></script>";
	}
	?>
</body>
</html>