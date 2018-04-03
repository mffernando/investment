<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Investment System</title>
    @yield('css-view')
    <!--asset = path-->
  	<link rel="stylesheet" href="{{asset('css/stylesheet.css')}}">
  	<!--google font-->
  	<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    <!--font awesome-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
  </head>
  <body>
    @include('templates.lateral-menu')
      <section id="view-content">
        @yield('content-view')
      </section>

    @yield('js-view')
  </body>
</html>
