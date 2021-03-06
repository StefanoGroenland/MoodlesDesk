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
	@if (count($errors))
	<ul class="list-unstyled">
		@foreach($errors->all() as $error)
		<li class="alert alert-danger"><i class="fa fa-exclamation"></i> {{ $error }}</li>
		@endforeach
	</ul>
	@endif
	<div class="row">
	<div class="col-lg-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Project gegevens <small>alle velden met * zijn verplicht</small></h3>
			</div>
			<div class="panel-body">
				<form method="POST" action="/addProject">
					{!! csrf_field() !!}
				    @if($errors->has('projectnaam'))
                        <div class="form-group has-error">
                    @else
                        <div class="form-group">
                    @endif
						<label for="sel4">Project gegevens</label>
						<input type="text" class="form-control" id="projectnaam" required="true" name="projectnaam" placeholder="Projectnaam *" value="{{old('projectnaam')}}">
					</div>

					@if($errors->has('liveurl'))
                        <div class="form-group has-error">
                    @else
                        <div class="form-group">
                    @endif
						<input data-toggle="tooltip" title="Live URL / Productie URL van ons is dit bijvoorbeeld helpdesk.moodles.nl" type="text" class="form-control" id="projecturl" required="true" name="liveurl" placeholder="Productie URL *" value="{{old('liveurl')}}">
					</div>
					<div class="form-group">
						<input data-toggle="tooltip" title="Development URL van ons is dit bijvoorbeeld dev.helpdesk.moodles.nl/admin Let op! : voeg de link toe naar het beheerpaneel" type="text" class="form-control" id="projecturl" name="developmenturl" placeholder="Development URL" value="{{old('developmenturl')}}">
					</div>
					@if($errors->has('gebruikersnaam'))
                        <div class="form-group has-error">
                    @else
                        <div class="form-group">
                    @endif
						<label for="sel4">Beheer account</label>
						<input data-toggle="tooltip" title="Met dit account moet toegang zijn op het beheerderspaneel van de website!" type="text" class="form-control" id="gebruikersnaam" name="gebruikersnaam" placeholder="Gebruikersnaam" value="{{old('gebruikersnaam')}}">
					</div>
					<div class="form-group">
						<input data-toggle="tooltip" title="Wachtwoord voor bovenstaand Beheer account." type="text" class="form-control" id="wachtwoord" name="wachtwoord" placeholder="Wachtwoord">
					</div>
					<div class="form-group">
					<label for="sel4">Omschrijving *</label>
						<textarea class="form-control" rows="13" id="omschrijvingproject" name="omschrijvingproject">{{old('omschrijvingproject')}}</textarea>
					</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
	<div class="panel panel-default">
	<div class="panel-heading">
	<h3 class="panel-title">Klant gegevens</h3>
	    </div>
	    <div class="panel-body">
	        <div class="form-group">
                 <label class="radio-inline">
                     <input type="radio" name="radkoppel" id="radkoppel" value="koppel_klant" checked> Koppel klant
                 </label>
                <label class="radio-inline">
                	     <input type="radio" name="radmaak" id="radmaak" value="maak_klant"> Nieuwe klant
                </label>
	        </div>
	        <div class="form-group" id="koppel">
	        <label for="gebruiker_id">Koppel klant</label>
	            <select class="form-control"  id="gebruiker_id" name="gebruiker_id" >
	            @foreach($klanten as $klant)
	                @if(old('gebruiker_id') == $klant->id)
	                <option value="{{$klant->id}}" selected>{{ $klant->bedrijf }}</option>
	                @else
	                <option value="{{$klant->id}}">{{ $klant->bedrijf }}</option>
	                @endif

	            @endforeach
	            </select>
	        </div>

	    <fieldset id="fieldset-klant" class="hide" disabled>
	    @if($errors->has('username'))
	        <div class="form-group has-error">
	    @else
	        <div class="form-group">
	    @endif
	    <label for="sel4">Nieuwe klant</label>
	        <input type="gebruikersnaam" class="form-control" id="username" required="true" name="username" placeholder="Gebruikersnaam *" value="{{old('username')}}">
	    </div>
	        @if($errors->has('password'))
	            <div class="form-group has-error">
	        @else
	            <div class="form-group">
	        @endif
	    <input type="password" class="form-control" id="password" required="true" name="password" placeholder="Wachtwoord *">
	    </div>
	        @if($errors->has('password'))
	            <div class="form-group has-error">
	        @else
	            <div class="form-group">
	        @endif
	        <input type="password" class="form-control" id="password_confirmation" required="true" name="password_confirmation" placeholder="Herhaal wachtwoord *">
	    </div>
	        @if($errors->has('email'))
	        <div class="form-group has-error">
	        @else
	        <div class="form-group">
	        @endif
	        <input type="email" class="form-control" id="email" required="true" name="email" placeholder="E-mail *" value="{{old('email')}}">
	    </div>
	        @if($errors->has('bedrijf'))
	        <div class="form-group has-error">
	        @else
	        <div class="form-group">
	        @endif
	        <input type="text" class="form-control" id="bedrijf"  name="bedrijf" placeholder="Bedrijf *" value="{{old('bedrijf')}}">
	    </div>
	    @if($errors->has('voornaam'))
            <div class="form-group has-error">
        @else
            <div class="form-group">
        @endif
	        <input type="text" class="form-control" id="voornaam" required="true" name="voornaam" placeholder="Voornaam *" value="{{old('voornaam')}}">
	    </div>
	    <div class="form-group">
	        <input type="text" class="form-control" id="tussenvoegsel"  name="tussenvoegsel" placeholder="Tussenvoegsel" value="{{old('tussenvoegsel')}}">
	    </div>
	    @if($errors->has('achternaam'))
            <div class="form-group has-error">
        @else
            <div class="form-group">
        @endif
	        <input type="text" class="form-control" id="achternaam" required="true" name="achternaam" placeholder="Achternaam *" value="{{old('achternaam')}}">
	    </div>
	    <div class="form-group">
	    <label class="radio-inline">
	        <input type="radio" name="radman" id="radman" checked> Man
	    </label>
	    <label class="radio-inline">
	        <input type="radio" name="radvrouw" id="radvrouw"> Vrouw
	    </label>
	    </div>
	    @if($errors->has('telefoonnummer'))
	        <div class="form-group has-error">
	    @else
	        <div class="form-group">
	    @endif
	        <input type="text" class="form-control" id="telefoonnummer" maxlength="10" required="true" name="telefoonnummer" placeholder="Telefoonnummer *" value="{{old('telefoonnummer')}}">
	        </div>
	    </fieldset>
	    <button type="submit" class="btn btn-success pull-right"><span class="fa fa-plus" aria-hidden="true"></span> Toevoegen</button>
	    </div>
	    </div>
	    </form>
	    </div>
	    </div>
	    </div>
	<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->
    <style>
        .hide{
            display:none;
        }

    </style>
	@section('scripts')
	<script type="text/javascript">
		$("#radkoppel").on("click",function(){
		   $('#fieldset-klant').prop('disabled',true)
		   $('#gebruiker_id').prop('disabled',false)
		   $('#fieldset-klant').addClass('hide');
		    $('#koppel').removeClass('hide')
		   $('#radmaak').prop('checked',false)
		});
		$("#radmaak").on("click",function(){
		   $('#fieldset-klant').prop('disabled',false)
		   $('#gebruiker_id').prop('disabled',true)
		   $('#koppel').addClass('hide')
		   $('#fieldset-klant').removeClass('hide');
		   $('#radkoppel').prop('checked',false)
		});
	</script>
	<script type="text/javascript">
		$("#radvrouw").on("click",function(){
		   $('#radman').prop('checked',false)
		});
		$("#radman").on("click",function(){
		   $('#radvrouw').prop('checked',false)
		});
	</script>
	@stop
	</div>
	<!-- /#wrapper -->
	@extends('layouts.footer')
	</body>
</html>