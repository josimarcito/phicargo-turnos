<footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-start">
                <p class="mb-0">
                    <a class="text-muted" href="" target="_blank"><strong>Transportes Belchez SA DE CV</strong></a> - <a class="text-muted" href="" target="_blank"><strong></strong></a> &copy;
                </p>
            </div>
            <div class="col-6 text-end">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-muted" href="" target="_blank"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="" target="_blank"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="" target="_blank"></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="" target="_blank"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Listo para irte?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="modal-body">Selecciona "Salir" si quieres finalizar tu sesion.</div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary" href="../login/salirsistema.php">Salir</button>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</body>

</html>
<script src="../js/jquery-3.6.1.min.js"></script>
<script src="../js/app.js"></script>

<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    function fecha_hora() {
        const myForm = document.querySelector('#FormIngresar'),
            localDt_now = _ => {
                let now = new Date()
                now.setMinutes(now.getMinutes() - now.getTimezoneOffset())
                now.setSeconds(now.getSeconds())
                now.setMilliseconds(0)
                return now
            }
        myForm.fecha.valueAsDate = localDt_now();
        myForm.hora.valueAsDate = localDt_now();
    }
</script>