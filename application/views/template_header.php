<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema para reserva de Sala</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <?php echo link_tag('front/bootstrap/css/bootstrap.min.css'); ?>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <?php echo link_tag('front/plugins/daterangepicker/daterangepicker.css'); ?>
  <!-- bootstrap datepicker -->
  <?php echo link_tag('front/plugins/datepicker/datepicker3.css'); ?>
  <!-- iCheck for checkboxes and radio inputs -->
  <?php echo link_tag('front/plugins/iCheck/all.css'); ?>
  <!-- Bootstrap Color Picker -->
  <?php echo link_tag('front/plugins/colorpicker/bootstrap-colorpicker.min.css'); ?>
  <!-- Bootstrap time Picker -->
  <?php echo link_tag('front/plugins/timepicker/bootstrap-timepicker.min.css'); ?>
  <!-- Select2 -->
  <?php echo link_tag('front/plugins/select2/select2.min.css'); ?>
  <!-- Theme style -->
  <?php echo link_tag('front/dist/css/AdminLTE.min.css'); ?>
  <!-- AdminLTE Skins. Choose a skin from the css/skins     folder instead of downloading all of them to reduce the load. -->
  <?php echo link_tag('front/dist/css/skins/_all-skins.min.css'); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="<?php echo site_url('painel'); ?>" class="logo">
      <span class="logo-mini"><b>Reserva de Sala</b></span>
      <span class="logo-lg"><b>Reserva de Sala</span>
    </a>

    <nav class="navbar navbar-static-top">
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">

      <ul class="sidebar-menu">
        <li class="header">MENUS DE NAVEGAÇÃO</li>
        <li>
          <a href="<?php echo site_url('painel'); ?>">
            <i class="fa fa-th"></i> <span>Painel</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('sala'); ?>">
            <i class="fa fa-th"></i> <span>Sala</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('usuario'); ?>">
            <i class="fa fa-th"></i> <span>Usuário</span>
          </a>
        </li>
        <?php if($this->session->userdata('logado')): ?>
                <li>
                  <a href="<?php echo site_url('login/deslogar'); ?>">
                    <i class="fa fa-th"></i> <span>Desconectar</span>
                  </a>
                </li>
        <?php else: ?>
                <li>
                  <a href="<?php echo site_url('login'); ?>">
                    <i class="fa fa-th"></i> <span>Efetuar Login</span>
                  </a>
                </li>
        <?php endif; ?>
      </ul>
    </section>

  </aside>
