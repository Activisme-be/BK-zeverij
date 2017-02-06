<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="description" content="Het Belgisch Kampioenschap postjes pakken">
        <meta name="author" content="Activisme">

        <link rel="icon" href="{{ base_url('assets/favicon.ico') }}">

        <title>BK postjes pakken | {{ $title }} </title>

        {{-- General styles --}}
        <link href="{{ base_url('assets/css/master.css') }}" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        {{-- IE10 Viewport hack for Surface/desktop Windows 8 bug --}}
        <link href="{{ base_url('assets/css/ie10-viewport-bug-workaround.css') }}" rel="stylesheet">

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body id="application">

        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand font-heading" href="{{ base_url() }}">BK postjes pakken</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        @if ($this->user)
                            <li {{ (current_url() == base_url('ranking')) ? 'class="active"' : '' }}><a href="{{ base_url('ranking') }}"><i class="fa fa-bars" aria-hidden="true"></i> Het Klassement</a></li>
                            <li {{ (current_url() == base_url('participants')) ? 'class="active"' : '' }}><a href="{{ base_url('participants') }}"><i class="fa fa-users" aria-hidden="true"></i> Onze topsporters</a></li>
                        @endif

                            <li {{ (current_url() == base_url('news')) ? 'class="active"' : '' }}><a href="{{ base_url('news') }}"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Nieuws</a></li>
                            <li {{ (current_url() == base_url('disclaimer')) ? 'class="active"' : '' }}><a href="{{ base_url('disclaimer') }}"><i class="fa fa-info-circle" aria-hidden="true"></i> Disclaimer</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @if ($this->user)
                            {{-- Notifications --}}
                                <li @if ($this->notifications->allNotificationsCount($this->user['id']) > 0) class="dropdown dropdown-notifications" @endif>
                                    <a href="#" @if ($this->notifications->allNotificationsCount($this->user['id']) > 0) class="dropdown-toggle" data-toggle="dropdown" @endif>
                                        <span data-count="{{ $this->notifications->allNotificationsCount($this->user['id']) }}" class="glyphicon glyphicon-bell notification-icon"></span>
                                    </a>

                                    @if ($this->notifications->allNotificationsCount($this->user['id']) > 0)
                                        <div class="dropdown-container dropdown-menu-right">

                                            <div class="dropdown-toolbar">
                                                <h3 class="dropdown-toolbar-title">Notificaties ({{ $this->notifications->allNotificationsCount($this->user['id']) }})</h3>
                                            </div> {{-- /dropdown toolbar  --}}

                                            <ul class="dropdown-menu notifications">
                                                {{-- Max 3 panels --}}

                                                <li class="notification">
                                                    @foreach ($this->notifications->dataNavbar($this->user['id']) as $notification)
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <div class="media-object">
                                                                    <img src="{{ $notification->creator->avatar }}" class="img-circle notification-image" alt="{{ $notification->creator->name }}">
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <strong class="notification-title">
                                                                    <a href="{{ $notification->link }}">{{ $notification->creator->name }}</a>
                                                                    {{ $notification->message }}
                                                                </strong>
                                                                <p class="notification-desc">{{ $notification->sub_message }}</p>

                                                                <div class="notification-meta">
                                                                    <small class="timestamp">{{ $notification->created_at }}</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </li>
                                            </ul>

                                            <div class="dropdown-footer text-center">
                                                <a href="#">Bekijk alles</a>
                                            </div>{{-- /dropdown-footer --}}

                                        </div>
                                    @endif

                                </li>
                            {{-- /Notifications --}}

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    {{ $this->user['username'] }}
                                    <span class="caret"></span>
                                 </a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{ base_url('helpdesk') }}"><span class="fa fa-info-circle" aria-hidden="true"></span> Helpdesk</a></li>
                                    <li><a href="{{ base_url('account/settings') }}"><span class="fa fa-cog" aria-hidden="true"></span> Account instellingen</a></li>

                                    @if (in_array('admin', $this->user['roles']))
                                        <li role="seperator" class="divider"></li>
                                        <li><a href="{{ base_url('news/backend') }}"><span class="fa fa-file-text-o"></span> News Management</a></li>
                                        <li><a href="{{ base_url('items') }}"><span class="fa fa-cogs" aria-hidden="true"></span> Item management </a></li>
                                        <li><a href="{{ base_url('users') }}"><span class="fa fa-users" aria-hidden="true"></span> User Management </a></li>
                                    @endif

                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ base_url('auth/logout') }}"><span class="fa fa-sign-out" aria-hidden="true"></span> Uitloggen</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-sign-in" aria-hidden="true"></span> Inloggen</a>
                                <ul id="login-dp" class="dropdown-menu">
                                    <li>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form class="form" role="form" method="post" action="{{ base_url('auth/verify') }}" accept-charset="UTF-8" id="login-nav">
                                                    {{-- CSRF --}}
                                                    <input type="hidden" name="{{ $this->security->get_csrf_token_name() }}" value="{{ $this->security->get_csrf_hash() }}">


                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputEmail2">Email adres</label>
                                                        <input type="email" name="email" class="form-control" id="exampleInputEmail2" placeholder="Email adres">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="sr-only" for="exampleInputPassword2">Wachtwoord</label>
                                                        <input type="password" name="password" class="form-control" id="exampleInputPassword2" placeholder="Wachtwoord">
                                                        <div class="help-block text-right"><a data-toggle="modal" data-target="#resetPass" href="#">Wachtwoord vergeten?</a></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btn-block">Inloggen</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="bottom text-center">
                                                Geen account? <a href="{{ base_url('auth/register') }}"><b>Registreer</b></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>{{-- /.nav-collapse --}}
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 footerleft">
                        <div class="logofooter"> INFO</div>
                        <p>
                            Deze actie is gestart als onafhankelijk burger initiatief door Tom Manheaghe.
                            En is louter bedoeld als ludiek weerwoord omtrent de verwoordingen van onze politici,
                            op de sociale media en en de klassieke media.
                        </p>
                        <p><i class="fa fa-envelope"></i> E-mail: <a href="mailto:acties@activsme.be">Acties@activisme.be</a></p>

                    </div>
                    <div class="col-md-2 col-sm-6 paddingtop-bottom">
                        <h6 class="heading7">LINKS</h6>
                        <ul class="footer-ul">
                            <li><a href="{{ base_url('disclaimer') }}">Disclaimer</a></li>
                            <li><a href="{{ base_url('ranking') }}">Klassement</a></li>
                            <li><a href="{{ base_url('auth/register') }}">Registreren</a></li>
                            <li><a href="http://www.activisme.be">Activisme.be</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 paddingtop-bottom">
                        <h6 class="heading7">LAATSTE NIEUWS</h6>
                        <div class="post">
                            <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
                            <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
                            <p>facebook crack the movie advertisment code:what it means for you <span>August 3,2015</span></p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 paddingtop-bottom">
                        <h6 class="heading7">SOCIALE MEDIA</h6>
                        <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <div class="fb-xfbml-parse-ignore">
                                <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        {{-- footer start from here --}}

        <div class="copyright">
            <div class="container">
               <div class="row">
                   <div class="col-md-6">
                       <p>© {{ date('Y') }} - <a href="http://www.activisme.be">Activisme.be</a></p>
                   </div>
                   <div class="col-md-6">
                       <ul class="bottom_ul">
                           <li><a href="https://git.io/vDCXC"><span class="fa fa-github" aria-hidden="true"></span> GitHub</a></li>
                           <li class="divider"></li>
                           <li><a href="mailto:topairy@gmail.com"><span class="fa fa-envelope" aria-hidden="true"></span> Ontwikkelaar</a></li>
                           <li class="divider"></li>
                           <li><a href="{{ base_url('disclaimer') }}"><span class="fa fa-info-circle" aria-hidden="true"></span> Disclaimer</a></li>
                       </ul>
                   </div>
               </div>
            </div>
        </div>

        {{-- Modal Includes --}}
            @include('auth/reset')
        {{-- /Modal Includes --}}

        {{-- Core JavaScript --}}
        {{-- ============================================= --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.11.10/vue.min.js" async></script>
        <script src="{{ base_url('assets/js/bootstrap.js') }}" async></script>
        <script src="{{ base_url('assets/js/vue-functions.js') }}" async></script>
        <script src="{{ base_url('assets/js/crud.js') }}" async></script>

        {{-- IE10 viewport hack for Surface/desktop Windows 8 bug --}}
        <script src="{{ base_url('assets/js/ie10-viewport-bug-workaround.js') }}"></script>

    </body>
</html>
