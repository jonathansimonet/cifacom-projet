<?php
require 'include/lessc.php';
try {
    lessc::ccompile('less/monteur-truquiste.less', 'css/monteur-truquiste.css');
}
catch (exception $ex) {
    exit('lessc fatal error:'.$ex->getMessage());
}
require 'include/Config.php';
require 'include/MysqliRessource.php';
require 'include/ModelMysqli.php';
require 'include/ProjetMysqli.php';
$projetMysqli = new ProjetMysqli();
$projets = $projetMysqli->selectLast3Mt();
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Formation Monteur Truquiste - Cifa3com</title>
		<meta name="description" content="">
		<link rel="stylesheet" href="css/normalize.min.css">
		<link rel="stylesheet" href="css/base.css">
		<link rel="stylesheet" href="css/monteur-truquiste.css">
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
					<li><a href="formation-realisateur-audiovisuel.php">Formation Réalisateur</a></li>
					<li><a href="formation-monteur-truquiste.php" class="active">Formation monteur truquiste</a></li>
					<li><a href="projets-realises.php">Projets réalisés</a></li>
					<li><a href="#contact">Contactez-nous</a></li>
					<li><a href="equipe-pedagogique.php">Equipe pédagogique</a></li>
				</ul>
			</nav>
		</header>
		<section class="presentation">
			<div class="bg" style="background-image:url('img/slide3.jpg')"></div>
			<h1>
				<span>
					<span>Formation</span>
					<br>Monteur Truquiste
				</span>
				<small>Bachelor Monteur Truquiste formation Bac+3 reconue</small>
			</h1>
			<div class="desc">
				<h2>Profils</h2>
				<p>
					Bac + 2 en montage (BTS ou équivalent)
					<br>Curieux, réactifs et passionnés de cinéma
				</p>
				<h2 style="margin-top:2em">Objectifs</h2>
				<p>
					• Maîtriser les workflows de la post-production cinématographique et audiovisuel
					<br>• Maîtriser les outils de montage, trucage et graphisme
					<br>• Maîtriser le langage esthétique du montage
				</p>
			</div>
		</section>
		<section id="presentation">
			<h2>Présentation du cursus Monteur Truquiste</h2>
			<p>
				Maitrise des workflows de la post-production cinématographique et audiovisuelle.
				<br>Acquérir l'essentiel des outils de montage, trucage	et graphique nécessaire pour être opérationnel dans la dynamique technologique professionnelle de l'audiovisuel.
				<br>Appréhender les différentes esthétiques	 du montage en fonction des différentes	typologies existantes.
			</p>
			<p>La formation monteur truquiste a pour objectif de former les professionnels spécialisés dans l’art du montage et des effets spéciaux, qui maîtrise l’ensemble du processus de la postproduction d’un film depuis l’importation des rushes au PAD final en passant par le montage son et les effets spéciaux. Le programme permettra de :</p>
			<p>• Se perfectionner dans la maîtrise des différents logiciels de montage image et son
			<br>• Acquérir et élargir la maîtrise des logiciels d’effets spéciaux numériques
			<br>• Approfondir les principes de l’esthétique du montage pour les différents genres cinématographiques et audiovisuels • Comprendre et acquérir les principes de l’étalonnage professionnel
			<p>Le monteur truquiste intervient dans presque tous les films, quel que soit le genre. Mais il peut également s’occuper de l’habillage des chaînes et des émissions télévisées, et est omniprésent dans la publicité. Il travaille seul ou à la demande pour les petites productions, 2 et est sous l’autorité du directeur des effets spéciaux pour les grosses productions ou directement du réalisateur.</p>
		</section>
		<section id="tps_forts">
			<h2>Temps forts</h2>
			<p>
				<span>Novembre :</span> Projet Jingle AE
				<br><span>Décembre :</span> Projet documentaire FCPX
				<br><span>Janvier :</span> Projet Bande annonce CS6
				<br><span>Février :</span> Fiction Avid
				<br><span>Mars :</span> Module étalonnage
				<br><span>Avril - Mai – Juin :</span> Projet publicitaire
				<br><span>Juillet - Septembre :</span> Projet de fin d’année
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
			<h2>Voici la timeline de la formation Monteur Truquiste</h2>
			<div id="mois_fixed">
				<ul>
					<li><a href="#novembre">Novembre</a></li>
					<li><a href="#decembre">Décembre</a></li>
					<li><a href="#janvier">Janvier</a></li>
					<li><a href="#fevrier">Février</a></li>
					<li><a href="#mars">Mars</a></li>
					<li><a href="#avril">Avril</a></li>
					<li><a href="#mai">Mai</a></li>
					<li><a href="#juin">Juin</a></li>
					<li><a href="#juillet">Juillet</a></li>
					<li><a href="#septembre">Septembre</a></li>
					<li><a href="#octobre">Octobre</a></li>
				</ul>
			</div>
			<div id="novembre" class="month r">
				<div class="left">
					<div class="img">
						<img src="img/timeline/5.jpg">
					</div>
				</div>
				<div class="middle"></div>
				<div class="right">
					<h3>
						Module projet 1 «Habillage Graphique - Jingle»
						<span>Novembre</span>
					</h3>
					<div class="txt">
						<p>Création d’un jingle avec animation d’un logo publicitaire.</p>
						<p><span>Pratique des logiciels:</span> Illustrator - Photoshop et After Effects Pratique du «Stop Motion»
						<p>
							<span>10 jours</span>
							<br>Présentation du paysage audiovisuel et des différents Workflow de la Production à la Post- production. Notion de «Loader numérique» et rappels des formats et codecs.
						</p>
						<p>
							<span>Objectif :</span>
							<br>Créer un jingle (Titre de magazine, présentation Association...) à savoir écrire le scénario et le tourner en stop motion, créer un logo en vectoriel sur Illustrator, préparer des photos pour les décors et retoucher le «Stop motion» sur Photoshop, afin d’animer l’ensemble sur After Effects.
							<br>C’est aussi découvrir les fonctionnalités d’animation, de compositing et de trucage (2D & 3D), afin d’acquérir un savoir-faire dans la conception et la gestion de projets impliquant des effets numériques avec After Effects.
						</p>
					</div>
				</div>
			</div>
			<div id="decembre" class="month l">
				<div class="left">
					<h3>
						Module projet 2 «Documentaire»
						<span>Décembre</span>
					</h3>
					<div class="txt">
						<p>Montage d’un documentaire sur Final Cut Pro X, pratique de Motion pour l’habillage et de Compressor pour les exportations.</p>
						<p><span>Pratique des logiciels :</span> Final Cut Pro X</p>
						<p><span>10 jours</span></p>
						<p>
							<span>Objectif :</span>
							<br>Ce module a plusieurs objectifs, acquérir les principes du montage et de l’esthétique d’un documentaire, maitriser le logiciel de montage FCP X pour acquérir une bonne méthode de production et se perfectionner sur la technique du montage et du mixage.
							<br>Tout le travail se fera essentiellement sur le logiciel de montage, l’habillage se fera sur motion et les exports se feront avec Compressor.
						</p>
					</div>
				</div>
				<div class="middle"></div>
				<div class="right">
					<div class="img">
						<img src="img/timeline/6.jpg">
					</div>
				</div>
			</div>
			<div id="janvier" class="month r">
				<div class="left">
					<div class="img">
						<img src="img/timeline/7.jpg">
					</div>
				</div>
				<div class="middle"></div>
				<div class="right">
					<h3>
						Module projet 3 «Bande-Annonce»
						<span>Janvier</span>
					</h3>
					<div class="txt">
						<p>Montage d’une bande-annonce sur Première Pro avec Habillage graphique sur After Effects, mixage sur Audition, exportation avec Media Encoder.</p>
						<p><span>Pratique des logiciels :</span> Première Pro</p>
						<p><span>10 jours</span></p>
						<p>
							<span>Objectif :</span>
							<br>Ce module a plusieurs objectifs, acquérir les principes du montage et de l’esthétique d’une bande-annonce, maitriser le logiciel de montage Première Pro pour acquérir une bonne méthode de production, mixer sur le logiciel Audition, se perfectionner sur le logiciel After Effects, et mieux appréhender la notion de Worflow «ouvert» avec le Dynamic Link.
						</p>
					</div>
				</div>
			</div>
			<div id="fevrier" class="month l">
				<div class="left">
					<h3>
						Module projet 4 «Montage Fiction»
						<span>Février</span>
					</h3>
					<div class="txt">
						<p>Montage d’un court-métrage de fiction.</p>
						<p><span>Pratique des logiciels :</span> AVID</p>
						<p><span>10 jours</span></p>
						<p>
							<span>Objectif :</span>
							<br>Ce module a plusieurs objectifs, acquérir les fondamentaux de l’esthétique du montage, maitriser le logiciel de montage AVID pour acquérir une bonne méthode de production et se perfectionner sur la technique du montage et du mixage.
							<br>En principe trois jours seront consacrés au mixage sur «Protools», deux jours pour découvrir le logiciel et un jour pour mixer le sujet avec un étudiant «son» (si possible ?).
						</p>
					</div>
				</div>
				<div class="middle"></div>
				<div class="right">
					<div class="img">
						<img src="img/timeline/8.jpg">
					</div>
				</div>
			</div>
			<div id="mars" class="month r">
				<div class="left">
					<div class="img">
						<img src="img/timeline/2.jpg">
					</div>
				</div>
				<div class="middle"></div>
				<div class="right">
					<h3>
						Module technique 1 «Etalonnage»
						<span>Mars</span>
					</h3>
					<div class="txt">
						<p>Da Vinci Resolve et Speed Grade - MARS Étalonnage professionnel des films montés dans les modules précédents.</p>
						<p><span>5 jours</span></p>
						<p><span>Objectif :</span>
						<br>Ce module a pour objectif d’acquérir les principes de l’étalonnage professionnel à travers l’apprentissage de deux logiciels «Da Vinci Resolve» et «Speed Grade». Il a aussi pour but d’appréhender les Workflow entre les différents logiciels via le XML, les EDL et les fichiers clips.</p>
					</div>
				</div>
			</div>
			<div id="avril" class="month l">
				<div class="left">
					<h3>
						Module technique 2 «VFX»
						<span>Avril</span>
					</h3>
					<div class="txt">
						<p><span>Pratique des logiciels :</span> Smoke, Fusion 7, Nuke</p>
						<p><span>10 jours</span></p>
						<p>
							<span>Objectif :</span>
							<br>Ce module a pour ambition de maitriser les bases du logiciel haut de gamme de compositing et de création d’effets visuels «SMOKE» ou «FUSION7» ou «NUKE» et optimiser son exploitation pour le traite
						</p>
					</div>
				</div>
				<div class="middle"></div>
				<div class="right">
					<div class="img">
						<img src="img/timeline/9.jpg">
					</div>
				</div>
			</div>
			<div id="mai" class="month r">
				<div class="left">
					<div class="img">
						<img src="img/timeline/10.jpg">
					</div>
				</div>
				<div class="middle"></div>
				<div class="right">
					<h3>
						Module projet 5 «Pub»
						<span>Mai</span>
					</h3>
					<div class="txt">
						<p>Création et / ou Montage d’une «PUB»</p>
						<p><span>Pratique des logiciels :</span> Smoke, Fusion 7, Nuke</p>
						<p><span>5 jours</span></p>
						<p><span>Objectif :</span>
						<br>Le logiciel de montage reste au choix de l’étudiant.
						<br>Ce module a plusieurs objectifs, acquérir les fondamentaux de l’esthétique du montage d’une «PUB», et mettre en œuvre l’utilisation du logiciel haut de gamme de compositing et de création d’effets visuels.</p>
					</div>
				</div>
			</div>
			<div id="juin" class="month l">
				<div class="left">
					<h3>
						Module technique 3 «mixage» s- Pro Tools
						<span>Juin</span>
					</h3>
					<div class="txt">
						<p><span>5 jours</span></p>
						<p>
							<span>Objectif :</span>
							<br>Ce module permettra de finaliser le montage son et le mixage du projet PUB, il a aussi pour ambition de maitriser les bases du logiciel de mixage Audio «PRO TOOLS».
						</p>
					</div>
				</div>
				<div class="middle"></div>
				<div class="right">
					<div class="img">
						<img src="img/timeline/11.jpg">
					</div>
				</div>
			</div>
			<div id="juillet" class="month r">
				<div class="left">
					<div class="img">
						<img src="img/timeline/12.jpg">
					</div>
				</div>
				<div class="middle"></div>
				<div class="right">
					<h3>
						Module Projet 6 Modélisation 3D
						<span>Juillet</span>
					</h3>
					<div class="txt">
						<p><span>Pratique des logiciels :</span> MAYA, 3DS MAX, BLENDER</p>
						<p><span>10 jours</span></p>
						<p><span>Objectif :</span>
						<br>Maîtriser l’ensemble des techniques de fabrication 3D pour l’animation.</p>
					</div>
				</div>
			</div>
			<div id="septembre" class="month l">
				<div class="left">
					<h3>
						Module Projet 7 «montage clip» Projet de fin d’année
						<span>Septembre</span>
					</h3>
					<div class="txt">
						<p><span>Pratique des logiciels :</span> Montage examen «CLIP» avec VFX Mise en application de la 3D et du stop motion.</p>
						<p><span>10 jours</span></p>
						<p>
							<span>Objectif :</span>
							<br>Chaque étudiant doit monter un «CLIP» en autonomie. Il doit capter et traduire l’univers d’une musique, d’une chanson (trouver un concept original et adapté: la recherche artistique).
							<br>Il a 10 jours pour illustrer, animer, monter, mixer et étalonner ce CLIP. Le principe de cet examen est de pouvoir évaluer l’ensemble des acquis.
						</p>
					</div>
				</div>
				<div class="middle"></div>
				<div class="right">
					<div class="img">
						<img src="img/timeline/13.jpg">
					</div>
				</div>
			</div>
			<div id="octobre" class="month r">
				<div class="left">
					<div class="img">
						<img src="img/timeline/14.jpg">
					</div>
				</div>
				<div class="middle"></div>
				<div class="right">
					<h3>
						Soutenance devant un jury professionnel
						<span>Octobre</span>
					</h3>
					<div class="txt">
						<p><span>2 jours</span></p>
						<p>
							<span>Soutenance de 40’</span>
							<br>Visionnage du CLIP, analyse critique de l’étudiant et questions esthétiques et techniques du jury.
							<br>Rapport de stage présenté sous forme de «bande démo» avec habillage graphique, et présentation orale.
							<br>Le jury notera le projet «Clip» et le rapport de stage.
							<br>Tous les projets de montage se feront individuellement, ils seront encadrés et notés par le formateur.
						</p>
					</div>
				</div>
			</div>
		</section>
		<section class="videos">
			<h2>Travaux de nos étudiants Monteur/Truqiste</h2>
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
