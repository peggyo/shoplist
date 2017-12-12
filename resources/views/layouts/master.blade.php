<!DOCTYPE html>
<html>

<head>
	<title>
        @yield('title', 'shoplist')
    </title>

	<meta charset='utf-8'>
		<link href="/css/mealprod2.css" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>
	<header>
		<section class="app_head">
			<img src="/img/kitchen-small.png" alt="not found" class="app_imgleft"/>
			<h1>The Fare to Remember...</h1>
			<img src="/img/shopping-small.png" alt="not found" class="app_imgright"/>
		</section>
		<hr>
		<nav>
            <ul id="sitenav">
                <li><a href='/'>Meals</a>
                <li><a href='/meal/create'>Add Meals</a>
				<li><a href='/selections/'>Shopping Lists</a>
				<li><a href='/selections/createlist'>New Lists</a>
            </ul>
        </nav>
		<hr>
	</header>
	@if(session('alert'))
		<div class='alert'>
			{{ session('alert') }}
		</div>
	@endif

	<section>
		@yield('content')
	</section>

	<footer>
	</footer>

    @stack('body')

</body>
</html>
