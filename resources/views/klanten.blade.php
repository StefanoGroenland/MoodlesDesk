<!DOCTYPE html>
<html lang="en">
	@include('layouts.header')
	@extends('layouts.top-links')
	<div id="page-wrapper">

		<div class="container-fluid">
		@foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <div class="row">
                            	<div class="col-lg-12">
                            		<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                            	</div>
                            </div>
                        @endif
                    @endforeach
			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
					<a href="../newklant" class="pull-left" style="margin-bottom: 25px;!important;">
					<button type="submit" class="btn btn-success">
					<i class="fa fa-plus"></i>
					Klant toevoegen
					</button>
					</a>
				</div>
			</div>
			<!-- /.container-fluid -->
			<div class="row">
				<div class="col-lg-12">
					<div class="table-responsive">
						<table class="table table-hover data_table" >
							<thead>
								<th style="width: 10%">Bedrijf</th>
								<th style="width: 10%">Voornaam</th>
								<th style="width: 5%">Tussenvoegsel</th>
								<th style="width: 10%">Achternaam</th>
								<th style="width: 10%">Gebruikersnaam</th>
								<th style="width: 5%">Geslacht</th>
								<th style="width: 10%">E-mail</th>
								<th style="width: 10%">Telefoonnummer</th>
								<th style="width: 10%"></th>
							</thead>
							<tbody>
								@foreach($klanten as $klant)
								<tr style="cursor:pointer;!important;" data-href="/klantwijzigen/{{$klant->id}}" >
									<td>{{$klant->bedrijf}}</td>
									<td>{{ucfirst($klant->voornaam)}}</td>
									@if($klant->tussenvoegsel)
									<td>{{$klant->tussenvoegsel}}</td>
									@else
									<td></td>
									@endif
									<td>{{ucfirst($klant->achternaam)}}</td>
									<td>{{$klant->username}}</td>
									<td>{{$klant->geslacht}}</td>
									<td>{{$klant->email}}</td>
									<td>{{$klant->telefoonnummer}}</td>
									<td class="text-right">
										<a href="/klantwijzigen/{{$klant->id}}" class="">
										<button class="btn btn-warning wijzigKnop2" name="zoekProject" type="button" data-project="{{$klant->email}}">
										<i class="fa fa-pencil"></i>
										</button>
										</a>
										<button type="button" class="btn btn-danger deleteButton" data-toggle="modal" data-modal-id="{{$klant->id}}" data-target="#myModal{{$klant->id}}">
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
		@foreach($klanten as $key)
		<div class="modal fade" id="myModal{{$key->id}}" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Verwijder verzoek</h4>
					</div>
					<div class="modal-body">
						<p>Weet u zeker dat u <strong>{{$key->voornaam}}</strong> wilt verwijderen&hellip;</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Sluiten</button>
						<form method="POST" action="/verwijderGebruiker/{{$key->id}}" >
							{!! method_field('DELETE') !!}
							{!! csrf_field() !!}
							<button type="submit" class="btn btn-danger pull-right">
							Verwijder klant
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
		@section('scripts')
		<script type="text/javascript">
		var $j = jQuery.noConflict();
			$(document).ready(function() {
			      $('.data_table').on("click",'tr[data-href]',  function() {
			         window.location.href = $(this).data('href');
			     });
			$('.deleteButton').on("click", function(event) {
			
			         var modalId = $j(this).data('modal-id');
			         event.stopPropagation();
			         jQuery.noConflict()
			         $('#myModal'+modalId).modal('show');
			     });
			})
		</script>
		@endsection
	</div>
	<!-- /#wrapper -->
	@extends('layouts.footer')
	</body>
</html>