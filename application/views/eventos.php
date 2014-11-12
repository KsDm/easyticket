			<div class="col-lg-10  espacoTopo conteudoPrincipal">
				<h3>
					Eventos
				</h3>
				<hr />
				<a id="modal-170030" href="#addEvento" role="button" class="btn btn-success" data-toggle="modal">Adicionar Evento</a>
				<br />
				<br />
				
				<div class="modal fade" id="addEvento" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
									×
								</button>
								<h4 class="modal-title" id="myModalLabel"> Novo Evento </h4>
							</div>
							<div class="modal-body modalEvento">
								<a id="btnAddCategoria" class="btn btn-success">Adicionar Nova Categoria</a>
								<a id="btnAddEvento" class="btn btn-success">Adicionar Novo Evento</a>
								<div id="addCategoria">
									<h3>
										Nova Categoria
									</h3>
									<form action="eventos/inserirCategorias" method="post" role="form">
										<input class="form-control" id="nomeCategoria" name="nomeCategoria" type="text" />
													<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">
												Cancelar
											</button>
											<input type="submit" class="btn btn-primary" value="Salvar" />
										</div>
									</form>
								</div>
								<hr />
								<form id="formEvento" action="eventos/cadastrarEvento" method="post" role="form">
									<div class="form-group">
										<label for="categoria">Categoria</label>
										<select id="fk_categoria" name="fk_categoria">

											<?php
											
											foreach ($result as $row) {
												echo '<option value="' . $row -> idcategoria . '">' . $row -> nomeCategoria . '</option>';
											}
											?>
									</div>
									</select>
									<br />
									<br />
									<div class="form-group">
										<label for="nomeEvento">Nome do Evento</label>
										<input class="form-control" id="nomeEvento" name="nomeEvento" type="text" />
									</div>
									<div class="form-group">
										<label for="data">Data</label>
										<input class="form-control" id="data" name="data" type="text" />
									</div>
									<div class="form-group">
										<label for="horario">Horario</label>
										<input class="form-control" id="horario" name="horario" type="text" />
									</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">
									Cancelar
								</button>
								<input type="submit" class="btn btn-primary" value="Salvar" />
							</div>
							</form>
						</div>

					</div>

				</div>
			</div>
					
		<table id="tblEventos" class="display" width="100%" cellspacing="0">
	        <thead>
	            <tr>
	                <th>Id</th>
	                <th>Nome do Evento</th>
	                <th>Data</th>
	                <th>Horario</th>
	                <th>Categoria</th>
	                <th>Ação</th>
	            </tr>
	        </thead>
	        <tbody>
	        </tbody>
	    </table>
	    
		<div class="modal fade" id="exlcuirEvento" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<form method="post" action="eventos/excluirEvento">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								Excluir Evento
							</h4>
						</div>
						<div class="modal-body">
							Tem certeza que deseja excluir o evento <span class="spanNomeEvento"></span>
						    <input type="hidden" name="idevento" class="spanIdEvento" />
						</div>
						<div class="modal-footer">
							 <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
							 <input type="submit" class="btn btn-primary" value="Excluir" />
						</div>
					</div>
					
				</div>
			</form>
		</div>
		
		<div class="modal fade" id="alterarEvento" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<form method="post" action="eventos/alterarEvento">
			<input type="hidden" name="idevento" class="iptIdEvento" />
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								Alterar Evento
							</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<label for="categoria">Categoria</label>
								<select id="fk_categoria" name="fk_categoria">
									<option class="iptIdCategoria"><span class="iptNomeCategoria"></span></option>
								</select>
							</div>
							<div class="form-group">
								<label for="nomeEvento">Nome do Evento</label>
								<input class="form-control" id="iptNomeEvento" name="nomeEvento" type="text"  />
							</div>
							<div class="form-group">
								<label for="data">Data</label>
								<input class="form-control" id="iptData" name="data" type="text" />
							</div>
							<div class="form-group">
								<label for="horario">Horario</label>
								<input class="form-control" id="iptHorario" name="horario" type="text"  />
							</div>
						</div>
						<div class="modal-footer">
							 <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button> 
							 <input type="submit" class="btn btn-primary" value="Salvar" />
						</div>
					</div>
					
				</div>
			</form>
		</div>
		
		
		</div>
		<script type="text/javascript" src="<?php echo base_url("utils/js/eventos.js") ?>"></script>
	</body>
</html>
