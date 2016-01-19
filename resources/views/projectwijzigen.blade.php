<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Moodles - Helpdesk</title>

    <link rel="shortcut icon" type="image/ico" href="../../favicon.ico" />
</head>

    @extends('layouts.top-links')
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Project wijzigen <small> hier kan een project gewijzigd worden </small>
                            @include('layouts.header-controls')
                        </h1>
                        {{--breadcrumbs layout spot!--}}
                            @if(Auth::user()->bedrijf != 'moodles')
                            <ol class="breadcrumb">
                                @include('layouts.breadcrumbs')
                            </ol>
                            @endif
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
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h3 class="panel-title">Wijzig project</h3>
                          </div>
                          <div class="panel-body">
                            <form method="POST" action="/updateProject/{{$project->id}}">
                              {!! csrf_field() !!}
                              <input type="hidden" name="_method" value="PUT">
                              <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                     <div class="form-group">
                                      <label for="projectnaam2">Projectnaam</label>
                                            <input type="text" class="form-control projectnaam2" required="true" id="projectnaam2" name="projectnaam" placeholder="Projectnaam" value="{{$project->projectnaam}}">
                                     </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="liveurl2">Live URL</label>
                                         <input type="text" class="form-control projecturl2" required="true" id="liveurl2" name="liveurl" placeholder="Live URL" value="{{$project->liveurl}}">
                                       </div>
                                    </div>
                              </div>
                              <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                         <div class="form-group">
                                          <label for="bedrijfsnaam">Development URL</label>
                                          <input type="text" class="form-control projecturl2" id="developmenturl2" name="developmenturl" placeholder="Development URL" value="{{$project->developmenturl}}">
                                         </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                    </div>
                              </div>
                              <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                     <div class="form-group">
                                         <label for="bedrijfsnaam">Beheer account</label>
                                         <input type="text" class="form-control gebruikersnaam2" required="true" id="gebruikersnaam2" name="gebruikersnaam" placeholder="Gebruikersnaam" value="{{$project->gebruikersnaam}}">
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                        <label for="bedrijfsnaam">Beheer wachtwoord</label>
                                          <input type="text" class="form-control wachtwoord2"  required="true"id="wachtwoord2" name="wachtwoord" placeholder="Wachtwoord" value="{{Crypt::decrypt($project->wachtwoord)}}">
                                        </div>
                                    </div>
                              </div>
                                <div class="form-group">
                                 <textarea class="form-control omschrijving2" rows="8" id="omschrijving2" name="omschrijvingproject" value="" >{{$project->omschrijvingproject}}</textarea>
                               </div>
                              <button type="submit" class="btn btn-default center-block"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Opslaan</button>
                            </div>
                           </div>
                        </form>
                         </div>
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