@extends('layout')

@section('content')
	<div class="uper">

		@if (session()->get('success'))
			<div class="alert alert-success">

				{{ session()->get('success') }}

			</div><br />
		@endif
		@if (session()->get('error'))
			<div class="alert alert-danger">

				{{ session()->get('error') }}

			</div><br />
		@endif

		<a href="{{ route('students.create') }}" class="btn btn-success">ADD</a>

		<div class="float-end">

			{{ Auth::user()->name }}

			<a href="{{ route('logout') }}" class="btn btn-dark"
				onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

				{{ __('Logout') }}

			</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

				@csrf

			</form>

		</div>

		{{ $students->links() }}
		<table class="table-striped table">

			<thead>

				<tr>

					<td>ID</td>

					<td>FN</td>

					<td>Student Name</td>
					<td>Score</td>

					<td colspan="2">Action</td>

				</tr>

			</thead>

			<tbody>

				@foreach ($students as $student)
					<tr>

						<td>{{ $student->id }}
							@if ($student->file_name)
								<img src="./pics/{{ $student->file_name }}" width="50">
							@else
								<img src="https://img.icons8.com/color/help" width="50">
							@endif


						</td>

						<td>{{ $student->fn }}</td>

						<td>{{ $student->name }}</td>
						<td>
							@for ($i = 0; $i < $student->score; $i += 10)
								<img src="https://img.icons8.com/fluency/2x/christmas-star.png" width="25px">
							@endfor

						</td>

						<td>
							@if (Auth::user()->isAdmin == 1 || Auth::user()->id == $student->user_id)
								<a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
							@endif
						</td>

						<td>
							@if (Auth::user()->isAdmin == 1 || Auth::user()->id == $student->user_id)
								<form action="{{ route('students.destroy', $student->id) }}" method="post"
									onsubmit="return confirm('The record will be deleted');">

									@csrf

									@method('DELETE')

									<button class="btn btn-danger" type="submit">Delete</button>

								</form>
							@endif
						</td>

					</tr>
				@endforeach

			</tbody>

		</table>
		{{ $students->links() }}
	</div>
@endsection
