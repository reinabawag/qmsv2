<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Reinhard Cire E. Abawag">
	<title>QMS Document Control Center Login</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
	<div class="container">
		<div class="row">
		    <div class="col-md-4 col-md-offset-4" style="margin-top: 20%">
		        <div class="panel panel-default">
		            <div class="panel-heading"><span class="glyphicon glyphicon-user"></span>&nbsp;Document Control Center Login</div>
		            <div class="panel-body">
		                <?php echo form_open(); ?>
		                    <div class="form-group">
		                        <label for="username">Username</label>
		                        <?=form_input('username', set_value('username'), ['class' => 'form-control', 'placeholder' => 'Username'])?>
		                    </div>
		                    <div class="form-group">
		                        <label for="password">Password</label>
		                        <?=form_password('password', set_value('password'), ['class' => 'form-control', 'placeholder' => 'Password'])?>
		                    </div>
		                    <?php echo $error ?>
		                    <input type="submit" class="btn btn-success btn-block" value="Login">
		                    <a href="<?=site_url('main')?>" class="btn btn-default btn-block">Back to main</a>
		                </form>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</body>
=======
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Reinhard Cire E. Abawag">
	<title>QMS Document Control Center Login</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
</head>
<body>
	<div class="container">
		<div class="row">
		    <div class="col-md-4 col-md-offset-4" style="margin-top: 20%">
		        <div class="panel panel-default">
		            <div class="panel-heading"><span class="glyphicon glyphicon-user"></span>&nbsp;Document Control Center Login</div>
		            <div class="panel-body">
		                <?php echo form_open(); ?>
		                    <div class="form-group">
		                        <label for="username">Username</label>
		                        <?=form_input('username', set_value('username'), ['class' => 'form-control', 'placeholder' => 'Username'])?>
		                    </div>
		                    <div class="form-group">
		                        <label for="password">Password</label>
		                        <?=form_password('password', set_value('password'), ['class' => 'form-control', 'placeholder' => 'Password'])?>
		                    </div>
		                    <?php echo $error ?>
		                    <input type="submit" class="btn btn-success btn-block" value="Login">
		                    <a href="<?=site_url('main')?>" class="btn btn-default btn-block">Back to main</a>
		                </form>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</body>
>>>>>>> 5bdee75a1b1e3b135bca891547a60b6454600854
</html>