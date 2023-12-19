@extends('layout')

@section('content')
	<div class="content-wrap">
		<div class="d-flex justify-content-center container my-5">
			<div class="card col-lg-9 bg-info p-3 shadow">
				<form action="{{ route('register') }}" method="POST">
					@csrf
					<x-input-error :messages="$errors->get('email')" class="mt-2" />
					<x-input-error :messages="$errors->get('password')" class="mt-2" />
					<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
					<x-input-error :messages="$errors->get('first_name')" class="mt-2" />
					<x-input-error :messages="$errors->get('last_name')" class="mt-2" />
					<x-input-error :messages="$errors->get('phone')" class="mt-2" />
					<x-input-error :messages="$errors->get('egn')" class="mt-2" />

					<!-- Email/pass -->
					<div class="form-group">
						<label class="mb-1" for="email">Email*</label>
						<input type="email" name="email" class="form-control mb-2" id="email" required autocomplete="email" />
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label class="mb-1" for="password">Парола*</label>
							<input type="password" name="password" class="form-control mb-2" id="password" required
								autocomplete="new-password" />
						</div>
						<div class="form-group col-md-6">
							<label class="mb-1" for="password_confirmation">Повтори Паролата*</label>
							<input type="password" name="password_confirmation" class="form-control mb-2" id="password_confirmation" required
								autocomplete="new-password" />
						</div>
					</div>

					<!-- Names -->
					<div class="row">
						<div class="form-group col-md-6">
							<label class="mb-1" for="first_name">Име*</label>
							<input type="text" name="first_name" class="form-control mb-2" id="first_name" :value="old('first_name')"
								required />
						</div>
						<div class="form-group col-md-6">
							<label class="mb-1" for="last_name">Фамилия*</label>
							<input type="text" name="last_name" class="form-control mb-2" id="last_name" :value="old('last_name')"
								required />
						</div>
					</div>

					<!-- Address -->
					<div class="row">
						<div class="form-group col-md-6">
							<label class="mb-1" for="address">Адрес</label>
							<input type="text" name="address" class="form-control mb-2" id="address" :value="old('address')" />
						</div>
						<div class="form-group col-md-6">
							<label class="mb-1" for="city">Град</label>
							<input type="text" name="city" class="form-control mb-2" id="city" :value="old('city')" />
						</div>
					</div>

					<div class="row">
						<div class="form-group col-6 col-md-4 col-xl-6">
							<label class="mb-1" for="phone">Телефон*</label>
							<input type="text" name="phone" class="form-control mb-2" id="phone" required />
						</div>
						<div class="form-group col-6 col-md-4 col-xl-2">
							<label class="mb-1" for="blood_group">Кръвна група</label>
							<select id="blood_group" name="blood_group" class="form-control mb-2">
								<option selected value="">Избери</option>
								<option>AB+</option>
								<option>AB-</option>
								<option>A+</option>
								<option>A-</option>
								<option>B+</option>
								<option>B-</option>
								<option>0+</option>
								<option>0-</option>
							</select>
						</div>
						<div class="form-group col-md-4">
							<label class="mb-1" for="egn">ЕГН</label>
							<input type="text" name="egn" class="form-control mb-2" id="egn" required />
						</div>
					</div>
					<div class="form-group">
						<p style="font-size: 13px">Полетата със знак * са задължителни</p>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="check" required />
							<label class="form-check-label mb-1" for="check">
								Приемам условията*
							</label>
						</div>
					</div>
					<button type="submit" name="submit" class="btn btn-primary">
						Регистрация
					</button>
					<p>
						Имате акаунт?
						<a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
							href="{{ route('login') }}">Кликнете тук</a>
					</p>
				</form>
			</div>
		</div>
	</div>
@endsection
