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
    <body>

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
                            <li {{ (current_url() == base_url('ranking')) ? 'class="active"' : '' }}><a href="{{ base_url('ranking') }}">Het Klassement</a></li>
                            <li {{ (current_url() == base_url('participants')) ? 'class="active"' : '' }}><a href="{{ base_url('participants') }}">Onze topsporters</a></li>
                        @endif

                        <li {{ (current_url() == base_url('disclaimer')) ? 'class="active"' : '' }}><a href="{{ base_url('disclaimer') }}">Disclaimer</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        @if ($this->user)
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    {{ $this->user['username'] }}
                                    <span class="caret"></span>
                                 </a>

                                <ul class="dropdown-menu">
                                    <li><a href="{{ base_url('account/settings') }}"><span class="fa fa-cog" aria-hidden="true"></span> Account instellingen</a></li>

                                    @if (in_array('admin', $this->user['roles']))
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
        <script src="{{ base_url('assets/js/bootstrap.js') }}"></script>

        {{-- FIXME: Implement minified vue.js --}}
        {{-- FIXME: Implement minified vue-resource.js --}}
        {{-- FIXME: Implement vue.js functions. --}}

        {{-- IE10 viewport hack for Surface/desktop Windows 8 bug --}}
        <script src="{{ base_url('assets/js/ie10-viewport-bug-workaround.js') }}"></script>

    </body>
</html>
