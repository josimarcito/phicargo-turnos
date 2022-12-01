<footer class="footer">
    <div class="container-fluid">
        <div class="row text-muted">
            <div class="col-6 text-start">
                <p class="mb-0">
                    <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> - <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>Bootstrap Admin Template</strong></a> &copy;
                </p>
            </div>
            <div class="col-6 text-end">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
                    </li>
                    <li class="list-inline-item">
                        <a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

</body>

</html>

<script src="../js/jquery-3.6.1.min.js"></script>
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