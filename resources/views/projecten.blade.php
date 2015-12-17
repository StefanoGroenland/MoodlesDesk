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
                            Projecten <small> een overzicht van alle projecten.</small>
                            @include('layouts.header-controls')
                        </h1>
                        {{--breadcrumbs layout spot!--}}
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

                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-hover data_table">
                                <thead>
                                <th>Project</th>
                                <th>URL</th>
                                <th>Klantnummer</th>
                                <th></th>
                                <th></th>
                                </thead>
                                <tbody>
                                    @foreach($projects as $project)
                                      <tr>
                                      <td>{{$project->projectnaam}}</td>
                                      <td>{{$project->projecturl}}</td>
                                      <td>{{$project->gebruiker_id}}</td>
                                      <td>
                                      <a href="/projectmuteren/{{$project->id}}" class="">
                                           <button class="btn btn-success btn-xs wijzigKnop2" name="zoekProject" type="button" data-project="{{$project->projectnaam}}">
                                                  <i class="glyphicon glyphicon-pencil"></i>
                                           </button>
                                      </a>
                                      </td>
                                        <td>
                                        <a href="/verwijderProject/{{$project->id}}" class="">
                                            <button type="submit" class="btn btn-danger btn-xs">
                                               <i class="glyphicon glyphicon-remove"></i>
                                            </button>
                                        </a>
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
        <!-- /#page-wrapper -->
            {{--@section('scripts')--}}
              {{--@stop--}}
    </div>
    <!-- /#wrapper -->

    @extends('layouts.footer')

</body>

</html>