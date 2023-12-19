@extends('layout')

@section('content')
	<section class="content-wrap">
		<div class="d-flex justify-content-center container my-5">
			<div class="bg-info row flex-column-reverse flex-lg-row mx-1 rounded px-2 py-3 shadow">
				<div class="col map">
					<iframe width="520" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas"
						src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=%20Varna+(University%20of%20Economics%20%E2%80%93%20Varna)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
					<a href="http://maps-generator.com/bg">Maps-Generator.com/bg</a>
					<script type="text/javascript"
						src="https://embedmaps.com/google-maps-authorization/script.js?id=22ad4fd483955ebe5238f7818b4dad6551a436ff">
					</script>
				</div>
				<div class="col">
					<h3 class="pb-3">Частна поликлиника</h3>
					<p>
						<strong>Телефон: </strong><a class="nav-link d-inline text-white" href="tel:+052131231">+052 131231</a>
					</p>
					<p class="mb-2">
						<strong>Имейл: </strong><a class="nav-link d-inline text-white"
							href="mailto:privatemedic@gmail.com">privatemedic@gmail.com</a>
					</p>
					<ul class="nav fs-3 pb-3 text-white">
						<li class="nav-item">
							<a class="nav-link px-2 py-2 text-white" aria-current="page" href="https://www.facebook.com/"><i
									class="bi bi-facebook"></i></a>
						</li>
						<li class="nav-item">
							<a class="nav-link px-2 py-2 text-white" href="https://www.instagram.com"><i class="bi bi-instagram"></i></a>
						</li>
						<li class="nav-item">
							<a class="nav-link px-2 py-2 text-white" href="https://www.linkedin.com/"><i class="bi bi-linkedin"></i></a>
						</li>
						<li class="nav-item">
							<a class="nav-link px-2 py-2 text-white" href="https://www.youtube.com"><i class="bi bi-youtube"></i></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
@endsection
