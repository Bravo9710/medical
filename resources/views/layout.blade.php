<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Поликлиника</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />

	<!-- <link rel="stylesheet" href="../css/bootstrap.min.css" /> -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
	@include('layouts/navigation')

	@yield('content')

	<footer class="font-small footer bg-info">
		<!-- Copyright -->
		<div class="footer-copyright py-2 text-center">
			Copyright © 2020
		</div>
		<!-- Copyright -->
	</footer>

	<!-- jQuery, Popper.js, Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha384-7C+/Nf7vKdR6U8ZBf4eXn9457FVvC1j8E9aD8T96T8R9+K0nJQF9c5vNUok2a2O5" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
