<?php
require 'include/lessc.php';
try {
    lessc::ccompile('less/index.less', 'css/index.css');
}
catch (exception $ex) {
    exit('lessc fatal error:'.$ex->getMessage());
}
require 'include/Config.php';
require 'include/MysqliRessource.php';
require 'include/ModelMysqli.php';
require 'include/ProjetMysqli.php';
$projetMysqli = new ProjetMysqli();
$projets = $projetMysqli->selectLast6();
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
					<a href="index.php">
						<img src="img/logo.png" alt="Cifacom">
					</a>
				</div>
				<ul>
					<li><a href="index.php" class="active">Accueil</a></li>
					<li><a href="formation-realisateur-audiovisuel.php">Formation Réalisateur</a></li>
					<li><a href="formation-monteur-truquiste.php">Formation monteur truquiste</a></li>
					<li><a href="projets-realises.php">Projets réalisés</a></li>
					<li><a href="#contact">Contactez-nous</a></li>
					<li><a href="equipe-pedagogique.php">Equipe pédagogique</a></li>
				</ul>
			</nav>
		</header>
		<section class="presentation">
			<div id="video_overlays"></div>
			<video autoplay loop muted poster="img/slide1.jpg" id="bgvid">
				<source src="img/home.mp4" type="video/mp4">
			</video>
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
				<a href="formation-realisateur-audiovisuel.php">En savoir plus sur la formation de Réalisateur</a>
				<br>
				<a href="etudiants-formation-realisateur.php">Bande-Démo des étudiants</a>
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
				<a href="formation-monteur-truquiste.php">En savoir plus sur la formation de Monteur truquiste</a>
				<br>
				<a href="etudiants-formation-monteur-truquiste.php">Bande-Démo des étudiants</a>
			</div>
		</section>
		<section class="travaux">
			<h2>Découvrez les travaux de nos étudiants</h2>
			<a href="projets-realises.php?f=real" class="realisateur">
				<img src="img/realisateur.png" alt="">
				Devenez
				<span>Réalisateur</span>
			</a><a href="projets-realises.php?f=mont" class="truquiste">
				<img src="img/truquiste.png" alt="">
				Devenez
				<span>Monteur truquiste</span>
			</a>
		</section>
		<section class="videos">
			<?php foreach($projets as $v): ?>
			<a href="video.php?id=<?=$v['id']?>" class="video" style="background-image: url('<?=$v['video_image_link']?>')">
				<div class="play">
					<img src="img/play.png" alt="Play">
				</div>
				<h4><?=$v['title']?></h4>
			</a>
			<?php endforeach ?>
		</section>
		<div class="clear"></div>
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
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<script src="js/index.js"></script>
	</body>
</html>
