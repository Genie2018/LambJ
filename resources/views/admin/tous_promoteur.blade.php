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
								  <th>promoteur ID</th>
								  <th>promoteur Nom</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  @foreach($tous_promoteur_info as $v_promoteur)   
						  <tbody>
							<tr>
								<td>{{$v_promoteur->promoteur_id}}</td>
								<td class="center">{{$v_promoteur->promoteur_nom}}</td>
								
								<td class="center">
								@if($v_promoteur->publication_status==1)
									<span class="label label-success">Active</span>
								
								@else
									<span class="label label-danger">Inactive</span>
								@endif
								</td>
								<td class="center">
									@if($v_promoteur->publication_status==1)
									<a class="btn btn-danger" href="{{URL::to('/inactive-promoteur/'.$v_promoteur->promoteur_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-success" href="{{URL::to('/active-promoteur/'.$v_promoteur->promoteur_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif
									<a class="btn btn-info" href="{{URL::to('/edit-promoteur/'.$v_promoteur->promoteur_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-promoteur/'.$v_promoteur->promoteur_id)}}" id="delete">
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