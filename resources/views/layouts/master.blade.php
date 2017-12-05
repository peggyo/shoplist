<!DOCTYPE html>
<html>

<head>
	<title>
        @yield('title', 'shoplist')
    </title>

	<meta charset='utf-8'>
	<link href="/css/meal.css" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>

	@if(session('alert'))
		<div class='alert'>
			{{ session('alert') }}
		</div>
	@endif


	<header>
		<nav>
            <ul>
                <li><a href='/'>Meals</a>
                <li><a href='/meal/create'>Add Meal</a>
				<!--<li><a href='/meal/se'>Search</a>-->
            </ul>
        </nav>
	</header>

	<section>
		@yield('content')
	</section>

	<footer class='copyright'>
		<!--&copy; {{ date('Y') }}-->
	</footer>

    @stack('body')

</body>
</html>
