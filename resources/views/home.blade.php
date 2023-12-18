@extends('layout')

@section('content')
	<section class="content-wrap h-100">
		<div class="container-md d-flex justify-content-center">
			<div class="card bg-info p-4 shadow">
				<h3 class="mb-3">
					<strong>Запазете си час при най-добрите лекари</strong>
				</h3>
				<div>
					<h3>Работно време</h3>
					<div class="row justify-content-between align-items-center">
						<div class="col">
							<div class="row py-sm-0 py-2">
								<div class="col-12 col-sm-6">
									<span>Понеделник - Петък</span>
								</div>
								<div class="col-12 col-sm-6">
									<span>7:30 - 15:00</span>
								</div>
							</div>
							<div class="row py-sm-0 py-2">
								<div class="col-12 col-sm-6">
									<span>Събота - Неделя</span>
								</div>
								<div class="col-12 col-sm-6">
									<span>Почивен ден</span>
								</div>
							</div>
						</div>
						<div class="col-12 col-sm-auto py-3">
							<a href="./appointments" class="btn btn-primary">
								Запази час
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
