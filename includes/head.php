<?php
session_start();
if (!$_SESSION['logueado']) {
    header("Location: ../../turnos/login/index.php");
}
?>

<body data-theme="colored" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="../../TURNOS/turnos/index.php">
                    <img src="../../img/lp.png" width="235px" height="75px">
                </a>

                <div class="sidebar-user">
                    <div class="d-flex justify-content-center">
                        <div class="flex-shrink-0">
                            <img src="../../img/usuario.png" class="avatar img-fluid rounded me-1" alt="Charles Hall" />
                        </div>
                        <div class="flex-grow-1 ps-2">
                            <a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <?php echo $_SESSION['nombre'] ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-start">
                                <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1" data-feather="settings"></i> Settings &
                                    Privacy</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Log out</a>
                            </div>

                            <div class="sidebar-user-subtitle"><?php echo $_SESSION['userTipo'] ?></div>
                        </div>
                    </div>
                </div>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Turnos
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#multi2" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="list"></i> <span class="align-middle">Turnos</span>
                        </a>
                        <ul id="multi2" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="../../turnos/turnos/index.php"><i class="align-middle" data-feather="map-pin"></i>Veracruz</a>
                                <a class="sidebar-link" href="../../turnos/turnos/index.php"><i class="align-middle" data-feather="map-pin"></i>Manzanillo</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#multi3" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="user-x"></i> <span class="align-middle">Cola</span>
                        </a>
                        <ul id="multi3" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="../../turnos/turnos/index.php"><i class="align-middle" data-feather="user-x"></i>Veracruz</a>
                                <a class="sidebar-link" href="../../turnos/turnos/index.php"><i class="align-middle" data-feather="user-x"></i>Manzanillo</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-header">
                        Correos Automáticos
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#multiemail" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="mail"></i> <span class="align-middle">Correos</span>
                        </a>
                        <ul id="multiemail" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="../../correos/viajes/index.php"><i class="align-middle" data-feather="map-pin"></i>Viajes</a>
                                <a class="sidebar-link" href="../../correos/clientes/index.php"><i class="align-middle" data-feather="users"></i>Clientes</a>
                                <a class="sidebar-link" href="../../correos/ajustes/index.php"><i class="align-middle" data-feather="settings"></i>Configuración</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="../../turnos/ubicacion/index.php">
                            <i class="align-middle" data-feather="navigation"></i> <span class="align-middle">Ubicación</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Operadores
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="../../turnos/cuentas_operadores/index.php">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Cuentas de usuario App</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="../../turnos/usuario/index.php">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Conexión Odoo</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>