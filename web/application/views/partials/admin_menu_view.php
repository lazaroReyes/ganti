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
                <li><a href="#"><i class="fa fa-user fa-fw"></i> <?= $this->session->userdata('username') ?></a>
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
                    <?=anchor('admin', '<i class="fa fa-dashboard fa-fw"></i> Dashboard') ?>
                </li>
                <li>
                    <?=anchor('compras', '<i class="fa fa-shopping-cart fa-fw"></i> Requisiciones') ?>
                </li>
                <li>
                    <?=anchor('maquinas', '<i class="fa fa-cogs fa-fw"></i> Maquinas') ?>
                </li>
                <li>
                    <?=anchor('minas', '<i class="fa fa-sitemap fa-fw"></i> Departamentos') ?>
                </li>
                <li>
                    <?=anchor('productos', '<i class="fa fa-cubes fa-fw"></i> Productos') ?>
                </li>
                <li>
                    <?=anchor('proveedores', '<i class="fa fa-truck fa-fw"></i> Proveedores') ?>
                </li>
                <li>
                    <?=anchor('tarjetas', '<i class="fa fa-credit-card fa-fw"></i> Tarjetas') ?>
                </li>
                <li>
                    <?=anchor('usos', '<i class="fa fa-exchange fa-fw"></i> Usos') ?>
                </li>
                <li>
                    <?=anchor('usuarios', '<i class="fa fa-users fa-fw"></i> Usuarios') ?>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>