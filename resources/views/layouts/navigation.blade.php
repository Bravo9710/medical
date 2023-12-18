@section('navigation')
	<!--Начало на менюто-->
	<nav class="navbar navbar-expand-lg bg-info text-light">
		<div class="container">
			<a class="h2 logo mb-0" href="/">Поликлиника</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
				aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse justify-content-end collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav align-items-center">
					<li class="nav-item px-2 text-white">
						<a href="/" class="nav-link text-light fs-5">Начало</a>
					</li>
					<li class="nav-item px-2 text-white">
						<a href="appointments.html" class="nav-link text-light fs-5">Часове</a>
					</li>
					<li class="nav-item px-2 text-white">
						<a href="contact.html" class="nav-link text-light fs-5">Контакти</a>
					</li>
					@if (Route::has('login'))
						@auth
							<li class="nav-item p-2">
								<a href="{{ route('profile') }}" class="btn btn-primary">Профил</a>
							</li>
						@else
							<li class="nav-item p-2">
								<a href="{{ route('login') }}" class="btn btn-primary">Вход</a>
							</li>
							@if (Route::has('register'))
								<li class="nav-item p-2">
									<a href="{{ route('register') }}" class="btn btn-primary">Регистрация</a>
								</li>
							@endif
						@endauth
					@endif
				</div>
			</div>
		</div>
	</nav>
	<!--Край на менюто-->
@show
