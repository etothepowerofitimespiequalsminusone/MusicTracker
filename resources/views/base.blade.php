<!DOCTYPE html>
<html>
<head>
@include('Partials._head')
</head>
<body>

@include('Partials._logo')
@include('Partials._nav')

<div class="col-sm-8 col-md-offset-2">
@yield('content')
</div>
@include('Partials._scripts')
@yield('scripts')
</body>
</html>







