<?php
/**
 * Classe de gestion des paramètres de configuration
 *
 * Inspirée de la classe de Frédéric Guillot
 * (https://github.com/fguillot)
 *
 * @author Raphaël Couderc
 * @version 0.1.0 Première version
 * @date 28/02/2015
 */
class Config {

	/**
	 * @var array Tableau des paramètres de configuration
	 */
	private static $_parametres;

	/**
	 * Renvoie la valeur d'un paramètre de configuration
	 *
	 * @param string $nom Nom du paramètre
	 * @param string $defaut Valeur à renvoyer par défaut
	 * @return string Valeur du paramètre
	 */
	public static function get($nom, $defaut = null) {
		if (isset(self::getParametres()[$nom])) {
			$valeur = self::getParametres()[$nom];
		}
		else {
			$valeur = $defaut;
		}
		return $valeur;
	}

	/**
	 * Renvoie le tableau des paramètres en le chargeant au besoin depuis un fichier de configuration.
	 * Les fichiers de configuration recherchés sont include/dev.ini et include/prod.ini (dans cet ordre)
	 *
	 * @return array Tableau des paramètres
	 * @throws Exception Si aucun fichier de configuration n'est trouvé
	 */
	private static function getParametres() {
		if (self::$_parametres == null) {
			$cheminFichier = "include/dev.ini";
            if (!file_exists($cheminFichier)) {
                $cheminFichier = "include/prod.ini";
            }
            if (!file_exists($cheminFichier)) {
                throw new Exception("Aucun fichier de configuration trouvé");
            }
            else {
                self::$_parametres = parse_ini_file($cheminFichier);
            }
		}
		return self::$_parametres;
	}
}
