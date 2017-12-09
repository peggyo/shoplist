<!DOCTYPE html>
<html>

<head>
	<title>
        @yield('title', 'shoplist')
    </title>

	<meta charset='utf-8'>
	<link href="/css/mealdev.css" type='text/css' rel='stylesheet'>

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
                <li><a href='/meal/create'>Add Meals</a>
				<li><a href='/selections/'>Shopping Lists</a>
				<li><a href='/selections/createlist'>New Lists</a>
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
