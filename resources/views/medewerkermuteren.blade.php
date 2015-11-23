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
                            Medewerker aanpassen <small>Verander medewekers</small>
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
                    <div class="col-lg-4">

                      <div class="panel panel-green">
                        <div class="panel-heading">
                          <h3 class="panel-title">Nieuwe medewerker </h3>

                        </div>
                        <div class="panel-body">
                          <form method="POST" action="/addMedewerker" >
                          {!! csrf_field() !!}
                            <div class="form-group">
                              <label for="email">Email address</label>
                              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                              <label for="gebruikersnaam">Gebruikersnaam</label>
                              <input type="text" class="form-control" id="gebruikersnaam" name="username" placeholder="Gebruikersnaam">
                            </div>
                            <div class="form-group">
                              <label for="wachtwoord">Wachtwoord</label>
                              <input type="password" class="form-control" id="wachtwoord" name="password" placeholder="Wachtwoord">
                            </div>
                              <div class="form-group">
                              <label for="voornaam">Voornaam</label>
                              <input type="text" class="form-control" id="voornaam" name="voornaam" placeholder="Voornaam">
                            </div>
                            <div class="form-group">
                              <label for="achternaam">Achternaam</label>
                              <input type="text" class="form-control" id="achternaam" name="achternaam" placeholder="Achternaam">
                            </div>
                            <div class="row">
                                  <div class="col-lg-12"><button type="submit" class="btn btn-success center-block"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Maak</button></div>
                              </div>
                          </form>
                        </div>
                      </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-warning">
                        <div class="panel-heading">
                          <h3 class="panel-title">Verander medewerker</h3>
                        </div>
                        <div class="panel-body">
                          <form>
                            <div class="form-group">
                              <div class="input-group">
                                <input type="email" class="form-control" placeholder="E-mail">
                                <span class="input-group-btn">
                                  <button class="btn btn-default" type="button">Zoek persoon</button>
                                </span>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="email">Email address</label>
                              <input type="email" class="form-control" id="email" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                              <label for="gebruikersnaam">Gebruikersnaam</label>
                              <input type="text" class="form-control" id="gebruikersnaam" placeholder="Gebruikersnaam">
                            </div>
                            <div class="form-group">
                              <label for="wachtwoord">Wachtwoord</label>
                              <input type="password" class="form-control" id="wachtwoord" placeholder="Wachtwoord">
                            </div>
                              <div class="form-group">
                              <label for="voornaam">Voornaam</label>
                              <input type="text" class="form-control" id="voornaam" placeholder="Voornaam">
                            </div>
                            <div class="form-group">
                              <label for="achternaam">Achternaam</label>
                              <input type="text" class="form-control" id="achternaam" placeholder="Achternaam">
                            </div>
                                    <div class="row">
                                  <div class="col-sm-4"><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Maak</button>
                                   </div>
                                  <div class="col-sm-4"><button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Verwijder</button>
                                   </div>
                                  <div class="col-sm-4"><button type="submit" class="btn btn-warning">Annuleer</button>
                                   </div>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <th>Naam</th>
                                <th>E-mail</th>
                                <th></th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
</div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    @extends('layouts.footer')

</body>

</html>
