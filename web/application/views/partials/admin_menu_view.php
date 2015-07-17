<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html"><img class="img-responsive" src="<?=base_url()?>/public/img/logonav.jpg" alt="ganti logo"/></a>
    </div>
    <!-- /.navbar-header -->
    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown pull-right">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> <?= $this->session->userdata('perfil') ?></a>
                </li>
                <li><a href="#"><i class="fa fa-cog fa-fw"></i> Configurar</a>
                </li>
                <li class="divider"></li>
                <li><?=anchor('login/logout_ci', '<i class="fa fa-sign-out fa-fw"></i> Salir') ?>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="compras"><i class="fa fa-shopping-cart fa-fw"></i> Requisiciones</a>
                </li>
                <li>
                    <a href="maquinas"><i class="fa fa-cogs fa-fw"></i> Maquinas</a>
                </li>
                <li>
                    <a href="minas"><i class="fa fa-compass fa-fw"></i> Departamentos</a>
                </li>
                <li>
                    <a href="productos"><i class="fa fa-cubes fa-fw"></i> Productos</a>
                </li>
                <li>
                    <a href="proveedores"><i class="fa fa-truck fa-fw"></i> Proveedores</a>
                </li>
                <li>
                    <a href="tarjetas"><i class="fa fa-credit-card fa-fw"></i> Tarjetas</a>
                </li>
                <li>
                    <a href="usos"><i class="fa fa-exchange fa-fw"></i> Usos</a>
                </li>
                <li>
                    <a href="usuarios"><i class="fa fa-users fa-fw"></i> Usuarios</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>