
<?php  
	include_once $_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/classes/Crud.php";
 ?>
<!DOCTYPE html>

<html>
<?php
   include "../partials/head.php";
 ?>
<body>
		  <div class=" row">
		    <form enctype="multipart/form-data" class="formItem col s12" method="POST" action="cadastroi.php" id="formCadItem" style="background-color: #000;">
		      <div class="row">
		      	
		      	<div class="input-field col s12">
		          <input id="nome" type="text" name="nome" class="validate">
		          <label for="nome">Nome do Item</label>
		        </div>

		        <div class="input-field col s12">
		    			<select name="categorias">
							<option disabled selected>Categoria</option>
									<?php
										$categorias = Crud::findAllCategoria();

										foreach ($categorias as $cat):
											
									?>
							<option value="<?php echo $cat->id ?>" ><?php echo $cat->nome?> </option>
									<?php
										endforeach;
									?>	
						</select>
		    			<label>Categoria</label>
  				</div>
                
                <div class="input-field col s12">
		          <input id="encontrou" type="text" name="nome_pessoa" class="validate">
		          <label for="encontrou">Quem encontrou?</label>
		        </div>
                
                <div class="input-field col s12">
		          <input id="local" type="text" name="local" class="validate">
		          <label for="local">Local encontrado?</label>
		        </div>

		        <div class="input-field col s12">
		          <input id="descricao" type="text" name="descricao" class="validate">
		          <label for="descricao">Descrição</label>
		        </div>

		      </div>
		        
			   <div class="row">
			   	<div class="file-field input-field ">
				      <div class="btn">
					        <span>Selecionar Imagem</span>
					        <input type="file" name="userfile" placeholder="imagem">
					  </div>
					  <div class="file-path-wrapper">
					        <input class="file-path validate" type="text" placeholder="Clique e selecione uma imagem do item"  name="imagemSelecionar">
				      </div>
				    </div>
			   </div>
		        
				     <button class="btn waves-effect waves-light" type="submit" name="action cadastro">
		   			<i class="material-icons right">add_box</i> Cadatrar Item 
		  			</button>
			</form>


	</div>	 
</body>
</html>