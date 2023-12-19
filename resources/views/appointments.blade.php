@extends('layout')

@section('content')
	<section class="container mb-5 mt-5">
		<div class="row no-gutters register_form bg-info mx-1 rounded shadow">
			<div class="col-md-12 p-md-4 p-2">
				@if (session('success'))
					<div class="alert alert-success">
						{{ session('success') }}
					</div>
				@endif

				@if (session()->has('error'))
					<div class="alert alert-danger">
						{{ session('error') }}
					</div>
				@endif

				<h3 class="mb-2">Запази час</h3>
				<form method="POST" action="{{ route('appointments.store') }}" class="appointment-form">
					@csrf
					<div class="row pb-2">
						<div class="col-md-3 pb-2">
							<div class="icon">
								<span class="ion-ios-arrow-down"></span>
							</div>
							<select id="doctor_id" name="doctor_id" class="form-control" required>
								<option value="" selected>Доктор</option>
								@foreach (DB::table('users')->where('isAdmin', 1)->where('id', '>', 1)->get() as $doctor)
									<option value="{{ $doctor->id }}">Д-р {{ $doctor->first_name }} {{ $doctor->last_name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-md-3 pb-2">
							<div class="icon">
								<span class="ion-ios-arrow-down"></span>
							</div>
							<select name="hour" id="hour" class="form-control" required>
								<option value="">Час</option>
								<option value="07:30">7:30</option>
								<option value="08:00">8:00</option>
								<option value="08:30">8:30</option>
								<option value="09:00">9:00</option>
								<option value="09:30">9:30</option>
								<option value="10:00">10:00</option>
								<option value="10:30">10:30</option>
								<option value="11:00">11:00</option>
								<option value="11:30">11:30</option>
								<option value="12:00">12:00</option>
								<option value="12:30">12:30</option>
								<option value="13:00">13:00</option>
								<option value="13:30">13:30</option>
								<option value="14:00">14:00</option>
								<option value="14:30">14:30</option>
								<option value="15:00">15:00</option>
							</select>
						</div>
						<div class="col-md-3 pb-2">
							<div class="form-group">
								<input class="form-control" type="date" name="date" value="" />
							</div>
						</div>
						<div class="col-md-3 pb-2">
							<div class="form-group">
								<input type="submit" name="submit" value="Запази час" class="col-md-12 btn btn-primary" />
							</div>
						</div>
					</div>
				</form>

				{{-- <form method="POST" action="{{ route('appointments.show') }}" class="">
					@csrf
					<h6>Търсене на заети часове при доктор</h6>
					<div class="row pb-2">
						<div class="col-md-3 pb-2">
							<div class="icon">
								<span class="ion-ios-arrow-down"></span>
							</div>
							<select id="doctor_id2" name="doctor_id" class="form-control" required>
								<option value="" selected>Доктор</option>
								@foreach (DB::table('doctors')->get() as $doctor)
									<option value="{{ $doctor->id }}">Д-р {{ $doctor->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-md-3 pb-2">
							<div class="form-group">
								<input class="form-control" type="date" name="date" value="" />
							</div>
						</div>
						<div class="col-6 col-md-2 pb-2">
							<div class="form-group">
								<input type="submit" name="search" fromaction value="Търси" class="col-12 btn btn-primary" />
							</div>
						</div>
						<div class="col-6 col-md-2 pb-2">
							<div class="form-group">
								<a href="{{ route('appointments.index') }}" class="col-12 btn btn-danger">Изчисти</a>
							</div>
						</div>
					</div>
				</form> --}}

				<h5>Запазени часове</h5>
				<table id="booked" style="background-color: white" class="table-striped table-hover table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Доктор</th>
							<th scope="col">Дата и Час</th>
						</tr>
					</thead>
					<tbody>
						@if ($appointments->isEmpty())
							<tr>
								<td colspan="3" class="text-center">No appointments found.</td>
							</tr>
						@else
							@foreach ($appointments as $appointment)
								<tr>
									<th scope="row">{{ $loop->index + 1 }}</th>
									<td>Д-р {{ DB::table('users')->find($appointment->doctor_id)->first_name }}
										{{ DB::table('users')->find($appointment->doctor_id)->last_name }}</td>
									<td>{{ $appointment->hour }}ч. {{ $appointment->date }}</td>
								</tr>
							@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</section>
@endsection
