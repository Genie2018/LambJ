@extends('admin_layout')
@section('admin_content')

	<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>
				<p class="alert-success">
								<?php
								
					$message=Session::get('message');
					if ($message) {
						echo $message;
						Session::put('message',null);
					}

					?>
							</p>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>

							  <tr>
								  <th>Lutteur ID</th>
								  <th>Nom </th>
								  <th>Ecurie</th>
								  <th>Combat</th>
								  <th>Victoire</th>
								  <th>Defaite</th>
								  <th>Null</th>								  
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  @foreach($tous_lutteur_info as $v_lutteur)   
						  <tbody>
							<tr>
								<td>{{$v_lutteur->lutteur_id}}</td>
								<td class="center">{{$v_lutteur->lutteur_nom}}</td>
								<td class="center">{{$v_lutteur->ecurie_nom}}</td>
								<td class="center">{{$v_lutteur->lutteur_combat}}</td>
								<td class="center">{{$v_lutteur->lutteur_victoire}}</td>
								<td class="center">{{$v_lutteur->lutteur_defaite}}</td>
								<td class="center">{{$v_lutteur->lutteur_nul}}</td>
								
								<td class="center">
								@if($v_lutteur->publication_status==1)
									<span class="label label-success">Active</span>
								
								@else
									<span class="label label-danger">Inactive</span>
								@endif
								</td>
								<td class="center">
									@if($v_lutteur->publication_status==1)
									<a class="btn btn-danger" href="{{URL::to('/inactive-lutteur/'.$v_lutteur->lutteur_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-success" href="{{URL::to('/active-lutteur/'.$v_lutteur->lutteur_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif
									<a class="btn btn-info" href="{{URL::to('/edit-lutteur/'.$v_lutteur->lutteur_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-lutteur/'.$v_lutteur->lutteur_id)}}" id="delete">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							
						  </tbody>
						  @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->


@endsection