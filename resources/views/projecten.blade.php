<!DOCTYPE html>
<html lang="en">
	@include('layouts.header')
	@extends('layouts.top-links')
	<div id="page-wrapper">
		<div class="container-fluid">
			<!-- Page Heading -->
			@foreach (['danger', 'warning', 'success', 'info'] as $msg)
            			@if(Session::has('alert-' . $msg))
            			<div class="row">
            				<div class="col-lg-12">
            					<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            				</div>
            			</div>
            			@endif
            			@endforeach
			<div class="row">
				<div class="col-lg-12">
					<a href="../newproject" class="pull-left" style="margin-bottom: 25px;!important;">
					<button type="submit" class="btn btn-success">
					<i class="glyphicon glyphicon-plus"></i>
					Project toevoegen
					</button>
					</a>
					{{--breadcrumbs layout spot!--}}
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="table-responsive">
						<table class="table table-hover data_table">
							<thead>
								<th style="width: 10%">Aanmaak datum</th>
								<th style="width: 10%">Project</th>
								<th style="width: 10%">Live url</th>
								<th style="width: 10%">Development url</th>
								<th style="width: 10%">Klant</th>
								<th style="width: 40%">Omschrijving</th>
								<th style="width: 8%"></th>
							</thead>
							<tbody>
								@foreach($projects as $project)
								<tr style="cursor:pointer;!important;" data-href="/bugs/{{$project->id}}">
									<td>{{$project->created_at->format('d-m-Y')}}</td>
									<td>{{$project->projectnaam}}</td>
									<td>{{$project->liveurl}}</td>
									<td>{{$project->developmenturl}}</td>
									<td>{{ucfirst($project->user->bedrijf)}}</td>
									<td>{!! substr($project->omschrijvingproject,0,120) !!}@if(strlen($project->omschrijvingproject) > 120)...@endif</td>
									<td class="text-right" >
									    <a href="/feedbackmelden/{{$project->id}}">
                                        <button class="btn btn-success wijzigKnop2" name="zoekProject" type="button">
                                        <i class="fa fa-plus"></i>
                                        </button>
                                        </a>
										<a href="/projectwijzigen/{{$project->id}}">
										<button class="btn btn-warning wijzigKnop2" name="zoekProject" type="button" data-project="{{$project->projectnaam}}">
										<i class="fa fa-pencil"></i>
										</button>
										</a>
										<button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-modal-id="{{$project->id}}" data-target="#myModal{{$project->id}}">
										<i class="fa fa-trash"></i>
										</button>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->
	</div>
	@foreach($projects as $proj)
	<div class="modal fade" id="myModal{{$proj->id}}" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Verwijder verzoek</h4>
				</div>
				<div class="modal-body">
					<p>Weet u zeker dat u het project : <strong>{{$proj->projectnaam}}</strong> met alle gekoppelde data wilt verwijderen&hellip;</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Sluiten</button>
					<form method="POST" action="/verwijderProject/{{$proj->id}}" >
						{!! method_field('DELETE') !!}
						{!! csrf_field() !!}
						<button type="submit" class="btn btn-danger pull-right">
						Verwijder project
						</button>
					</form>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	@endforeach
	<!-- /#page-wrapper -->
	{{--@section('scripts')--}}
	{{--@endsection--}}
	</div>
	<!-- /#wrapper -->
	@section('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
		      $('.data_table').on("click",'tr[data-href]',  function() {
		         window.location.href = $(this).data('href');
		     });
		     $('.deleteButton').on("click", function(event) {
		
		         var modalId = $(this).data('modal-id');
		         event.stopPropagation();
		         jQuery.noConflict()
		         $('#myModal'+modalId).modal('show');
		     });
		})
		
	</script>
	@endsection
	@extends('layouts.footer')
	</body>
</html>
