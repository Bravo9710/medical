@extends('layout')

@section('content')
	<section class="content-wrap">
		<div class="container py-5">
			<div class="row no-gutters register_form bg-info mx-sm-0 mx-1 rounded shadow">
				<div class="col-md-12 color-3 p-sm-5 p-2">
					<div class="container">
						<div class="row">
							<!-- Лява колона-->
							<div class="col-lg-6 pb-3">
								<img class="col-4 d-block mx-auto rounded" src="img/icon/user.png" />

								<div class="adm-profile">
									<div>
										<h3>
											<strong>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</strong>
										</h3>
									</div>
									<hr class="col-5 mx-auto" />
									<div>
										<p><strong>Email: </strong>{{ Auth::user()->email }}</p>
									</div>
									<div>
										<p><strong>Tелефон: </strong>{{ Auth::user()->phone }}</p>
									</div>
									<div>
										<p><strong>Адрес: </strong>{{ Auth::user()->address }}</p>
									</div>
									<div>
										<p><strong>Град: </strong>{{ Auth::user()->city }}</p>
									</div>
									<div>
										<p><strong>ЕГН: </strong>{{ Auth::user()->egn }}</p>
									</div>
									<div>
										<p><strong>Кр. гурпа: </strong>{{ Auth::user()->blood_group }}</p>
									</div>
								</div>
							</div>
							<!-- /Лява колона-->

							<!-- Дясна колона-->
							<div class="col-lg-6 rounded py-3 shadow-lg" style="background-color: rgb(245, 245, 245)">
								<h5>Обновяване на данни</h5>
								<form action="{{ route('profile.update') }}" method="POST">
									@csrf
									@method('patch')

									<x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
									<x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
									<x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

									<!-- Email/pass -->
									<div class="form-group pb-3">
										<label for="email">Email</label>
										<input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" id="email" />
									</div>
									<div class="row">
										<div class="form-group col-lg-6 pb-3">
											<label for="first_name">Име*</label>
											<input type="text" name="last_name" value="{{ Auth::user()->first_name }}" class="form-control"
												id="first_name" required />
										</div>
										<div class="form-group col-lg-6 pb-3">
											<label for="last_name">Фамилия*</label>
											<input type="text" name="last_name" value="{{ Auth::user()->last_name }}" class="form-control"
												id="last_name" required />
										</div>
										<div class="form-group col-lg-6 pb-3">
											<label for="phone">Телефон</label>
											<input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control" id="phone"
												required />
										</div>
										<div class="form-group col-lg-6 pb-3">
											<label for="address">Адрес</label>
											<input type="text" name="address" value="{{ Auth::user()->address }}" class="form-control" id="address"
												required />
										</div>
										<div class="form-group col-lg-6 pb-3">
											<label for="city">Град</label>
											<input type="text" name="city" value="{{ Auth::user()->city }}" class="form-control" id="city"
												required />
										</div>
										<div class="form-group col-lg-6 pb-3">
											<label for="blood_group">Кръвна група</label>
											<select id="blood_group" name="blood_group" value="{{ Auth::user()->blood_group }}" class="form-control">
												<option value="">Избери</option>
												<option value="AB+">AB+</option>
												<option value="AB-">AB-</option>
												<option value="A+">A+</option>
												<option value="A-">A-</option>
												<option value="B+">B+</option>
												<option value="B-">B-</option>
												<option value="0+">0+</option>
												<option value="0-">0-</option>
											</select>
										</div>
										<div class="form-group col-lg-6 pb-3">
											<label for="inputEgn">ЕГН</label>
											<input type="text" name="egn" value="{{ Auth::user()->egn }}" class="form-control" id="inputEgn" />
										</div>
										<div class="form-group col-lg-6 pb-3">
											<label for="current_password">Парола</label>
											<input type="password" name="current_password" class="form-control" id="current_password" required
												autocomplete="current-password" />
										</div>
										<div class="form-group col-lg-6 pb-3">
											<label for="password_confirmation">Повтори Паролата</label>
											<input type="password" name="password_confirmation" class="form-control" id="password_confirmation2"
												required />
										</div>
										<div class="form-group col-lg-6 pb-3">
											<label for="password">Нова парола</label>
											<input type="password" name="password" class="form-control" id="password" />
										</div>

										<div class="col-2">
											<button type="submit" name="submit" class="btn btn-primary">
												Обновяване
											</button>
										</div>
									</div>
								</form>
								@if (session('status') === 'password-updated')
									<p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="">
										{{ __('Saved.') }}</p>
								@endif
							</div>
							<!-- /Дясна колона-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
