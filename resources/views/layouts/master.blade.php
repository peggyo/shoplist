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
