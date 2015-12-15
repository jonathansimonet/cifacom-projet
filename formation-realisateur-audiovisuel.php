<?php
require 'include/lessc.php';
try {
    lessc::ccompile('less/realisateur.less', 'css/realisateur.css');
}
catch (exception $ex) {
    exit('lessc fatal error:'.$ex->getMessage());
}
require 'include/Config.php';
require 'include/MysqliRessource.php';
require 'include/ModelMysqli.php';
require 'include/ProjetMysqli.php';
$projetMysqli = new ProjetMysqli();
$projets = $projetMysqli->selectLast3Rea();
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Formation Réalisateur Audiovisuel - Cifa3com</title>
		<meta name="description" content="">
		<link rel="stylesheet" href="css/normalize.min.css">
		<link rel="stylesheet" href="css/base.css">
		<link rel="stylesheet" href="css/realisateur.css">
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
					<li><a href="index.php">Accueil</a></li>
					<li><a href="formation-realisateur-audiovisuel.php"  class="active">Formation Réalisateur</a></li>
					<li><a href="formation-monteur-truquiste.php">Formation monteur truquiste</a></li>
					<li><a href="projets-realises.php">Projets réalisés</a></li>
					<li><a href="#contact">Contactez-nous</a></li>
					<li><a href="equipe-pedagogique.php">Equipe pédagogique</a></li>
				</ul>
			</nav>
		</header>
		<section class="presentation">
			<div class="bg" style="background-image:url('img/slide2.jpg')"></div>
			<h1>
				<span>
					<span>Formation</span>
					<br>Réalisateur Audiovisuel
				</span>
				<small>Formation réalisateur poste bac+2</small>
			</h1>
			<div class="desc">
				<h2>Profils</h2>
				<p>
					Bac + 2 en montage (BTS ou équivalent)
					<br>Curieux, réactifs et passionnés de cinéma
				</p>
				<h2 style="margin-top:2em">Objectifs</h2>
				<p>
					• Maitriser la chaine de production audiovisuelle
					<br>• Apprendre à réaliser des vidéos institutionnelles et publicitaires
					<br>• Savoir gérer un projet du concept à la diffusion
					<br>• Gérer la relation client
				</p>
			</div>
		</section>
		<section id="presentation">
			<h2>Présentation du cursus Réalisateur</h2>
			<p>Ce Bachelor a pour objectif de former à la communication audiovisuelle des professionnels capables d’écrire, de réaliser, d’assurer le suivi de production des projets institutionnels ou publicitaires.</p>
			<p>Le programme du Bachelor assure la pluricompétence très recherchée dans  le secteur de l’audiovisuel.
			<br>Le réalisateur audiovisuel est un chef d’orchestre qui maîtrise l’ensemble de la chaîne de production : scénarisation, gestion de production, réalisation, montage, diffusion...5 métiers en 1.</p>
			<p>La réalisation en binôme de 6 projets, dont certains sont proposés par des associations, d’un projet de fin d’études et d’une mission longue en entreprise sont les clés d’une excellente insertion professionnelle.</p>
		</section>
		<section id="tps_forts">
			<h2>Temps forts</h2>
			<p>
				<span>Novembre :</span> Projet JRI
				<br><span>Décembre :</span> Film Institutionnel
				<br><span>Janvier :</span> Film Publicitaire
				<br><span>Février :</span> Vidéo Web
				<br><span>Mars :</span> Projet Web Doc
				<br><span>Avril - Mai – Juin :</span> Projet publicitaire
				<br><span>Juillet :</span> Rapport de Stage vidéo
				<br><span>Septembre :</span> Projet de find ‘année
				<br><span>Octobre :</span> Projet clip musical
			</p>
			<h2>Durée:</h2>
			<p>
				<span>6 modules</span> "Projets" de 10 jours,
				<br><span>1 module</span> "Projet" de 5 jours,
				<br><span>3 modules</span> "Techniques" de 5 jours et 5 jours d'examen soit 17 semaines de formation.
			</p>
			<!--<a href="#">En savoir plus sur la formation</a>-->
		</section>
		<section id="timeline">
			<h2>Voici la timeline de la formation Réalisateur Audiovisuel</h2>
			<div id="mois_fixed">
				<ul>
					<li><a href="#novembre">Novembre</a></li>
					<li><a href="#decembre">Décembre</a></li>
					<li><a href="#janvier">Janvier</a></li>
					<li><a href="#avril">Avril</a></li>
					<li><a href="#juillet">Juillet</a></li>
					<li><a href="#aout">Août</a></li>
				</ul>
			</div>
			<div id="novembre" class="month r">
				<div class="left">
					<div class="img">
						<img src="img/timeline/1.jpg">
					</div>
				</div>
				<div class="middle"></div>
				<div class="right">
					<h3>
						Réalisation Vidéo Web
						<span>Novembre</span>
					</h3>
					<div class="txt">
						<p>Les étudiants, pendant ce projet, encadré par un professionnel,  participent à toutes les étapes de la réalisation.</p>
						<p>Maitriser les tenants et aboutissant afin d'optimiser les chances de réussite sur le support très exigent qu'est le web.</p>
						<p>Ce module est composé d'une partie théorique offrant les connaissances de l'écriture pour des formats web et d'une partie pratique amenant à la réalisation d'une vidéo.</p>
						<p>Ce parcours permet de devenir autonome pour écrire, tourner, monter un projet vidéo.</p>
					</div>
				</div>
			</div>
			<div id="decembre" class="month l">
				<div class="left">
					<h3>
						JRI et Web TV
						<span>Décembre</span>
					</h3>
					<div class="txt">
						<p>
							Journaliste Reporter d’Image
							<br>Etre capable de mener un reportage de A à Z et de connaître les différentes étapes techniques.
						</p>
						<p>Privilégiant une approche pédagogique de type appropriatif, ce module  met l’accent sur une pratique du métier de JRI (Journaliste Reporter d’Images – Monteur), afin de permettre aux étudiants d’acquérir le maximum de polyvalence et d’autonomie professionnelles.</p>
						<p>
							Magazine Web TV
							<br>Conception et réalisation collective d’un magazine thématique.
							<br>Les techniques de réalisation d'une "Web TV"
							<br>Encadré par un formateur et rédacteur en chef.
						</p>
					</div>
				</div>
				<div class="middle"></div>
				<div class="right">
					<div class="img">
						<img src="img/timeline/2.jpg">
					</div>
				</div>
			</div>
			<div id="janvier" class="month r">
				<div class="left">
					<div class="img">
						<img src="img/timeline/3.jpg">
					</div>
				</div>
				<div class="middle"></div>
				<div class="right">
					<h3>
						Pub et Corporate
						<span>Janvier</span>
					</h3>
					<div class="txt">
						<p>Réalisation de Bandes annonces publicitaires et/ou Institutionnelles pour des associations et/ou des festivals de cinéma.</p>
						<p>Les étudiants travaillent en groupe. Les clients sont réels, un  brief client permet de définir les besoins, les contraintes, le message, la direction artistique et la stratégie.</p>
						<p>Encadré par un formateur et directeur des projets, les étudiants participent à toutes les étapes d’une réalisation.</p>
					</div>
				</div>
			</div>
			<div id="avril" class="month l">
				<div class="left">
					<h3>
						Web Doc
						<span>Avril</span>
					</h3>
					<div class="txt">
						<p>Appréhender de manière globale et pratique les spécificités de la réalisation du web documentaire, de l’écriture à la diffusion.</p>
						<p>Ensemble  ils établissent la charte graphique, la direction artistique  et la réalisation du Web doc.</p>
						<p>Les étudiants, pendant ce projet, encadré par un professionnel,  participent à toutes les étapes de la conception à la mise en ligne.</p>
					</div>
				</div>
				<div class="middle"></div>
				<div class="right">
					<div class="img">
						<img src="img/timeline/4.jpg">
					</div>
				</div>
			</div>
			<div class="month r">
				<div class="left">
					<div class="img">
						<img src="img/timeline/5.jpg">
					</div>
				</div>
				<div class="middle"></div>
				<div class="right">
					<h3>
						Clip
						<span>Juillet</span>
					</h3>
					<div class="txt">
						<p>
							Imaginer et réaliser entièrement un vidéo-clip pour un Artiste du choix de l'étudiant ou parmi ceux proposés par l'intervenant.
							<br>Les étudiants travaillent en groupe (2 à 3).
						</p>
						<p>Les artistes sont réels,  la réalisation doit s'adapter aux exigences du musicien.</p>
						<p>Les étudiants, pendant ce projet, encadré par un professionnel,  participent à toutes les étapes d’une réalisation.</p>
					</div>
				</div>
			</div>
			<div id="aout" class="month l">
				<div class="left">
					<h3>
						Projet individuel
						<span>Aout</span>
					</h3>
					<div class="txt">
						<p>L'obtention du diplôme : « Bachelor Réalisateur Audiovisuel » est validé par un jury professionnel devant lequel chaque étudiant doit soutenir son projet individuel.</p>
						<p>Les étudiants réalisent individuellement en autonomie un portrait de trois minutes avec une thématique commune.</p>
					</div>
				</div>
				<div class="middle"></div>
				<div class="right">
					<div class="img">
						<img src="img/timeline/2.jpg">
					</div>
				</div>
			</div>
		</section>
		<section class="videos">
			<h2>Travaux de nos étudiants réalisateurs</h2>
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
		<script src="js/index.js"></script>
	</body>
</html>
