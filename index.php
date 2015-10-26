<?php
require 'include/lessc.php';
try {
    lessc::ccompile('less/index.less', 'css/index.css');
}
catch (exception $ex) {
    exit('lessc fatal error:'.$ex->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cifa3com</title>
		<meta name="description" content="">
		<link rel="stylesheet" href="css/normalize.min.css">
		<link rel="stylesheet" href="css/base.css">
		<link rel="stylesheet" href="css/index.css">
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<header>
			<nav>
				<div class="logo">
					<a href="#">
						<img src="img/logo.png" alt="Cifacom">
					</a>
				</div>
				<ul>
					<li>
						<a href="#" class="active">Accueil</a>
					</li>
					<li><a href="#">Equipe pédagogique</a></li>
					<li><a href="#">Formation Réalisateur</a></li>
					<li><a href="#">Formation monteur truquiste</a></li>
					<li><a href="#">Contactez-nous</a></li>
				</ul>
			</nav>
		</header>
		<section class="presentation">
			<div style="background-image:url('img/slide1.jpg')"></div>
			<h1>
				<span>
					<span>Bachelor</span>
					<br>Réalisateur / Monteur Truquiste 
				</span>
			</h1>
		</section>
		<section class="realisateur">
			<div class="left">
				<h2>
					<img src="img/realisateur.png" alt="">
					Devenez 
					<span>Réalisateur</span>
				</h2>
				<p>
					Le Bachelor Réalisateur aussi un profil de « vidéo designer ».
					<br>Du concept à la diffusion sur internet, les étudiants apprennent toutes les étapes de la réalisation et de la production de films institutionnels et publicitaires.
					<br>Cette formation se déroule en alternance, après 3 mois de cours intensif les étudiants sont 3 semaines en entreprise et une semaine en cours pendant 10 mois.
					<br>Après le Bachelor les étudiants sont capables de répondre à tous les besoins de la réalisation audiovisuelle des entreprises.
				</p>
				<a href="#">En savoir plus sur la formation de Réalisateur</a>
				<br>
				<a href="#">Bande-Démo des étudiants</a>
			</div>
			<div class="right"></div>
		</section>
		<section class="truquiste">
			<div class="left"></div>
			<div class="right">
				<h2>
					<img src="img/truquiste.png" alt="">
					Devenez 
					<span>Monteur truquiste</span>
				</h2>
				<p>
					Le Bachelor Monteur truquiste a pour ambition de former des réalisateurs audiovisuels ayant aussi un profil de « vidéo designer ».
					<br>Du concept à la diffusion sur internet, les étudiants apprennent toutes les étapes de la réalisation et de la production de films institutionnels et publicitaires.
					<br>Cette formation se déroule en alternance, après 3 mois de cours intensif les étudiants sont 3 semaines en entreprise et une semaine en cours pendant 10 mois.
					<br>Après le Bachelor les étudiants sont capables de répondre à tous les besoins de la réalisation audiovisuelle des entreprises.
				</p>
				<a href="#">En savoir plus sur la formation de Monteur truquiste</a>
				<br>
				<a href="#">Bande-Démo des étudiants</a>
			</div>
		</section>
		<section class="travaux">
			<h2>Découvrez les travaux de nos étudiants</h2>
			<a href="#" class="realisateur">
				<img src="img/realisateur.png" alt="">
				Devenez 
				<span>Réalisateur</span>
			</a><a href="#" class="truquiste">
				<img src="img/truquiste.png" alt="">
				Devenez 
				<span>Monteur truquiste</span>
			</a>
		</section>
		<section class="videos">
			<a href="#" class="video" style="background-image: url('img/videos/1.jpg')">
				<div class="play">
					<img src="img/play.png" alt="Play">
				</div>
				<h4>Festival Cine junior 25</h4>
			</a>
			<a href="#" class="video" style="background-image: url('img/videos/2.jpg')">
				<div class="play">
					<img src="img/play.png" alt="Play">
				</div>
				<h4>Sérieusement ?</h4>
			</a>
			<a href="#" class="video" style="background-image: url('img/videos/3.jpg')">
				<div class="play">
					<img src="img/play.png" alt="Play">
				</div>
				<h4>Toujours Dans la Tendance</h4>
			</a>
			<a href="#" class="video" style="background-image: url('img/videos/4.jpg')">
				<div class="play">
					<img src="img/play.png" alt="Play">
				</div>
				<h4>The Wheel Turn</h4>
			</a>
			<a href="#" class="video" style="background-image: url('img/videos/5.png')">
				<div class="play">
					<img src="img/play.png" alt="Play">
				</div>
				<h4>Watertrek 2014</h4>
			</a>
			<a href="#" class="video" style="background-image: url('img/videos/6.png')">
				<div class="play">
					<img src="img/play.png" alt="Play">
				</div>
				<h4>Wesh mon fils 2015</h4>
			</a>
		</section>
		<div class="clear"></div>
		<footer>
			<div class="map"></div>
			<form>
				<h3>Contactez-<span>nous</span></h3>
				<input type="text" name="nom" placeholder="Nom*">
				<input type="email" name="email" placeholder="Email*">
				<textarea name="message" placeholder="Message*"></textarea>
				<button type="submit">Envoyer</button>
			</form>
			<div class="bottom">
				<div class="left">
					<div class="logo">
						<img src="img/logo2.png" alt="Logo Cifacom">
					</div>
					<ul>
						<li>
							<a href="#">
								<img src="img/fb.png" alt="Facebook">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/gplus.png" alt="Google+">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/twitter.png" alt="Twitter">
							</a>
						</li>
						<li>
							<a href="#">
								<img src="img/4.png" alt="">
							</a>
						</li>
					</ul>
				</div>
				<div class="right">
					<div class="adrs">
						<img src="img/adrs.png" alt="Adresse">
						Ecole Cifacom
						<br>27 ter rue du progrès 93100 
						<br>Montreuil
					</div>
					<div class="tel">
						<img src="img/tel.png" alt="Téléphone">
						01 41 72 08 08
					</div>
				</div>
			</div>
		</footer>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<script src="js/index.js"></script>
	</body>
</html>
