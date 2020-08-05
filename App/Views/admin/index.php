<?php require APPROOT . '/Views/users/inc/header.php'; ?>
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo URLROOT ?>/admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Crypto Matrix</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="nav-item">
        <a class="nav-link text-danger" href="<?php echo URLROOT ?>/admin/logout.php">
          <i class="fa fa-sign-out"></i>
          Logout
        </a>
      </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <?php require APPROOT . '/Views/admin/inc/nav.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>$0</h3>

              <p>CAPITAL</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>$0</h3>

              <p>ACCOUNT BALANCE</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>$0</h3>

              <p>PENDING DEPOSIT</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>$0</h3>
              <p>PENDING WITHDRAWAL </p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Start Deposit -->
      <section style="margin-bottom: 20px">
        <div class="row">
          <div class="col-lg-6 col-xs-6 my-3">
            <button class="btn btn-success btn-lg btn-block">Withdraw</button>
          </div>
          <div class="col-lg-6 col-xs-6">
            <button class="btn btn-primary btn-lg btn-block">Deposit</button>
          </div>
        </div>
      </section>
      <!-- End Deposit -->
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          kdsjbjsnkvndkvfndfjkn
        </div>
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require APPROOT . '/Views/users/inc/footerdown.php'; ?>
</div>
<!-- ./wrapper -->
<?php require APPROOT . '/Views/users/inc/footer.php'; ?>