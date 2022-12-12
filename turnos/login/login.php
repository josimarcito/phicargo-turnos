<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Bienvenido</h1>
							<p class="lead">
								Inicia sesión en tu cuenta para continuar
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="../img/usuario.png" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
									</div>
									<form id='InicioSesion'>
										<div class="mb-3">
											<label class="form-label">Usuario</label>
											<input class="form-control form-control-lg" type="text" name="usuario" placeholder="Ingresa tu nombre de usuario" />
										</div>
										<div class="mb-3">
											<label class="form-label">Contraseña</label>
											<input class="form-control form-control-lg" type="passwoord" name="passwoord" placeholder="Ingresa tu contraseña" />
											<small>
												<a href="index.html">¿Olvidaste tu contraseña?</a>
											</small>
										</div>
										<div>
											<label class="form-check">
												<input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
												<span class="form-check-label">
													Recordar
												</span>
											</label>
										</div>
										<div class="text-center mt-3">
											<a id="IniciarSesion" class="btn btn-lg btn-primary">Iniciar Sesión</a>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>
</body>

</html>