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



</head>

<body>

    <!--<div id="wrapper">-->
        <div id="page-wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

                <a class="navbar-brand" href="index.html">Moodles Helpdesk</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profiel.html"><i class="fa fa-fw fa-user"></i> Profiel</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<!--            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        <a href="klantMuteren.html"><i class="fa fa-fw fa-users"></i> Klant muteren</a>
                    </li>
                </ul>
            </div>-->
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h4 class="text-right">Welkom, GEBRUIKERSNAAM</h4>

                        <h1 class="page-header">
                            Dashboard <small>Overzicht</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>

                    </div>
                </div>
                <div class="row">
                <div class="col-lg-2">
                <img class="img-responsive" src="{{URL::asset('../assets/images/logo.png')}}" alt="...">
                <a href="#">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-12 text-center">
                                                        <i class="fa fa-plus fa-3x"></i>
                                                    </div>
                                                    </div>
                                                <div class="row">
                                                    <div class="col-xs-12 text-center">
                                                        <h5>Bug melden</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                </div>
                <div class="col-lg-10">
                <h4 class="page-header">
                Mijn projecten
                </h4>
                </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-12 text-right">
                                        <span class="label label-success">Threadstone</span>
                                        <div><span class="badge">4</span> Openstaand</div>
                                        <div><span class="badge">2</span> Bezig</div>
                                    </div>
                                </div>
                            </div>
                            <a href="projectBugs.html">
                                <div class="panel-footer">
                                    <span class="pull-left">Bekijk</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                                            <div class="panel panel-yellow">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-12 text-right">
                                                            <span class="label label-warning">Project X</span>
                                                            <div><span class="badge">0</span> Openstaand</div>
                                                            <div><span class="badge">4</span> Bezig</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="projectBugs.html">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">Bekijk</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-6">
                                            <div class="panel panel-red">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-12 text-right">
                                                            <span class="label label-danger">Project Y</span>
                                                            <div><span class="badge">4</span> Openstaand</div>
                                                            <div><span class="badge">4</span> Bezig</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="projectBugs.html">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">Bekijk</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <div class="col-lg-2 col-md-6">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-12 text-right">
                                                            <span class="label label-info">Project Z</span>
                                                            <div><span class="badge">4</span> Openstaand</div>
                                                            <div><span class="badge">4</span> Bezig</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="projectBugs.html">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">Bekijk</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-6">
                                            <div class="panel panel-purple">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-12 text-right">
                                                            <span class="label label-purple">Project Z</span>
                                                            <div><span class="badge">4</span> Openstaand</div>
                                                            <div><span class="badge">4</span> Bezig</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="projectBugs.html">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">Bekijk</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                               </div>
                         </div>
                         </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Laatst gemelde bugs</h4>
                        <div class="table-responsive">
                        <table class="table table-hover">
                                <thead>
                                <th>Datum</th>
                                <th>Tijd</th>
                                <th>Project</th>
                                <th>Prioriteit</th>
                                <th>Klantnummer</th>
                                <th>Bedrijfsnaam</th>
                                <th></th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>15-10-2015</td>
                                        <td>14:13</td>
                                        <td>Threadstone</td>
                                        <td><span class="label label-danger">Hoog</span></td>
                                        <td>#21341</td>
                                        <td>Google</td>
                                        <td>
                                            <a href="bekijkenBug.html">
                                        <button type="submit" class="btn btn-success btn-xs">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div>
                </div>




            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<!--</div>-->

    <!-- /#wrapper -->

    @extends('layouts.footer')

</body>

</html>
