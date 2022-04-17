<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SADFI') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dark.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    @yield('xtrajs')
</head>
<style type="text/css">
    #loader {
        position: fixed;
        height: 100vh;
        width: 100vw;
        z-index: 1000;
        background: url(images/loading.gif) no-repeat center center;
        display: none;
    }
</style>
<body>
    <div id="loader"></div>
    <div id="app">

        <header id="header">
            <div class="container">
               <!-- Logo
                ============================================= -->
                <div class="row" style="max-height: 300px !important;">
                    <div class="col-md-6">
                        <a href="http://www.unam.mx" data-dark-logo="images/logos/unam2.png"><img class="divcenter1" src="images/logos/unam2.png" alt="UNAM" title="UNAM"></a>
                        
                        
                        <a href="http://www.ingenieria.unam.mx" data-dark-logo="images/logos/fi01.png"><img class="divcenter2" src="images/logos/fi01.png" alt="Facultad de Ingeniería"></a>
                    </div>
                    <div class="col-md-6">
                         <a href="https://www.ingenieria.unam.mx/evaluacioneducativa/index.html" ><img class="divcenter3" src="images/logos/logo_cee.png" alt="Coordinación de Evaluación Educativa" title="Coordinación de Evaluación Educativa"></a>
                    </div>
               </div><!-- #logo end --> 
            </div>
        </header><!-- #header end -->


        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer id="footer" class="dark" >
            <div class="container">
                <!-- Footer Widgets
                ============================================= -->
                <div class="footer-widgets-wrap clearfix">
                    <div class="col_two_third">
                        <div class="widget clearfix">
                           <div class="col_one_third padding-bottom">
                                 <img src="images/logos/logo_footer.png" alt="" class="footer-logo">  
                                  <div style="padding-left:40px">
                                    <a type="submit" href="contacto.html" id="quick-contact-form-submit" name="quick-contact-form-submit" class="btn-contacto" value="submit">Contacto</a>
                                 </div>  
                            </div>
                            <div class="col_two_third col_last">
                                     <address class="nobottommargin">
                                        Facultad de Ingeniería, 
                                     </address>
                                     <address class="nobottommargin">
                                        Área de Posgrado, 
                                     </address>
                                     <address class="nobottommargin">
                                        3er. piso Edificio U,
                                     </address>
                                     <address class="nobottommargin">
                                            Cubículos 407 y 409,
                                      </address> 
                                       <address class="nobottommargin">
                                        Teléfono: 562 23250
                                     </address>
                                     <address class="nobottommargin">
                                        Correo electrónico: evaluacioneducativa@ingenieria.unam.mx<br>

                                     </address>
                           </div>
                        </div>
                    </div>
                    <div class="col_one_third col_last">
                        <div class="widget clearfix">
                            <h4>Sitios de Interés</h4>
                                <div class="widget_links">
                                    <ul>
                                        <li><a href="http://www.anfei.mx" target="_blank">ANFEI</a></li>
                                        <li><a href="http://cacei.org.mx" target="_blank">CACEI</a></li>
                                        <li><a href="http://www.alianzafiidem.org" target="_blank">Alianza FIDEM</a></li>
                                        <li><a href="http://ingenet.com.mx" target="_blank">INGENET</a></li>
                                    </ul>
                                </div>
                        </div>
                   </div>
                </div><!-- .footer-widgets-wrap end -->
            </div>
            <!-- Copyrights
            ============================================= -->
            <div id="copyrights2">
                <div class="container clearfix">
                        <div class="copyrights2">
                             <p>Copyrights &copy; 2016 /
                               <a href="http://www.ingenieria.unam.mx">Facultad de Ingeniería</a>/<a href="http://www.unam.mx">UNAM</a>/
                             </p>
                             <p>
                                        Facultad de Ingeniería, Secretaría de Apoyo a la Docencia, todos los derechos reservados 2016. Esta página puede ser reproducida con fines no lucrativos, siempre y cuando no se mutile, se cite la fuente completa y su dirección electrónica. De otra forma, requiere permiso previo por escrito de la institución.<br>
                        </p>
                        </div>

               </div>
            </div><!-- #copyrights end -->
        </footer><!-- #footer end -->
</body>
    <script src="js/jquery-2.2.4.min.js" type="text/javascript"></script>
    @yield('js')
</html>
