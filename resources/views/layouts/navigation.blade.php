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
						<a href="{{ route('appointments.index') }}" class="nav-link text-light fs-5">Часове</a>
					</li>
					<li class="nav-item px-2 text-white">
						<a href="{{ route('contact') }}" class="nav-link text-light fs-5">Контакти</a>
					</li>


					@if (Route::has('login'))
						@auth
							@if (Auth::user()->isAdmin == 1)
								<li class="nav-item px-2 text-white">
									<a href="{{ route('admin') }}" class="nav-link text-light fs-5">Админ</a>
								</li>
							@endif
							<li class="nav-item px-2 text-white">
								@if (Auth::user()->isAdmin == 1)
									<a href="{{ route('profile.edit') }}" class="nav-link text-light fs-5">
										{{-- <a href="{{ route('admin-profile.edit') }}" class="nav-link text-light fs-5"> --}}
										<span>Д-р</span>
									@else
										<a href="{{ route('profile.edit') }}" class="nav-link text-light fs-5">
								@endif
								<span class="mb-0">{{ Auth::user()->first_name }}</span>
								<span class="mb-0">{{ Auth::user()->last_name }}</span>
								</a>
							</li>
							<li class="nav-item px-2 text-white">
								<a href="{{ route('logout') }}" class="btn btn-primary"
									onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									Излизане
								</a>
							</li>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
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
