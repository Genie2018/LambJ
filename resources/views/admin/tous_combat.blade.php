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
								  <th>Combat ID</th>
								  <th>Nom du lutteur1</th>
								  <th>Nom du lutteur2</th>
								  <th>Promoteur</th>
								  <th>Stade</th>
								  <th>Date du combat</th>
								  <th>Prix du découvert</th>
								  <th>Prix VIP</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  @foreach($tous_calendrier_info as $v_calendrier)   
						  <tbody>
							<tr>
								<td>{{$v_calendrier->calendrier_id}}</td>
								<td class="center">{{$v_calendrier->lutteur1}}</td>
								<td class="center">{{$v_calendrier->lutteur2}}</td>
								<td class="center">{{$v_calendrier->promoteur_id}}</td>
								<td class="center">{{$v_calendrier->stade}}</td>
								<td class="center">{{$v_calendrier->date_combat}}</td>
								<td class="center">{{$v_calendrier->prix_decouvert}}</td>
								<td class="center">{{$v_calendrier->prix_vip}}</td>
								
								<td class="center">
								@if($v_calendrier->publication_status==1)
									<span class="label label-success">Active</span>
								
								@else
									<span class="label label-danger">Inactive</span>
								@endif
								</td>
								<td class="center">
									@if($v_calendrier->publication_status==1)
									<a class="btn btn-danger" href="{{URL::to('/inactive-calendrier/'.$v_calendrier->calendrier_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-success" href="{{URL::to('/active-calendrier/'.$v_calendrier->calendrier_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif
									<a class="btn btn-info" href="{{URL::to('/edit-calendrier/'.$v_calendrier->calendrier_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-calendrier/'.$v_calendrier->calendrier_id)}}" id="delete">
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