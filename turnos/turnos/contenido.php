<main class="content">
    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h1 class="h3 mb-3"><strong>Turnos </strong>Base: Veracruz</h1>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Cola">Mover un lugar</button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Cola">Cola</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_ingresar_turno" onclick="fecha_hora()">Ingresar a la cola</button>
                <a type="button" class="btn btn-success" href="../programacion_veracruz/index.php">Programar</a>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8 col-xxl-12">
                <div class="card flex-fill w-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0"></h5>
                    </div>
                    <div class="card-body py-0">
                        <div id="tabla"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

</body>

</html>