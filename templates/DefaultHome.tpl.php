<?php
	$this->assign('title','SISTEMA_IGCAR | Home');
	$this->assign('nav','home');

	$this->display('_Header.tpl.php');
?>

	<div class="modal hide fade" id="getStartedDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
		</div>
	
	</div>

	<div class="container">

		<!-- Main hero unit for a primary marketing message or call to action -->
		<div class="hero-unit">
			<h1>SISTEMA | IGCAR <i class="icon-thumbs-up"></i></h1>
			<p>Sistema em desenvolvimento.</p>

			<p>Sistema em versão demo1.4.</p>			
		
			
			
			</div>

		
		</div>

	</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>