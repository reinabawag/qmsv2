<<<<<<< HEAD
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Reinhard Cire E. Abawag">
    <title>QMS Document Control Center v0.2b</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css') ?>">

    <link href="<?php echo base_url('assets/css/carousel.css') ?>" rel="stylesheet">
    <style>
      body {
        padding-top: 50px;
        padding-bottom: 20px;
      }

      .italic {
        font-style: italic;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">QMS</a>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="<?php echo @$active == 'home' ? 'active' : '' ?>"><a href="<?php echo site_url() ?>">Home<span class="sr-only">(current)</span></a></li>
            <li class="dropdown <?php echo @$active == 'division' ? 'active' : '' ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Division <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <?php 
              foreach ($divisions as $division) {
                echo "<li><a href='" . site_url("division/$division->divid") . "'>$division->div_name</a></li>";
              }
              ?>
              </ul>
            </li>
            <li class="dropdown <?php echo @$active == 'department' ? 'active' : '' ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Department <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <?php 
              foreach ($departments as $department) {
                echo "<li><a href='" . site_url("department/$department->deptid") . "'>$department->dept_name</a></li>";
              }
              ?>
              </ul>
            </li>
            <li class="dropdown <?php echo @$active == 'document' ? 'active' : '' ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Document Level <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php 
                $counter = 0;
                foreach ($documents as $document => $value) {
                  $counter++;
                  echo "<li><a href='#'><b>$value->level</b></a></li>";                  
                  foreach ($this->documentlevel->getByLevel($value->level) as $key => $value) {
                    echo "<li><a href='". site_url("documents/$value->documenttype"). "'>$value->documentdesc</a></li>";
                  }
                  if (count($documents) > $counter)
                    echo "<li role=\"separator\" class=\"divider\"></li>";
                }
                ?>
              </ul>
            </li>
            <?php if(@$active == 'home'): ?>
              <li><a href="#goto" data-toggle="modal" data-target=".bs-example-modal-lg">Search Documents <span class="glyphicon glyphicon-search"></span></a></li>
            <?php endif; ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if($this->session->has_userdata('userid')): ?>
              <li><a href="<?=site_url('admin')?>"><?=$this->session->fullname?></span> <span class="glyphicon glyphicon-user"></span></a></li>
            <?php else: ?>
              <li><a href="<?=site_url('login')?>">Login <span class="glyphicon glyphicon-user"></span></a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
=======
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Reinhard Cire E. Abawag">
    <title>QMS Document Control Center v0.2b</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css') ?>">

    <link href="<?php echo base_url('assets/css/carousel.css') ?>" rel="stylesheet">
    <style>
      body {
        padding-top: 50px;
        padding-bottom: 20px;
      }

      .italic {
        font-style: italic;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">QMS</a>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="<?php echo @$active == 'home' ? 'active' : '' ?>"><a href="<?php echo site_url() ?>">Home<span class="sr-only">(current)</span></a></li>
            <li class="dropdown <?php echo @$active == 'division' ? 'active' : '' ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Division <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <?php 
              foreach ($divisions as $division) {
                echo "<li><a href='" . site_url("division/$division->divid") . "'>$division->div_name</a></li>";
              }
              ?>
              </ul>
            </li>
            <li class="dropdown <?php echo @$active == 'department' ? 'active' : '' ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Department <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <?php 
              foreach ($departments as $department) {
                echo "<li><a href='" . site_url("department/$department->deptid") . "'>$department->dept_name</a></li>";
              }
              ?>
              </ul>
            </li>
            <li class="dropdown <?php echo @$active == 'document' ? 'active' : '' ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Document Level <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php 
                $counter = 0;
                foreach ($documents as $document => $value) {
                  $counter++;
                  echo "<li><a href='#'><b>$value->level</b></a></li>";                  
                  foreach ($this->documentlevel->getByLevel($value->level) as $key => $value) {
                    echo "<li><a href='". site_url("documents/$value->documenttype"). "'>$value->documentdesc</a></li>";
                  }
                  if (count($documents) > $counter)
                    echo "<li role=\"separator\" class=\"divider\"></li>";
                }
                ?>
              </ul>
            </li>
            <?php if(@$active == 'home'): ?>
              <li><a href="#goto" data-toggle="modal" data-target=".bs-example-modal-lg">Search Documents <span class="glyphicon glyphicon-search"></span></a></li>
            <?php endif; ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if($this->session->has_userdata('userid')): ?>
              <li><a href="<?=site_url('admin')?>"><?=$this->session->fullname?></span> <span class="glyphicon glyphicon-user"></span></a></li>
            <?php else: ?>
              <li><a href="<?=site_url('login')?>">Login <span class="glyphicon glyphicon-user"></span></a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
>>>>>>> 5bdee75a1b1e3b135bca891547a60b6454600854
    </nav>