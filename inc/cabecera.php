<div id="header-wrapper">
	<div class="5grid">
		<div class="12u-first">
			<header id="header">
				<h1><a href="#">PHP Blog</a></h1>
				<nav>
				    <?php
				     $activarclase = 'class="current-page-item"';
				    
				    ?>
				    <a href="index.html"  <?php if (isset($_GET['cargar']) && $_GET['cargar'] == 'index') {echo ' '. $activarclase;} ?> >Home</a>
					<a href="registro.html"  <?php if (isset($_GET['cargar']) && $_GET['cargar'] == 'registro') {echo ' '. $activarclase;} ?>>Sign Up</a>
					<a href="zzz.html">---</a>
					<a href="zzz.html">---</a>
				</nav>
			</header>
		</div>
	</div>
</div>