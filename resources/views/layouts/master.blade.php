<!DOCTYPE html>
<html>

<head>
	<title>
        @yield('title', 'shoplist')
    </title>

	<meta charset='utf-8'>

    @stack('head')

</head>
<body>

	<header>
		<nav>
            <ul>
                <li><a href='/'>Meals</a>
                <li><a href='/meal/create'>Add a Meal</a>
				<!--<li><a href='/meal/se'>Search</a>-->
                <li><a href='/search'>Search</a>
            </ul>
        </nav>
	</header>

	<section>
		@yield('content')
	</section>

	<footer class='copyright'>
		&copy; {{ date('Y') }}
	</footer>

    @stack('body')

</body>
</html>
