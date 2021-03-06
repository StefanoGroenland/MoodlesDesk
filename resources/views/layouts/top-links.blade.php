@if (Auth::guest())
<body>
<style>
body{
    background-image:url('http://www.r2online.nl/wp-content/uploads/2013/11/258-De-Rotterdam-01.jpg');
    background-position: top center
}

</style>
   @else
   <style>
      .navbar-nav > li > a{
      padding-right:0px;!important;
      padding-bottom:0px;!important;
      padding-left:5px;!important;
      padding-top:10px;!important;
      }
      .str strong{
      font-size:20px;
      }

   </style>
   <body>
      <!-- Navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top" style="">
         <div class="container-fluid" style="margin-top:0px;!important;margin-left:10px;margin-right:25px;" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a href="/dashboard"><img src="http://helpdesk.moodles.nl/assets/images/logo.png" style="max-height: 50px;margin-left:-5px;" ></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav str">
                  <li><a href="#" style="padding-top:20px;!important;">
                     @if(\Request::route()->getName() == 'dashboard')
                     <strong style="color:white;" >Dashboard</strong> <small> Overzicht</small>
                     @elseif(\Request::route()->getName() == 'profiel')
                     <strong style="color:white;">Mijn profiel</strong> <small> profiel wijzigen</small>
                     @elseif(\Request::route()->getName() == 'projecten')
                     <strong style="color:white;">Projecten</strong> <small> een overzicht van alle projecten</small>
                     @elseif(\Request::route()->getName() == 'projectwijzigen')
                     <strong style="color:white;"> Project wijzigen</strong><small> hier kan een project gewijzigd worden</small>
                     @elseif(\Request::route()->getName() == 'newproject')
                     <strong style="color:white;">Project toevoegen</strong> <small> hier kan een project toegevoegd worden</small>
                     @elseif(\Request::route()->getName() == 'newmedewerker')
                     <strong style="color:white;">Medew. toevoegen</strong> <small> hier kan een medewerker toegevoegd worden</small>
                     @elseif(\Request::route()->getName() == 'newklant')
                     <strong style="color:white;">Klant toevoegen</strong> <small> hier kan een klant toegevoegd worden</small>
                     @elseif(\Request::route()->getName() == 'medewerkerwijzigen')
                     <strong style="color:white;">Medewerker wijzigen</strong> <small> hier kan een medewerker gewijzigd worden</small>
                     @elseif(\Request::route()->getName() == 'klantwijzigen')
                     <strong style="color:white;">Klant wijzigen</strong> <small> hier kan een klant gewijzigd worden</small>
                     @elseif(\Request::route()->getName() == 'klanten')
                     <strong style="color:white;">Klanten</strong> <small> een overzicht van alle klanten</small>
                     @elseif(\Request::route()->getName() == 'feedbackmelden')
                     <strong style="color:white;">Feedback melden</strong> <small> hier kunt u feedback geven</small>
                     @elseif(\Request::route()->getName() == 'bugs')
                     <strong style="color:white;">Feedback</strong> <small> een overzicht van alle feedback</small>
                     @elseif(\Request::route()->getName() == 'bugoverzicht')
                     <strong style="color:white;">Feedback</strong> <small> een overzicht van alle feedback</small>
                     @elseif(\Request::route()->getName() == 'bugchat')
                     <strong style="color:white;">Feedback discussie</strong> <small> discussie </small>
                     @elseif(\Request::route()->getName() == 'medewerkers')
                     <strong style="color:white;">Medewerkers</strong> <small> een overzicht van alle medewerkers</small>
                     @elseif(\Request::route()->getName() == 'fbchange')
                     <strong style="color:white;">Feedback wijzigen</strong> <small> hier kan feedback gewijzigd worden</small>
                     @elseif(\Request::route()->getName() == 'mailoverzicht')
                     <strong style="color:white;">Mail overzicht</strong> <small> alle meldingen via e-mail</small>
                     @elseif(\Request::route()->getName() == 'mailverwerken')
                     <strong style="color:white;">Mail verwerken</strong> <small> Meld feedback met e-mail melding</small>
                     @else
                     <strong style="color:white;">Dashboard</strong> <small> Overzicht</small>
                     @endif
                     <span class="sr-only"></span></a>
                  </li>
               </ul>
               <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm ">
                  <li style="padding:10px;" @if(\Request::route()->getName() == 'dashboard')class="active"@endif >
                     <a style="padding-top:5px;" href="{{URL::to('/dashboard')}}">
                     <i class="fa fa-building"></i> Dashboard
                     </a>
                  </li>
                  @if(Auth::user()->rol == 'medewerker')
                     <li style="padding:10px;" @if(\Request::route()->getName() == 'klanten')class="active"
                                     @elseif(\Request::route()->getName() == 'newklant')class="active"
                                     @elseif(\Request::route()->getName() == 'klantwijzigen')class="active"
                     @endif>
                     <a style="padding-top:5px;" href="{{URL::to('/klanten')}}">
                     <i class="fa fa-user"></i> Klanten
                     </a>
                  </li>
                    <li style="padding:10px;" @if(\Request::route()->getName() == 'projecten')class="active"
                                    @elseif(\Request::route()->getName() == 'newproject')class="active"
                                    @elseif(\Request::route()->getName() == 'projectwijzigen')class="active"
                    @endif>
                     <a style="padding-top:5px;" href="{{URL::to('/projecten')}}">
                     <i class="fa fa-briefcase"></i> Projecten
                     </a>
                  </li>
                  @endif
                    <li style="padding:10px;" @if(\Request::route()->getName() == 'bugoverzicht')class="active" @elseif(\Request::route()->getName() == 'bugs') class="active" @endif>
                     <a style="padding-top:5px;" href="{{URL::to('/bugoverzicht/'.Auth::user()->id)}}">
                    <i class="fa fa-bug"></i> Feedback overzicht
                     </a>
                  </li>
                  @if(Auth::user()->rol == 'medewerker')
                    <li style="padding:10px;" @if(\Request::route()->getName() == 'mailoverzicht')class="active"@endif>
                     <a style="padding-top:5px;" href="{{URL::to('/mails')}}">
                     <i class="fa fa-envelope-o"></i> Inbox
                     </a>
                  </li>
                  @endif
                  @if(Auth::user()->rol == 'medewerker')
                    <li style="padding:10px;" @if(\Request::route()->getName() == 'medewerkers')class="active"
                                    @elseif(\Request::route()->getName() == 'newmedewerker')class="active"
                                    @elseif(\Request::route()->getName() == 'medewerkerwijzigen')class="active"
                    @endif>
                     <a style="padding-top:5px;" href="{{URL::to('/medewerkers')}}">
                     <i class="fa fa-users"></i> Medewerkers
                     </a>
                  </li>
                  @endif
                  <li @if(\Request::route()->getName() == 'profiel')class="active dropdown"@else class="dropdown" @endif  >
                     <a style="padding-top:15px;!important;margin-left:50px;!important;padding-bottom: 15px;!important;" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                     <img class="img-responsive img-circle pull-left " alt="profile_img" src="
                     @if(Auth::user()->profielfoto)
                     {{'../'.Auth::user()->profielfoto}}
                     @else
                     {{"../assets/images/avatar.png"}}
                     @endif
                     " style="margin-right:3px; height: 26px;!important; width: 26px;!important;"/>
                     {{ucfirst(Auth::user()->voornaam) .' '. ucfirst(Auth::user()->achternaam)}}
                     <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                        <li>
                           <a href="{{URL::to('/profiel')}}"><i class="fa fa-fw fa-user"></i> Profiel</a>
                        </li>
                        <li>
                           <a href="{{URL::to('/logout')}}"><i class="fa fa-fw fa-power-off"></i> Uitloggen</a>
                        </li>
                     </ul>
                  </li>
               </ul>

               <ul class="nav navbar-nav navbar-left visible-xs visible-sm">
                    <li style="color:#9D9D9D;" @if(\Request::route()->getName() == 'profiel')class="active " @endif  >
                    Welkom,
                     <img class="img-responsive img-circle pull-left " alt="profile_img" src="
                     @if(Auth::user()->profielfoto)
                     {{'../'.Auth::user()->profielfoto}}
                     @else
                     {{"../assets/images/avatar.png"}}
                     @endif
                     " style="margin-right:3px; height: 26px;!important; width: 26px;!important;"/>
                     {{ucfirst(Auth::user()->voornaam) .' '. ucfirst(Auth::user()->achternaam)}}
                      </li>
                     <li @if(\Request::route()->getName() == 'dashboard')class="active"@endif >
                        <a href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-building"></i> Dashboard
                        </a>
                     </li>
                     @if(Auth::user()->rol == 'medewerker')
                        <li @if(\Request::route()->getName() == 'klanten')class="active"
                                        @elseif(\Request::route()->getName() == 'newklant')class="active"
                                        @elseif(\Request::route()->getName() == 'klantwijzigen')class="active"
                        @endif>
                        <a href="{{URL::to('/klanten')}}">
                        <i class="fa fa-user"></i> Klanten
                        </a>
                     </li>
                       <li @if(\Request::route()->getName() == 'projecten')class="active"
                                       @elseif(\Request::route()->getName() == 'newproject')class="active"
                                       @elseif(\Request::route()->getName() == 'projectwijzigen')class="active"
                       @endif>
                        <a href="{{URL::to('/projecten')}}">
                        <i class="fa fa-briefcase"></i> Projecten
                        </a>
                     </li>
                     @endif
                       <li  @if(\Request::route()->getName() == 'bugoverzicht')class="active" @elseif(\Request::route()->getName() == 'bugs') class="active" @endif>
                        <a href="{{URL::to('/bugoverzicht/'.Auth::user()->id)}}">
                       <i class="fa fa-bug"></i> Feedback overzicht
                        </a>
                     </li>
                     @if(Auth::user()->rol == 'medewerker')
                       <li @if(\Request::route()->getName() == 'mailoverzicht')class="active"@endif>
                        <a href="{{URL::to('/mails')}}">
                        <i class="fa fa-envelope-o"></i> Inbox
                        </a>
                     </li>
                     @endif
                     @if(Auth::user()->rol == 'medewerker')
                       <li @if(\Request::route()->getName() == 'medewerkers')class="active"
                                       @elseif(\Request::route()->getName() == 'newmedewerker')class="active"
                                       @elseif(\Request::route()->getName() == 'medewerkerwijzigen')class="active"
                       @endif>
                        <a href="{{URL::to('/medewerkers')}}">
                        <i class="fa fa-users"></i> Medewerkers
                        </a>
                     </li>
                     @endif
                     <li>
                        <a href="{{URL::to('/profiel')}}"><i class="fa fa-fw fa-user"></i> Profiel</a>
                     </li>
                     <li>
                        <a href="{{URL::to('/logout')}}"><i class="fa fa-fw fa-power-off"></i> Uitloggen</a>
                     </li>
               </ul>

            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container-fluid -->
      </nav>
      @endif