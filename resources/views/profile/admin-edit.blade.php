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

	<section class="admin-content d-flex">
		<div class="row w-100 m-0">
			<!--Начало на вертикалното меню-->
			<div class="vert-nav col-12 col-xl-2 z-2 bg-info-subtle px-xxl-3 px-2 py-3">
				<ul class="nav row g-2">
					<li class="nav-item col-xl-12 col-auto">
						<a class="d-flex align-items-center p-lg-3 bg-primary-subtle border-primary flex-wrap rounded border p-2 shadow"
							href="admin.html">
							<span class="d-block bg-primary me-2 rounded px-2 py-1 text-white">
								<i class="bi bi-calendar-check-fill"></i>
							</span>
							<span>Appointments</span>
						</a>
					</li>

					<li class="nav-item col-xl-12 col-auto">
						<a class="d-flex align-items-center p-lg-3 bg-primary-subtle border-primary flex-wrap rounded border p-2 shadow"
							href="admin-profile.html">
							<span class="d-block bg-primary me-2 rounded px-2 py-1 text-white">
								<i class="bi bi-person-fill"></i>
							</span>
							<span>Profile</span>
						</a>
					</li>
					<li class="nav-item col-xl-12 col-auto">
						<a class="d-flex align-items-center p-lg-3 bg-primary-subtle border-primary flex-wrap rounded border p-2 shadow"
							href="home.html">
							<span class="d-block bg-primary me-2 rounded px-2 py-1 text-white">
								<i class="bi bi-box-arrow-right"></i>
							</span>
							<span>Log out</span>
						</a>
					</li>
				</ul>
			</div>
			<!--Край на вертикалното меню-->

			<!--Начало на съдържанието-->
			<div class="col-xl-10 admin-content-page min-h-100 m-0 p-4">
				<div class="container">
					<div class="row pt-lg-5">
						<div class="col-md-6">
							<img class="col-4 d-block mx-auto rounded" src="img/icon/doc_male.png" />

							<div class="adm-profile">
								<div>
									<h3>
										<strong> Д-р Иван Марчев </strong>
									</h3>
								</div>
								<hr class="col-5 mx-auto" />
								<div>
									<p><strong>Email: </strong>marchev@doctor.com</p>
								</div>
								<div>
									<p><strong>Phone: </strong>+359 897 052 058</p>
								</div>
								<div>
									<p><strong>ID: </strong> 4</p>
								</div>
							</div>
						</div>

						<div class="col-md-6 rounded-lg py-3 shadow-lg">
							<h5>Обновяване на данни</h5>
							<div class="alert alert-danger" role="alert">
								Паролите не съвпадат!
							</div>
							<div class="alert alert-danger" role="alert">
								Грешна парола!
							</div>

							<div class="alert alert-success" role="alert">
								Данните са обновени!
							</div>

							<form action="" method="POST">
								<div class="form-group pb-3">
									<label for="inputEmail4">Email</label>
									<input type="email" name="email" value="marchev@doctor.com" class="form-control" id="inputEmail4" />
								</div>
								<div class="row">
									<div class="form-group col-md-6 pb-3">
										<label for="inputfname4">Име и фамилия</label>
										<input type="text" name="name" value="Д-р Иван Марчев" class="form-control" id="inputfname4" />
									</div>
									<div class="form-group col-md-6 pb-3">
										<label for="inputPhone">Телефон</label>
										<input type="text" name="phone" value="+359 897 052 058" class="form-control" id="inputPhone" />
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6 pb-3">
										<label for="inputPassword">Парола</label>
										<input type="password" name="admin_password" class="form-control" id="inputPassword" required />
									</div>
									<div class="form-group col-md-6 pb-3">
										<label for="inputPassword">Повтори Паролата</label>
										<input type="password" name="admin_password2" class="form-control" id="inputPassword1" required />
									</div>
									<div class="form-group col-md-6 pb-3">
										<label for="inputPassword">Нова парола</label>
										<input type="password" name="new_password" class="form-control" id="inputPassword2" />
									</div>
								</div>

								<button type="submit" name="submit" class="btn btn-primary">
									Обновяване
								</button>
							</form>
						</div>
					</div>
				</div>
				<!--Край на съдържанието-->
			</div>
		</div>
	</section>
@endsection
