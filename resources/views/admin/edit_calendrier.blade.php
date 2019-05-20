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
					<a href="#">Modififer le combat</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Modifier le combat</h2>
						
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
						<form class="form-horizontal" action="{{url('/modifier-calendrier',$calendrier_info->calendrier_id)}}" method="post">
							{{ csrf_field() }}
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="date01">lutteur1</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="lutteur1" value="{{$calendrier_info->lutteur1}}">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">lutteur2</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="lutteur2" value="{{$calendrier_info->lutteur2}}">
							  </div>
							</div>
					      
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Promoteur</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="promoteur_id" value="{{$calendrier_info->promoteur_id}}">
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Stade</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="stade" value="{{$calendrier_info->stade}}">
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Date</label>
							  <div class="controls">
								<input type="date" class="input-xlarge" name="date_combat" value="{{$calendrier_info->date_combat}}">
							  </div>
							</div>
							
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Prix decouvert</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="prix_decouvert" value="{{$calendrier_info->prix_decouvert}}">
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Prix VIP</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="prix_vip" value="{{$calendrier_info->prix_vip}}">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Modifier la calendrier</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


@endsection