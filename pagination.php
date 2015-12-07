
<?php
/**
 * Affiche la pagination � l'endroit o� cette fonction est appel�e
 * @param string $url L'URL ou nom de la page appelant la fonction, ex: 'index.php' ou 'http://example.com/'
 * @param string $link La nom du param�tre pour la page affich�e dans l'URL, ex: '?page=' ou '?&p='
 * @param int $total Le nombre total de pages
 * @param int $current Le num�ro de la page courante
 * @param int $adj (facultatif) Le nombre de pages affich�es de chaque c�t� de la page courante (d�faut : 3)
 * @return La cha�ne de caract�res permettant d'afficher la pagination
 */
function paginate($url, $link, $total, $current, $adj=3) {
    // Initialisation des variables
    $prev = $current - 1; // num�ro de la page pr�c�dente
    $next = $current + 1; // num�ro de la page suivante
    $penultimate = $total - 1; // num�ro de l'avant-derni�re page
    $pagination = ''; // variable retour de la fonction : vide tant qu'il n'y a pas au moins 2 pages

    if ($total > 1) {
        // Remplissage de la cha�ne de caract�res � retourner
        $pagination .= "<div class=\"pagination\">\n";

        /* =================================
         *  Affichage du bouton [pr�c�dent]
         * ================================= */
        if ($current == 2) {
            // la page courante est la 2, le bouton renvoie donc sur la page 1, remarquez qu'il est inutile de mettre $url{$link}1
            $pagination .= "<a href=\"{$url}\">?</a>";
        } elseif ($current > 2) {
            // la page courante est sup�rieure � 2, le bouton renvoie sur la page dont le num�ro est imm�diatement inf�rieur
            $pagination .= "<a href=\"{$url}{$link}{$prev}\">?~#</a>";
        } else {
            // dans tous les autres, cas la page est 1 : d�sactivation du bouton [pr�c�dent]
            $pagination .= '<span class="inactive">?</span>';
        }

        /**
         * D�but affichage des pages, l'exemple reprend le cas de 3 num�ros de pages adjacents (par d�faut) de chaque c�t� du num�ro courant
         * - CAS 1 : il y a au plus 12 pages, insuffisant pour faire une troncature
         * - CAS 2 : il y a au moins 13 pages, on effectue la troncature pour afficher 11 num�ros de pages au total
         */

        /* ===============================================
         *  CAS 1 : au plus 12 pages -> pas de troncature
         * =============================================== */
        if ($total < 7 + ($adj * 2)) {
            // Ajout de la page 1 : on la traite en dehors de la boucle pour n'avoir que index.php au lieu de index.php?p=1 et ainsi �viter le duplicate content
            $pagination .= ($current == 1) ? '<span class="active">1</span>' : "<a href=\"{$url}\">1</a>"; // Op�rateur ternaire : (condition) ? 'valeur si vrai' : 'valeur si fausse'

            // Pour les pages restantes on utilise it�re
            for ($i=2; $i<=$total; $i++) {
                if ($i == $current) {
                    // Le num�ro de la page courante est mis en �vidence (cf. CSS)
                    $pagination .= "<span class=\"active\">{$i}</span>";
                } else {
                    // Les autres sont affich�es normalement
                    $pagination .= "<a href=\"{$url}{$link}{$i}\">{$i}</a>";
                }
            }
        }
        /* =========================================
         *  CAS 2 : au moins 13 pages -> troncature
         * ========================================= */
        else {
            /**
             * Troncature 1 : on se situe dans la partie proche des premi�res pages, on tronque donc la fin de la pagination.
             * l'affichage sera de neuf num�ros de pages � gauche ... deux � droite
             * 1 2 3 4 5 6 7 8 9 � 16 17
             */
            if ($current < 2 + ($adj * 2)) {
                // Affichage du num�ro de page 1
                $pagination .= ($current == 1) ? "<span class=\"active\">1</span>" : "<a href=\"{$url}\">1</a>";

                // puis des huit autres suivants
                for ($i = 2; $i < 4 + ($adj * 2); $i++) {
                    if ($i == $current) {
                        $pagination .= "<span class=\"active\">{$i}</span>";
                    } else {
                        $pagination .= "<a href=\"{$url}{$link}{$i}\">{$i}</a>";
                    }
                }

                // ... pour marquer la troncature
                $pagination .= '&hellip;';

                // et enfin les deux derniers num�ros
                $pagination .= "<a href=\"{$url}{$link}{$penultimate}\">{$penultimate}</a>";
                $pagination .= "<a href=\"{$url}{$link}{$total}\">{$total}</a>";
            }
            /**
             * Troncature 2 : on se situe dans la partie centrale de notre pagination, on tronque donc le d�but et la fin de la pagination.
             * l'affichage sera deux num�ros de pages � gauche ... sept au centre ... deux � droite
             * 1 2 � 5 6 7 8 9 10 11 � 16 17
             */
            elseif ( (($adj * 2) + 1 < $current) && ($current < $total - ($adj * 2)) ) {
                // Affichage des num�ros 1 et 2
                $pagination .= "<a href=\"{$url}\">1</a>";
                $pagination .= "<a href=\"{$url}{$link}2\">2</a>";
                $pagination .= '&hellip;';

                // les pages du milieu : les trois pr�c�dant la page courante, la page courante, puis les trois lui succ�dant
                for ($i = $current - $adj; $i <= $current + $adj; $i++) {
                    if ($i == $current) {
                        $pagination .= "<span class=\"active\">{$i}</span>";
                    } else {
                        $pagination .= "<a href=\"{$url}{$link}{$i}\">{$i}</a>";
                    }
                }

                $pagination .= '&hellip;';

                // et les deux derniers num�ros
                $pagination .= "<a href=\"{$url}{$link}{$penultimate}\">{$penultimate}</a>";
                $pagination .= "<a href=\"{$url}{$link}{$total}\">{$total}</a>";
            }
            /**
             * Troncature 3 : on se situe dans la partie de droite, on tronque donc le d�but de la pagination.
             * l'affichage sera deux num�ros de pages � gauche ... neuf � droite
             * 1 2 � 9 10 11 12 13 14 15 16 17
             */
            else {
                // Affichage des num�ros 1 et 2
                $pagination .= "<a href=\"{$url}\">1</a>";
                $pagination .= "<a href=\"{$url}{$link}2\">2</a>";
                $pagination .= '&hellip;';

                // puis des neuf derniers num�ros
                for ($i = $total - (2 + ($adj * 2)); $i <= $total; $i++) {
                    if ($i == $current) {
                        $pagination .= "<span class=\"active\">{$i}</span>";
                    } else {
                        $pagination .= "<a href=\"{$url}{$link}{$i}\">{$i}</a>";
                    }
                }
            }
        }

        /* ===============================
         *  Affichage du bouton [suivant]
         * =============================== */
        if ($current == $total)
            $pagination .= "<span class=\"inactive\">?</span>\n";
        else
            $pagination .= "<a href=\"{$url}{$link}{$next}\">?</a>\n";

        // Fermeture de la <div> d'affichage
        $pagination .= "</div>\n";
    }

    return ($pagination);
}

function curPageURL() {
    $pageURL = 'http';
    if (isset( $_SERVER["HTTPS"] ) && $_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}
?>