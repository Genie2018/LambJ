@extends('admin_layout')
@section('admin_content')


			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Accueil</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Ajouter une ecurie</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Ajouter un lutteur</h2>
						
							<p class="alert-success">
								<?php
								
					$message=Session::get('message');
					if ($message) {
						echo $message;
						Session::put('message',null);
					}

					?>
							</p>
								
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="{{url('/sauvegarder-lutteur')}}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Nom du lutteur</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="lutteur_nom" required="">
							  </div>
							</div>

					       <div class="control-group">
								<label class="control-label" for="selectError3">lutteur ecurie</label>
								<div class="controls">
								  <select id="selectError3" name="ecurie_id">
								  	<option>selectionner une ecurie</option>
								  	<?php 
                                $toute_publication_ecurie=DB::table('table_ecurie')
                                        ->where('publication_status',1)
                                        ->get();
                            
                                       foreach($toute_publication_ecurie as $v_ecurie){?>  
							<option value="{{$v_ecurie->ecurie_id}}">{{$v_ecurie->ecurie_nom}}</option>
									<?php } ?>
								  </select>
								</div>
							  </div>

							  

							<div class="control-group">
							  <label class="control-label" for="date01">Combats</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="lutteur_combat" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Victoires</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="lutteur_victoire" required="">
							  </div>
							</div>
							
							<div class="control-group">
							  <label class="control-label" for="date01">Defaites</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="lutteur_defaite" required="">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">Nul</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="lutteur_nul" required="">
							  </div>
							</div>
								<div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" name="lutteur_image" type="file">
							  </div>
							</div> 

							
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication status</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Ajouter un lutteur</button>
							  <button type="reset" class="btn">Annuler</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


@endsection