 <!DOCTYPE html>
 <html lang="en">

 <head>

     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="">

     <title>Moodles - Helpdesk</title>

     @extends('layouts.top-links')

         <div id="page-wrapper">

             <div class="container-fluid">

          <!-- Page Heading -->
          <div class="row">
              <div class="col-lg-12">
                  <h1 class="page-header">
                      Klant aanpassen <small> hier kan een klant gewijzigd worden </small>
                      @include('layouts.header-controls')
                  </h1>
                  <ol class="breadcrumb">
                      @include(Auth::user()->bedrijf == 'moodles' ? 'layouts.adminbreadcrumbs' : 'layouts.breadcrumbs')
                  </ol>
              </div>
          </div>
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
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                  <div class="panel panel-info">
                                    <div class="panel-heading">
                                      <h3 class="panel-title">Verander klant</h3>
                                    </div>
                                    <div class="panel-body">
                                      <form method="POST" action="/updateKlant">
                                      {!! csrf_field() !!}
                                      <input type="hidden" name="_method" value="PUT">
                                        <div class="form-group">
                                          <label for="email">Email address</label>
                                          <input type="email" class="form-control" required="true" id="email2" name="email" placeholder="E-Mail" value="{{$klant->email}}">
                                          <input type="hidden" class="form-control id2" id="id2"  name="id" value="{{$klant->id}}">
                                        </div>
                                        <div class="form-group">
                                          <label for="gebruikersnaam">Gebruikersnaam</label>
                                          <input type="text" class="form-control" required="true" id="gebruikersnaam2" name="username" placeholder="Gebruikersnaam"  value="{{$klant->username}}">
                                        </div>
                                          <div class="form-group">
                                          <label for="voornaam">Voornaam</label>
                                          <input type="text" class="form-control" required="true" id="voornaam2" name="voornaam" placeholder="Voornaam"  value="{{$klant->voornaam}}">
                                        </div>
                                        <div class="form-group">
                                           <label for="tussenvoegsel">Tussenvoegsel</label>
                                           <input type="text" class="form-control" id="tussenvoegsel2" name="tussenvoegsel" placeholder="Tussenvoegsel"  value="{{$klant->tussenvoegsel}}">
                                         </div>
                                        <div class="form-group">
                                          <label for="achternaam">Achternaam</label>
                                          <input type="text" class="form-control" required="true" id="achternaam2" name="achternaam" placeholder="Achternaam"  value="{{$klant->achternaam}}">
                                        </div>
                                        <div class="form-group">
                                          <label for="achternaam">Bedrijf</label>
                                          <input type="text" class="form-control" required="true" id="bedrijf2" name="bedrijf" placeholder="Bedrijf"  value="{{$klant->bedrijf}}">
                                        </div>
                                        <div class="form-group">
                                          <label for="telefoonnummer">Telefoonnummer</label>
                                          <input type="text" class="form-control" required="true" id="telefoonnummer2" name="telefoonnummer" placeholder="Telefoonnummer" value="{{$klant->telefoonnummer}}">
                                        </div>
                                        <div class="form-group">
                                        <label for="geslacht">Geslacht</label>
                                          <select class="form-control" id="geslacht2" required="true" name="geslacht">
                                            <option value="{{$klant->geslacht}}">{{$klant->geslacht}}</option>
                                            <option value="man">Man</option>
                                            <option value="vrouw">Vrouw</option>
                                          </select>
                                        </div>
                                         <div class="row">
                                           <div class="col-lg-12"><button type="submit" name="veranderGebruiker" class="btn btn-info center-block"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Verander</button></div>
                                         </div>
                                      </form>
                                    </div>
                                  </div>
              </div>
              <div clas="col-lg-4"></div>
          </div>
      </div>
             <!-- /.container-fluid -->
         </div>
         <!-- /#page-wrapper -->

         {{--@section('scripts')--}}


         {{--@stop--}}

     </div>
     <!-- /#wrapper -->

     @extends('layouts.footer')

 </body>

 </html>