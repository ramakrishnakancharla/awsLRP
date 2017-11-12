<!DOCTYPE html>
<html class="st-layout ls-top-navbar ls-bottom-footer show-sidebar sidebar-l2" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Vendor CSS BUNDLE
    Includes styling for all of the 3rd party libraries used with this module, such as Bootstrap, Font Awesome and others.
    TIP: Using bundles will improve performance by reducing the number of network requests the client needs to make when loading the page. -->
  <link href="{{ asset('css/vendor/all.css') }}" rel="stylesheet">

  <!-- Vendor CSS Standalone Libraries
        NOTE: Some of these may have been customized (for example, Bootstrap).
        See: src/less/themes/{theme_name}/vendor/ directory -->
  <!-- <link href="css/vendor/bootstrap.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/font-awesome.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/picto.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/material-design-iconic-font.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/datepicker3.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/jquery.minicolors.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/bootstrap-slider.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/railscasts.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/jquery-jvectormap.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/owl.carousel.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/slick.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/morris.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/ui.fancytree.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/daterangepicker-bs3.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/jquery.bootstrap-touchspin.css" rel="stylesheet"> -->
  <!-- <link href="css/vendor/select2.css" rel="stylesheet"> -->

  <!-- APP CSS BUNDLE [css/app/app.css]
INCLUDES:
    - The APP CSS CORE styling required by the "social-1" module, also available with main.css - see below;
    - The APP CSS STANDALONE modules required by the "social-1" module;
NOTE:
    - This bundle may NOT include ALL of the available APP CSS STANDALONE modules;
      It was optimised to load only what is actually used by the "social-1" module;
      Other APP CSS STANDALONE modules may be available in addition to what's included with this bundle.
      See src/less/themes/social-1/app.less
TIP:
    - Using bundles will improve performance by greatly reducing the number of network requests the client needs to make when loading the page. -->
  <link href="{{ asset('css/app/app.css') }}" rel="stylesheet">

  <!-- App CSS CORE
This variant is to be used when loading the separate styling modules -->
  <!-- <link href="css/app/main.css" rel="stylesheet"> -->

  <!-- App CSS Standalone Modules
    As a convenience, we provide the entire UI framework broke down in separate modules
    Some of the standalone modules may have not been used with the current theme/module
    but ALL modules are 100% compatible -->

  <!-- <link href="css/app/essentials.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/layout.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/sidebar.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/sidebar-skins.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/navbar.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/media.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/player.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/timeline.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/cover.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/chat.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/charts.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/maps.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-alerts.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-background.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-buttons.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-calendar.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-progress-bars.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/colors-text.css" rel="stylesheet" /> -->
  <!-- <link href="css/app/ui.css" rel="stylesheet" /> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!-- If you don't need support for Internet Explorer <= 8 you can safely remove these -->
  <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body>

  <!-- Wrapper required for sidebar transitions -->
  <div class="st-container">

    <!-- Fixed navbar -->
    <div class="navbar navbar-main navbar-default navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="#sidebar-menu" data-effect="st-effect-1" data-toggle="sidebar-menu" class="toggle pull-left visible-xs"><i class="fa fa-bars"></i></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#sidebar-chat" data-toggle="sidebar-menu" data-effect="st-effect-1" class="toggle pull-right visible-xs "><i class="fa fa-comments"></i></a>
          <a class="navbar-brand navbar-brand-primary hidden-xs" href="#">LRP</a>
        </div>
        <div class="collapse navbar-collapse" id="main-nav">
          <ul class="nav navbar-nav hidden-xs">
            <!-- messages -->
            <li class="dropdown notifications hidden-xs hidden-sm">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>

              </a>
              <ul class="dropdown-menu">
                <li class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object thumb" src="images/people/50/guy-2.jpg" alt="people">
                    </a>
                  </div>
                  <div class="media-body">
                    <div class="pull-right">
                      <span class="label label-default">5 min</span>
                    </div>
                    <h5 class="media-heading">Adrian D.</h5>

                    <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </div>
                </li>
                <li class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object thumb" src="images/people/50/woman-7.jpg" alt="people">
                    </a>
                  </div>

                  <div class="media-body">
                    <div class="pull-right">
                      <span class="label label-default">2 days</span>
                    </div>
                    <h5 class="media-heading">Jane B.</h5>
                    <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </div>
                </li>
                <li class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object thumb" src="images/people/50/guy-8.jpg" alt="people">
                    </a>
                  </div>

                  <div class="media-body">
                    <div class="pull-right">
                      <span class="label label-default">3 days</span>
                    </div>
                    <h5 class="media-heading">Andrew M.</h5>
                    <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                  </div>
                </li>
              </ul>
            </li>
            <!-- // END messages -->
          </ul>

          <ul class="nav navbar-nav navbar-user">
            <!-- User -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ asset('images/people/50/guy-5.jpg')}}" width="35" alt="{{Auth::user()->name}}"  class="img-circle" /> {{Auth::user()->name}} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Profile</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Change Password</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="{{ route('logout')}}">Logout</a></li>
              </ul>
            </li>
          </ul>

          <form class="navbar-form margin-none navbar-left hidden-xs ">
            <!-- Search -->
            <div class="search-1">
              <div class="input-group">
                <span class="input-group-addon"><i class="icon-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
              </div>
            </div>
          </form>

          <ul class="nav navbar-nav navbar-right hidden-xs">
            <li class="pull-right">
              <a href="#sidebar-chat" data-effect="st-effect-1" data-toggle="sidebar-menu">
                <i class="fa fa-comments"></i>
              </a>
            </li>
			<li class="pull-right">
              <a href="#">
                <i class="fa fa-bell" style="color:#26a69a !important;"></i>
              </a>
            </li>
			<li class="pull-right">
              <a href="#">
                <i class="fa fa-exclamation-triangle" style="color:red !important;"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
    <div class="sidebar left sidebar-size-2 sidebar-offset-0 sidebar-visible-desktop sidebar-visible-mobile sidebar-skin-dark" id="sidebar-menu" data-type="collapse">
      <div data-scrollable>
        <ul class="sidebar-menu">
		  <li class="hasSubmenu">
            <a href="#generic"><i class="icon-globe"></i> <span>Generic Info</span></a>
            <ul id="generic">
              <li><a href="{{URL::to('genericinfofamily') }}"><i class="fa fa-users"></i> <span>Family Members</span></a></li>
              <li><a href="{{URL::to('genericinfofriends')}}"><i class="fa fa-user-secret"></i> <span>Relatives & Friends</span></a></li>
            </ul>
          </li>
          <li class="hasSubmenu">
            <a href="#timeline"><i class="icon-ship-wheel"></i> <span>General Info</span></a>
            <ul id="timeline">
              <!--<li><a href="{{URL::to('general-personal-data') }}"><i class="fa fa-circle-o"></i> <span>Personal Data</span></a></li>-->
              <li><a href="{{URL::to('general-address') }}"><i class="fa fa-circle-o"></i> <span>Address</span></a></li>
              <li><a href="{{URL::to('general-communications') }}"><i class="fa fa-circle-o"></i> <span>Communications</span></a></li>
              <li><a href="{{URL::to('general-personalIds') }}"><i class="fa fa-circle-o"></i> <span>Personnel IDs</span></a></li>
              <li><a href="{{URL::to('general-memberships')}}"><i class="fa fa-circle-o"></i> <span>Memberships</span></a></li>
              <li><a href="{{URL::to('general-objectsonloan')}}"><i class="fa fa-circle-o"></i> <span>Objects on Loan</span></a></li>
              <li><a href="{{URL::to('general-travelinfo') }}"><i class="fa fa-circle-o"></i> <span>Travel Info</span></a></li>
              <li><a href="{{URL::to('general-personaldocuments')}}"><i class="fa fa-circle-o"></i> <span>Documents</span></a></li>
              <li><a href="{{URL::to('general-leisureactivites')}}"><i class="fa fa-circle-o"></i> <span>Leisure Activities</span></a></li>
              <li><a href="{{URL::to('general-photos')}}"><i class="fa fa-circle-o"></i> <span>Photos</span></a></li>
              <li><a href="{{URL::to('general-accesslogin')}}"><i class="fa fa-circle-o"></i> <span>Access/Login Details</span></a></li>
            </ul>
          </li>
         <!-- <li class=""><a href="#"><i class="icon-user-1"></i> <span>Profile</span></a></li>
          <li class=""><a href="#"><i class="fa fa-group"></i> <span>Users</span></a></li>
          <li class=""><a href="#"><i class="icon-comment-fill-1"></i> <span>Messages</span></a></li>
          <li><a href="#"><i class="icon-lock-fill"></i> <span>Login</span></a></li> -->
          <li class="hasSubmenu">
            <a href="#Finance"><i class="fa fa-money"></i> <span>Finance</span></a>
            <ul id="Finance">
              <li><a href="{{route('financebankdetails')}}"><i class="fa fa-circle-o"></i> <span>Bank Deatils</span></a></li>
			  <li><a href="{{route('financensurances')}}"><i class="fa fa-circle-o"></i> <span>Insurances</span></a></li>
			  <li><a href="{{route('financefixeddeposites')}}"><i class="fa fa-circle-o"></i> <span>Fixed Deposites</span></a></li>
			  <li><a href="{{route('financeassets')}}"><i class="fa fa-circle-o"></i> <span>Assets</span></a></li>
			  <li><a href="{{route('financefinancialdocuments')}}"><i class="fa fa-circle-o"></i> <span>Financial Documents</span></a></li>
			  <li><a href="{{route('financeloans')}}"><i class="fa fa-circle-o"></i> <span>Loans</span></a></li>
			  <li><a href="{{route('financerecurringdeposites')}}"><i class="fa fa-circle-o"></i> <span>Recurring Deposites</span></a></li>
			  <li><a href="{{route('financechitfunds')}}"><i class="fa fa-circle-o"></i> <span>Chit Funds</span></a></li>
			  <li><a href="{{route('financeequity')}}"><i class="fa fa-circle-o"></i> <span>Equity</span></a></li>
			  <li><a href="{{route('financemutualfund')}}"><i class="fa fa-circle-o"></i> <span>Mutual Fund</span></a></li>
			  <li><a href="{{route('financefutures')}}"><i class="fa fa-circle-o"></i> <span>Futures</span></a></li>
			  <li><a href="{{route('financeoptions')}}"><i class="fa fa-circle-o"></i> <span>Options</span></a></li>
            </ul>
          </li>
		  <li class="hasSubmenu">
            <a href="#Health"><i class="fa fa-medkit"></i> <span>Health</span></a>
            <ul id="Health">
              <li><a href="{{route('healthmedicalinfo')}}"><i class="fa fa-circle-o"></i> <span>Medical Information</span></a></li>
              <li><a href="{{route('healthallergies')}}"><i class="fa fa-circle-o"></i> <span>Allergies</span></a></li>
              <li><a href="{{route('healthfamilydoctor')}}"><i class="fa fa-circle-o"></i> <span>Family Doctor</span></a></li>
              <li><a href="{{route('healthsurgeries')}}"><i class="fa fa-circle-o"></i> <span>Surgeries</span></a></li>
              <li><a href="{{route('healthshorttermillness')}}"><i class="fa fa-circle-o"></i> <span>Short-Term Illness</span></a></li>
              <li><a href="{{route('healthlongtermillness')}}"><i class="fa fa-circle-o"></i> <span>Long-Term Illness</span></a></li>
              <li><a href="{{route('healthfitness')}}"><i class="fa fa-circle-o"></i> <span>Fitness</span></a></li>
            </ul>
          </li>
		  <li class="hasSubmenu">
            <a href="#CarrerLearing"><i class="fa fa-graduation-cap"></i> <span>Carrer & Learning</span></a>
            <ul id="CarrerLearing">
              <li><a href="{{route('careeracedamics')}}"><i class="fa fa-circle-o"></i> <span>Acedamics</span></a></li>
              <li><a href="{{route('careerprofessionaleducationskills')}}"><i class="fa fa-circle-o"></i> <span>Professional Education/Skills</span></a></li>
              <li><a href="{{route('careertrainings')}}"><i class="fa fa-circle-o"></i> <span>Trainings</span></a></li>
              <li><a href="{{route('careerworkexperience')}}"><i class="fa fa-circle-o"></i> <span>Work Experience</span></a></li>
              <li><a href="{{route('careerachievements')}}"><i class="fa fa-circle-o"></i> <span>Achievements</span></a></li>
            </ul>
          </li>
		  <li class="hasSubmenu">
            <a href="#DailyActivities"><i class="fa fa-bell"></i> <span>Tasks & Notifications</span></a>
            <ul id="DailyActivities">
              <li><a href="#"><i class="fa fa-circle-o"></i> <span>My Calendar</span></a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> <span>My Tasks</span></a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> <span>Today's Challenges</span></a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> <span>My Finance</span></a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> <span>My Learnings</span></a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> <span>My Diet</span></a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> <span>My Fitness</span></a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> <span>Reminders & Notifications</span></a></li>
            </ul>
          </li>
		  <li class="hasSubmenu">
            <a href="#MyApps"><i class="fa fa-bell"></i> <span>My Apps</span></a>
            <ul id="MyApps">
              <li><a href="#"><i class="fa fa-circle-o"></i> <span>Google Maps</span></a></li>
              <li><a href="#"><i class="fa fa-circle-o"></i> <span>Run Keeper</span></a></li>
            </ul>
          </li>
          <!-- Sample 2 Level Collapse -->
          <!--<li class="hasSubmenu">
            <a href="#submenu"><i class="fa fa-chevron-circle-down"></i> <span>Collapse</span></a>
            <ul id="submenu">
              <li class="hasSubmenu">
                <a href="#submenu-1"><i class="fa fa-circle-o"></i> Submenu</a>
                <ul id="submenu-1">
                  <li><a href="#">Regular Link</a></li>
                </ul>
              </li>
              <li><a href="#"><i class="fa fa-circle-o"></i> Regular Link</a></li>
            </ul>
          </li>-->
        </ul>
        <h4 class="category">Favorites</h4>
        <div class="sidebar-block">
          <ul>
            <li><a href="#" class="sidebar-link"><span class="fa fa-briefcase"></span> Work Related</a></li>
            <li><a href="#" class="sidebar-link"><span class="fa fa-flag-o"></span> Very Important</a></li>
            <li><a href="#" class="sidebar-link"><span class="fa fa-users"></span> Friends &amp; Family</a></li>
            <li><a href="#" class="sidebar-link"><span class="fa fa-globe"></span> Other</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->
    <div class="sidebar sidebar-chat right sidebar-size-2 sidebar-offset-0 chat-skin-white sidebar-visible-mobile" id="sidebar-chat">
      <div class="split-vertical">
        <div class="chat-search">
          <input type="text" class="form-control" placeholder="Search" />
        </div>

        <ul class="chat-filter nav nav-pills ">
          <li class="active"><a href="#" data-target="li">All</a></li>
          <li><a href="#" data-target=".online">Family</a></li>
          <li><a href="#" data-target=".offline">Friends</a></li>
        </ul>
        <div class="split-vertical-body">
          <div class="split-vertical-cell">
            <div data-scrollable>
              <ul class="chat-contacts">
                <li class="online" data-user-id="1">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <span class="status"></span>
                        <img src="images/people/110/guy-6.jpg" width="40" class="img-circle" />
                      </div>
                      <div class="media-body">

                        <div class="contact-name">Jonathan S.</div>
                        <small>"Free Today"</small>
                      </div>
                    </div>
                  </a>
                </li>

                <li class="online away" data-user-id="2">
                  <a href="#">

                    <div class="media">
                      <div class="pull-left">
                        <span class="status"></span>
                        <img src="images/people/110/woman-5.jpg" width="40" class="img-circle" />
                      </div>
                      <div class="media-body">
                        <div class="contact-name">Mary A.</div>
                        <small>"Feeling Groovy"</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="online" data-user-id="3">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left ">
                        <span class="status"></span>
                        <img src="images/people/110/guy-3.jpg" width="40" class="img-circle" />
                      </div>
                      <div class="media-body">
                        <div class="contact-name">Adrian D.</div>
                        <small>Busy</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="offline" data-user-id="4">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <img src="images/people/110/woman-6.jpg" width="40" class="img-circle" />
                      </div>
                      <div class="media-body">
                        <div class="contact-name">Michelle S.</div>
                        <small>Offline</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="offline" data-user-id="5">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <img src="images/people/110/woman-7.jpg" width="40" class="img-circle" />
                      </div>
                      <div class="media-body">
                        <div class="contact-name">Daniele A.</div>
                        <small>Offline</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="online" data-user-id="6">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <span class="status"></span>
                        <img src="images/people/110/guy-4.jpg" width="40" class="img-circle" />
                      </div>
                      <div class="media-body">
                        <div class="contact-name">Jake F.</div>
                        <small>Busy</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="online away" data-user-id="7">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <span class="status"></span>
                        <img src="images/people/110/woman-6.jpg" width="40" class="img-circle" />
                      </div>
                      <div class="media-body">
                        <div class="contact-name">Jane A.</div>
                        <small>"Custom Status"</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="offline" data-user-id="8">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <span class="status"></span>
                        <img src="images/people/110/woman-8.jpg" width="40" class="img-circle" />
                      </div>
                      <div class="media-body">
                        <div class="contact-name">Sabine J.</div>
                        <small>"Offline right now"</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="online away" data-user-id="9">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <span class="status"></span>
                        <img src="images/people/110/woman-9.jpg" width="40" class="img-circle" />
                      </div>
                      <div class="media-body">
                        <div class="contact-name">Danny B.</div>
                        <small>Be Right Back</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="online" data-user-id="10">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <span class="status"></span>
                        <img src="images/people/110/woman-8.jpg" width="40" class="img-circle" />
                      </div>
                      <div class="media-body">
                        <div class="contact-name">Elise J.</div>
                        <small>My Status</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="online" data-user-id="11">
                  <a href="#">
                    <div class="media">
                      <div class="pull-left">
                        <span class="status"></span>
                        <img src="images/people/110/guy-3.jpg" width="40" class="img-circle" />
                      </div>
                      <div class="media-body">
                        <div class="contact-name">John J.</div>
                        <small>My Status #1</small>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="chat-window-container"></div>

    <!-- sidebar effects OUTSIDE of st-pusher: -->
    <!-- st-effect-1, st-effect-2, st-effect-4, st-effect-5, st-effect-9, st-effect-10, st-effect-11, st-effect-12, st-effect-13 -->

    <!-- content push wrapper -->
    <div class="st-pusher" id="content">
      <!-- sidebar effects INSIDE of st-pusher: -->
      <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->
    @yield('content')

    </div>
    <!-- /st-pusher -->

    <!-- Footer -->
    <footer class="footer">
      <strong>LRP</strong> &copy; Copyright 2017
    </footer>
    <!-- // Footer -->

  </div>
  <!-- /st-container -->

  <!-- Inline Script for colors and config objects; used by various external scripts; -->
  <script>
    var colors = {
      "danger-color": "#e74c3c",
      "success-color": "#81b53e",
      "warning-color": "#f0ad4e",
      "inverse-color": "#2c3e50",
      "info-color": "#2d7cb5",
      "default-color": "#6e7882",
      "default-light-color": "#cfd9db",
      "purple-color": "#9D8AC7",
      "mustard-color": "#d4d171",
      "lightred-color": "#e15258",
      "body-bg": "#f6f6f6"
    };
    var config = {
      theme: "social-1",
      skins: {
        "default": {
          "primary-color": "#16ae9f"
        },
        "orange": {
          "primary-color": "#e74c3c"
        },
        "blue": {
          "primary-color": "#4687ce"
        },
        "purple": {
          "primary-color": "#af86b9"
        },
        "brown": {
          "primary-color": "#c3a961"
        }
      }
    };
  </script>

  <!-- Vendor Scripts Bundle
    Includes all of the 3rd party JavaScript libraries above.
    The bundle was generated using modern frontend development tools that are provided with the package
    To learn more about the development process, please refer to the documentation.
    Do not use it simultaneously with the separate bundles above. -->
<script src="{{ asset('js/vendor/all.js') }}"></script>
<script src="{{ asset('js/app/app.js') }}"></script>
</body>

</html>
