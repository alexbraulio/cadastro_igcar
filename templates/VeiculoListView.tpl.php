<?php
	$this->assign('title','SISTEMA_IGCAR | Veiculos');
	$this->assign('nav','veiculos');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/veiculos.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> Veiculos
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="veiculoCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Placa">Placa<% if (page.orderBy == 'Placa') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Marca">Marca<% if (page.orderBy == 'Marca') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Modelo">Modelo<% if (page.orderBy == 'Modelo') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Doc">Doc<% if (page.orderBy == 'Doc') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('placa') || 'aaaa') %></td>
				<td><%= _.escape(item.get('marca') || '') %></td>
				<td><%= _.escape(item.get('modelo') || '') %></td>
				<td><%= _.escape(item.get('doc') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="veiculoModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="id" placeholder="Id" value="<%= _.escape(item.get('id') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="placaInputContainer" class="control-group">
					<label class="control-label" for="placa">Placa</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="placa" placeholder="Placa" value="<%= _.escape(item.get('placa') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="marcaInputContainer" class="control-group">
					<label class="control-label" for="marca">Marca</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="marca" placeholder="Marca" value="<%= _.escape(item.get('marca') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="modeloInputContainer" class="control-group">
					<label class="control-label" for="modelo">Modelo</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="modelo" placeholder="Modelo" value="<%= _.escape(item.get('modelo') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="docInputContainer" class="control-group">
					<label class="control-label" for="doc">Doc</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="doc" placeholder="Doc" value="<%= _.escape(item.get('doc') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteVeiculoButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteVeiculoButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Veiculo</button>
						<span id="confirmDeleteVeiculoContainer" class="hide">
							<button id="cancelDeleteVeiculoButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteVeiculoButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="veiculoDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Veiculo
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="veiculoModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveVeiculoButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="veiculoCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newVeiculoButton" class="btn btn-primary">Add Veiculo</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
