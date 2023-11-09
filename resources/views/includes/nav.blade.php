<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
	<span class="navbar-brand">Tutorial</span>
	<button class="navbar-toggler"
		data-toggle="collapse"
		data-target="#navbarCollapse"
		aria-controls="navbarCollapse"
		aria-expanded="false"
		aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="navbar-collapse collapse"
		id="navbarCollapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link"
					href="/">Kezdőlap</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"
					href="/teszt">Teszt route</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"
					href="/names">Nevek</a>
			</li>
			<li class="nav-item">
				<a class="nav-link"
					href="/surname">Családnevek</a>
			</li>
			@auth
				<li class="nav-item">
					<a class="nav-link"
						href="#"
						onclick="event.preventDefault();document.getElementById('form-logout').submit();">Kijelentkezés</a>
					<form id="form-logout"
						action="/logout"
						method="post">@csrf</form>
				</li>
			@else
				<li class="nav-item">
					<a class="nav-link"
						href="/login">Bejelentkezés</a>
				</li>
				<li class="nav-item">
					<a class="nav-link"
						href="/register">Regisztráció</a>
				</li>
			@endauth
		</ul>
	</div>
</nav>
