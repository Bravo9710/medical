@extends('layout')

@section('content')
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
							href="{{ route('logout') }} onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<span class="d-block bg-primary me-2 rounded px-2 py-1 text-white">
								<i class="bi bi-box-arrow-right"></i>
							</span>
							<span>Log out</span>
						</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</li>
				</ul>
			</div>
			<!--Край на вертикалното меню-->

			<!--Начало на съдържанието-->
			<div class="col-xl-10 admin-content-page h-100 m-0 p-4">
				<!-- Търсачка -->
				<form method="POST" action="#" class="">
					<div class="row col-xxl-10">
						<div class="col-xl-4 col-md-6 col-12 pb-3">
							<label for="inputfname4">
								<h5>Търсене на заети часове на:</h5>
							</label>
							<input class="form-control" type="date" name="date" value="" />
						</div>
						<div class="col-lg-3 col-md-6 col-12 pb-3">
							<label for="inputfname4">
								<h5>Пациент:</h5>
							</label>
							<input type="text" name="username" value="" class="form-control" id="" />
						</div>
						<div class="col-lg-3 col-md-6 col-12 pb-3">
							<label for="inputfname4">
								<h5>ЕГН:</h5>
							</label>
							<input type="text" name="egn" value="" class="form-control" id="" />
						</div>
					</div>

					<div class="row gx-2">
						<div class="col-auto">
							<button type="submit" name="search" value="Търси" class="btn btn-primary">
								Търси
							</button>
						</div>
						<div class="col-auto">
							<button type="submit" name="search" value="Търси" class="btn btn-danger">
								Изчисти
							</button>
						</div>
					</div>
				</form>
				<!-- /Търсачка -->

				<!-- Таблица с запазените часове -->
				<div class="table-container pt-3">
					<h5>Запазени часове</h5>
					<form action="#" method="POST">
						<table id="booked" style="background-color: white" class="table-striped table-hover mb-0 table">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Доктор</th>
									<th scope="col">Дата и Час</th>
									<th scope="col">Пациент</th>
									<th scope="col">Телефон</th>
									<th scope="col">e-mail</th>
									<th scope="col">Град/ Адрес</th>
									<th scope="col">ЕГН</th>
									<th scope="col">Кр. група</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								@foreach ($appointments as $appointment)
									@if ($appointment->doctor_id == auth()->user()->id)
										<tr>
											<th scope="row">{{ $loop->index + 1 }}</th>
											<td>Д-р {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</td>
											<td>{{ $appointment->date }} {{ $appointment->hour }}</td>
											<td>{{ $appointment->user->first_name }} {{ $appointment->user->last_name }}</td>
											<td>{{ $appointment->user->phone }}</td>
											<td>{{ $appointment->user->email }}</td>
											<td>{{ $appointment->user->address }} {{ $appointment->user->city }}</td>
											<td>{{ $appointment->user->egn }}</td>
											<td>{{ $appointment->user->blood_group }}</td>
											<td>
												<form action="{{ route('appointments.destroy', $appointment->id) }}" method="post">
													@csrf
													@method('DELETE')
													<button class="btn btn-danger btn-sm" type="submit">X</button>
												</form>
											</td>
										</tr>
									@endif
								@endforeach
							</tbody>
						</table>
					</form>
				</div>
				<!-- /Таблица с запазените часове -->
			</div>
			<!--Край на съдържанието-->
		</div>
	</section>
@endsection
