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

        <nav class="navbar navbar-default navbar-fixed-top">
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
                        <li {{ (current_url() == base_url('disclaimer')) ? 'class="active"' : '' }}><a href="{{ base_url('disclaimer') }}"><i class="fa fa-file-text-o" aria-hidden="true"></i> Disclaimer</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @if ($this->user)
                            {{-- Notifications --}}
                                <li class="dropdown dropdown-notifications">
                                    <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                                        <span data-count="2" class="glyphicon glyphicon-bell notification-icon"></span>
                                    </a>

                                    <div class="dropdown-container dropdown-menu-right">

                                        <div class="dropdown-toolbar">
                                            <h3 class="dropdown-toolbar-title">Notificaties (2)</h3>
                                        </div> {{-- /dropdown toolbar  --}}

                                        <ul class="dropdown-menu notifications">
                                            {{-- Max 3 panels --}}
                                            
                                            <li class="notification">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <div class="media-object">
                                                            <img data-src="holder.js/50x50?bg=cccccc" class="img-circle" alt="50x50" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2250%22%20height%3D%2250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2050%2050%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_15a02e2608f%20text%20%7B%20fill%3A%23919191%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_15a02e2608f%22%3E%3Crect%20width%3D%2250%22%20height%3D%2250%22%20fill%3D%22%23cccccc%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%226.2265625%22%20y%3D%2229.5328125%22%3E50x50%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="width: 50px; height: 50px;">
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <strong class="notification-title"><a href="#">Dave Lister</a> commented on <a href="#">DWARF-13 - Maintenance</a></strong>
                                                        <p class="notification-desc">I totally don't wanna do it. Rimmer can do it.</p>

                                                        <div class="notification-meta">
                                                            <small class="timestamp">27. 11. 2015, 15:00</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>

                                        <div class="dropdown-footer text-center">
                                            <a href="#">Bekijk alles</a>
                                        </div>{{-- /dropdown-footer --}}

                                    </div>
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
                            <li {{ (current_url() == base_url('auth/register')) ? 'class="active"' : '' }}>
                                <a href="{{ base_url('auth/register') }}">
                                    <span class="fa fa-plus-square" aria-hidden="true"></span> Registreer
                                </a>
                            </li>

                            <li {{ (current_url() == base_url('auth/login')) ? 'class="active"' : '' }}>
                                <a href="{{ base_url('auth/login') }}">
                                    <span class="fa fa-sign-in" aria-hidden="true"></span> Inloggen
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>{{-- /.nav-collapse --}}
            </div>
        </nav>

        <div class="container">
            @yield('content')
        </div>

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
