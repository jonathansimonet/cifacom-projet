<?php
require 'include/lessc.php';
try {
    lessc::ccompile('less/equipe-pedagogique.less', 'css/equipe-pedagogique.css');
}
catch (exception $ex) {
    exit('lessc fatal error:'.$ex->getMessage());
}
/*require 'include/Config.php';
require 'include/MysqliRessource.php';
require 'include/ModelMysqli.php';
require 'include/ProjetMysqli.php';
$projetMysqli = new ProjetMysqli();
$projets = $projetMysqli->selectLast6();*/
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Equipe pédagogique - Cifa3com</title>
		<meta name="description" content="">
		<link rel="stylesheet" href="css/normalize.min.css">
		<link rel="stylesheet" href="css/base.css">
		<link rel="stylesheet" href="css/equipe-pedagogique.css">
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<header>
			<nav>
				<div class="logo">
					<a href="http://www.cifacom.com/">
						<img src="img/logo.png" alt="Cifacom">
					</a>
				</div>
				<ul>
					<li><a href="index.php">Accueil</a></li>
					<li><a href="equipe-pedagogique.php" class="active">Equipe pédagogique</a></li>
					<li><a href="formation-realisateur-audiovisuel.php">Formation Réalisateur</a></li>
					<li><a href="formation-monteur-truquiste.php">Formation monteur truquiste</a></li>
					<li><a href="projets-realises.php">Projets réalisés</a></li>
					<li><a href="#contact">Contactez-nous</a></li>
				</ul>
			</nav>
		</header>
		<section class="presentation">
			<div style="background-image:url('img/fond-intervenants.jpg')"></div>
		</section>
		<section id="equipe">
			<h1>Notre équipe pédagogique</h1>
			<div class="equipe">
				<img src="img/equipe/1.jpg" alt="">
				<div class="desc">
					<div class="name">Adrien Quinn</div>
					<div class="intervenant">Intervenant réalisateur</div>
				</div>
			</div>
			<div class="equipe">
				<img src="img/equipe/1.jpg" alt="">
				<div class="desc">
					<div class="name">Adrien Quinn</div>
					<div class="intervenant">Intervenant réalisateur</div>
				</div>
			</div>
			<div class="equipe">
				<img src="img/equipe/2.jpg" alt="">
				<div class="desc">
					<div class="name">Maurice Archambault</div>
					<div class="intervenant">Intervenant monteur</div>
				</div>
			</div>
			<div class="equipe">
				<img src="img/equipe/2.jpg" alt="">
				<div class="desc">
					<div class="name">Maurice Archambault</div>
					<div class="intervenant">Intervenant monteur</div>
				</div>
			</div>
			<div class="equipe">
				<img src="img/equipe/3.jpg" alt="">
				<div class="desc">
					<div class="name">Bartlett DeGrasse</div>
					<div class="intervenant">Intervenant camera</div>
				</div>
			</div>
			<div class="equipe">
				<img src="img/equipe/3.jpg" alt="">
				<div class="desc">
					<div class="name">Bartlett DeGrasse</div>
					<div class="intervenant">Intervenant camera</div>
				</div>
			</div>
			<div class="equipe">
				<img src="img/equipe/4.jpg" alt="">
				<div class="desc">
					<div class="name">Margueritte Aucoin</div>
					<div class="intervenant">Intervenant camera</div>
				</div>
			</div>
			<div class="equipe">
				<img src="img/equipe/4.jpg" alt="">
				<div class="desc">
					<div class="name">Margueritte Aucoin</div>
					<div class="intervenant">Intervenant camera</div>
				</div>
			</div>
		</section>
		<footer>
			<div class="map"></div>
			<form id="contact" method="post">
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
							<a href="https://www.facebook.com/ecole.cifacom/" target="_blank">
								<img src="img/fb.png" alt="Facebook">
							</a>
						</li>
						<li>
							<a href="https://plus.google.com/+cifacom/" target="_blank">
								<img src="img/gplus.png" alt="Google+">
							</a>
						</li>
						<li>
							<a href="https://twitter.com/cifacom" target="_blank">
								<img src="img/twitter.png" alt="Twitter">
							</a>
						</li>
						<li>
							<a href="https://instagram.com/explore/tags/cifacom/" target="_blank">
								<img src="img/instagram.png" alt="Instagram">
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
	</body>
</html>
