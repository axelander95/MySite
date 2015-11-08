<!DOCTYPE html>
<html lang="es">
	<head>
	<title>Andrés León | Desarrollador</title>
		<?php 
			include_once 'header.php';
		?>
	</head>
	<body>
		<?php 
			include_once 'menu.php';
		?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-8 col-md-6 col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">MIS SERVICIOS</h3>
						</div>
						<div class="panel-body">
							<p class="lead">
								<em>""Desarrollo de software a tu medida, tus requerimientos son oportunidades para crecer.""</em>
							</p>
							<p>
								Todo en una variedad de múltiples plataformas:
								<ul>
									<li><span class="glyphicon glyphicon-globe"></span> Desarrollo web</li>
									<li><span class="glyphicon glyphicon-phone"></span> Desarrollo móvil</li>
									<li><span class="glyphicon glyphicon-blackboard"></span> Desarrollo para pc (aplicaciones desktop)</li>
									<li><span class="glyphicon glyphicon-briefcase"></span> Desarrollo y mantenimiento de servicios</li>
								</ul>
							</p>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">PLATAFORMAS DE DESARROLLO</h3>
						</div>
						<div class="panel-body">
							<div class="col-md-3 col-sm-2 col-lg-3">
								<a href="#" class="thumbnail">
									<img src="res/img/logos/wordpress.png" alt="wordpress"/>
								</a>
							</div>
							<div class="col-md-3 col-sm-2 col-lg-3">
								<a href="#" class="thumbnail">
									<img src="res/img/logos/java.png" alt="java"/>
								</a>
							</div>
							<div class="col-md-3 col-sm-2 col-lg-3">
								<a href="#" class="thumbnail">
									<img src="res/img/logos/php.png" alt="php"/>
								</a>
							</div>
							<div class="col-md-3 col-sm-2 col-lg-3">
								<a href="#" class="thumbnail">
									<img src="res/img/logos/net.png" alt=".net"/>
								</a>
							</div>
							<div class="col-md-3 col-sm-2 col-lg-3">
								<a href="#" class="thumbnail">
									<img src="res/img/logos/html5.png" alt="html5"/>
								</a>
							</div>
							<div class="col-md-3 col-sm-2 col-lg-3">
								<a href="#" class="thumbnail">
									<img src="res/img/logos/css.png" alt="css"/>
								</a>
							</div>
							<div class="col-md-3 col-sm-2 col-lg-3">
								<a href="#" class="thumbnail">
									<img src="res/img/logos/javascript.png" alt="javascript"/>
								</a>
							</div>
							<div class="col-md-3 col-sm-2 col-lg-3">
								<a href="#" class="thumbnail">
									<img src="res/img/logos/cpp.png" alt="c++"/>
								</a>
							</div>
							<div class="col-md-3 col-sm-2 col-lg-3">
								<a href="#" class="thumbnail">
									<img src="res/img/logos/mysql.png" alt="mysql"/>
								</a>
							</div>
							<div class="col-md-3 col-sm-2 col-lg-3">
								<a href="#" class="thumbnail">
									<img src="res/img/logos/sqlserver.png" alt="sqlserver"/>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">SUSCRÍBETE A MI BLOG</h3>
						</div>
						<div class="panel-body">
							<form role="form" method="post" action="src/suscripcion.php">
								<div class="form-group">
									<input type="email" placeholder="Correo electrónico" name="email" class="form-control"/>
								</div>
								<input type="submit" value="Suscribirme" class="btn btn-block btn-info"/>
							</form>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">CONTÁCTAME</h3>
						</div>
						<div class="panel-body">
							<form role="form" method="post" action="src/contact.php">
								<div class="form-group">
									<input type="text" placeholder="Nombre (Requerido)" name="name" class="form-control"/>
								</div>
								<div class="form-group">
									<input type="email" placeholder="Correo electrónico (Requerido)" name="email" class="form-control"/>
								</div>
								<div class="form-group">
									<input type="number" placeholder="Número de teléfono" name="phone" class="form-control"/>
								</div>
								<div class="form-group">
									<input type="text" placeholder="Asunto" name="subject" class="form-control"/>
								</div>
								<div class="form-group">
									<textarea placeholder="Mensaje (Requerido)" name="message" class="form-control" rows="5"></textarea>
								</div>
								<?php 
									$error = isset($_GET['error'])?$_GET['error']:null;
									$message = isset($_GET['message'])?$_GET['message']:null;
									if ($error != null && $message != null){
										$class = ($error == 'false')?'label-success':'label-danger';
										echo '<div class="form-group"><label class="label ' . $class . '">' .$message . '</label></div>';
									}
								?>
								<input type="submit" value="Enviar" class="btn btn-block btn-info"/>
								<input type="hidden" name="method" value="contact"/>
								<input type="hidden" name="document" value='<?php echo $_SERVER['PHP_SELF']; ?>'/>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			include_once 'footer.php';
			include_once 'scripts.php';
		?>
	</body>
</html>
