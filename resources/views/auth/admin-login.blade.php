@extends('layout')

@section('content')
	<section class="content-wrap h-100 container">
		<div class="card card-login bg-info mx-auto p-3 shadow">
			<div class="alert alert-warning" role="alert">
				Вход САМО за доктори!
			</div>

			<form method="POST" action="{{ route('login') }}">
				@csrf
				<x-input-error :messages="$errors->get('email')" class="mt-2" />
				<x-input-error :messages="$errors->get('password')" class="mt-2" />

				<div class="mb-3">
					<label for="email" class="form-label">Емейл</label>
					<input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
						:value="old('email')" required autofocus autocomplete="username" />
				</div>
				<div class="mb-3">
					<label for="password" class="form-label">Парола</label>
					<input type="password" class="form-control" id="password" name="password" required
						autocomplete="current-password" />
				</div>
				<button type="submit" class="btn btn-primary mb-2">Влизане</button>
				<p class="nomargin">
					Нямате акаунт?
					<a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
						href="{{ route('register') }}">Кликнете тук</a>
				</p>
				@if (Route::has('password.request'))
					<a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
						href="{{ route('password.request') }}">Забравена парола</a>
				@endif
				<p>
					<a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
						href="admin-login.html">Вход за доктори</a>
				</p>
			</form>
		</div>
	</section>
@endsection
