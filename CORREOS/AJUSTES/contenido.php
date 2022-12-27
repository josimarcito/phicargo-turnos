<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Configuración</h1>

        <div class="row">
            <div class="col-md-3 col-xl-2">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ajustes</h5>
                    </div>

                    <div class="list-group list-group-flush" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#account" role="tab">
                            Cuenta remitente
                        </a>
                        <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#password" role="tab">
                            Programacion de envios
                        </a>

                    </div>
                </div>
            </div>

            <div class="col-md-9 col-xl-10">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">

                        <div class="card">
                            <div class="card-header">

                                <h5 class="card-title mb-0">Cuenta remitente</h5>
                            </div>
                            <div class="card-body">
                                <form id='CorreoInformacion'>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label class="form-label" for="inputUsername">Host</label>
                                                <input type="passwoord" class="form-control" id="inputUsername" placeholder="Ingresar host">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="inputUsername">Port</label>
                                                <input type="number" class="form-control" id="inputUsername" placeholder="Ingresar puerto">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="inputUsername">Nombre</label>
                                                <input type="text" class="form-control" id="inputUsername" placeholder="Ingresa nombre o razon de la empresa">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="inputUsername">Correo Electronico</label>
                                                <input type="email" class="form-control" id="inputUsername" placeholder="Ingresa el correo electronico remitente">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="inputUsername">Contraseña</label>
                                                <input type="passwoord" class="form-control" id="inputUsername" placeholder="Ingresar contraseña">
                                            </div>
                                        </div>
                                    </div>

                                    <button id='GuardarCambios' class="btn btn-primary">Guardar cambios</button>
                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="password" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Configuración de envio de correos</h5>

                                <form>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputPasswordNew2">Frecuencia en envios de correo</label>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Frecuencia</option>
                                            <option value="3000">30 minutos</option>
                                            <option value="1000">1 hora</option>
                                            <option value="2000">2 horas</option>
                                            <option value="3000">3 horas</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>