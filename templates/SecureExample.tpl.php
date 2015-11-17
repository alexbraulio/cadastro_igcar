<?php
	$this->assign('title','SISTEMA_IGCAR');
	$this->assign('nav','secureexample');

	$this->display('_Header.tpl.php');
	$aviso ="Acesso restrito, entre com seu usuário e senha.";
?>

<div class="container">

	<?php if ($this->feedback) { ?>
		<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<?php echo $aviso ?>
		</div>
	<?php } ?>
	
	<!-- #### this view/tempalate is used for multiple pages.  the controller sets the 'page' variable to display differnet content ####  -->
	
	<?php if ($this->page == 'login') { ?>
	
		<div class="hero-unit">
			<h1>SISTEMA IGCAR</h1>
			<H2>Bem vindo ao sistema igcar.</H2>
			<p>para ter acesso ao sistema por favor entre com seu usuário e senha.<p>
				<p>Veja o exemplo  ao lado.</p>
				<p> usuário: <strong>joão</strong> Senha: <strong>1234</strong>.</p>
			<p>
				<!--<a href="secureuser" class="btn btn-primary btn-large">Visit User Page</a>-->
				<a href="secureadmin" class="btn btn-primary btn-large">Entrar</a>
				<?php if (isset($this->currentUser)) { ?>
					<a href="logout" class="btn btn-primary btn-large">Sair</a>
				<?php } ?>
			</p>
		</div>
	
		<form class="well" method="post" action="login">
			<fieldset>
			<legend>Entre com suas credenciais.</legend>
				<div class="control-group">
				<input id="username" name="username" type="text" placeholder="Usuário..." />
				</div>
				<div class="control-group">
				<input id="password" name="password" type="password" placeholder="Senha..." />
				</div>
				<div class="control-group">
				<button type="submit" class="btn btn-primary">Entrar</button>
				</div>
			</fieldset>
		</form>
	
	<?php } else { ?>
	
		<div class="hero-unit">
			<h1>Bem vindo</h1>
			<h2>Você está logado no SISTEMA IGCAR.</h2>
			<p>Neste sistema pode adicionar dados, criar e modificar.  
			Você está logado como '<strong><?php $this->eprint($this->currentUser->Username); ?></strong>'</p>
			<p>
				<!--<a href="secureuser" class="btn btn-primary btn-large">Visit User Page</a>
				<a href="secureadmin" class="btn btn-primary btn-large">Entrar</a>-->
				<a href="logout" class="btn btn-primary btn-large">Sair</a>
			</p>
		</div>
	<?php } ?>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>