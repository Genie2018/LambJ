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
					<a href="#">Programmer un combat</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Programmer un combat</h2>
						
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
						<form class="form-horizontal" action="{{url('/sauvegarder-calendrier')}}" method="post">
							{{ csrf_field() }}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">lutteur N°1</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="lutteur1" required="">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="date01">lutteur N°2</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="lutteur2" required="">
							  </div>
							</div>
					      
							<div class="control-group">
								<label class="control-label" for="selectError3">Promoteur</label>
								<div class="controls">
								  <select id="selectError3" name="promoteur_id">
								  	<option>selectionner le promoteur</option>
								  	<?php 
                                $toute_publication_promoteur=DB::table('table_promoteur')
                                        ->where('publication_status',1)
                                        ->get();
                            
                                       foreach($toute_publication_promoteur as $v_promoteur){?>  
							<option value="{{$v_promoteur->promoteur_id}}">{{$v_promoteur->promoteur_nom}}</option>
									<?php } ?>
								  </select>
								</div>
							  </div>

						<div class="control-group">	  	
							<label for="typedoc">Stade:</label> 
            <select name="stade" class="form-control" id="stade">
                <option value="Iba Mar Diop">Iba Mar Diop</option>
                <option value="Demba Diop">Demba Diop</option>
						</select>
						</div>	
							<div class="control-group">
							  <label class="control-label" for="date01">Date du Combat</label>
							  <div class="controls">
								<input type="date" class="input-xlarge" name="date_combat" required="">
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication status</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Valider le combat</button>
							  <button type="reset" class="btn">Annuler</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


@endsection