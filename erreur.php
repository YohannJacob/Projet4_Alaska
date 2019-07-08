<?php
	// Gestion des erreurs de formulaires de la page d'inscription
	// Si tout est KO
	if (($verifPseudo === true && $verifMail === true) && ($_POST['pass'] != $_POST['passVerif'])) {
		$errorCreatePseudo = "<p style=\"color: red;\">Ce pseudo existe déjà !</p>";
		$errorCreateMail = "<p style=\"color: red;\">Cet email existe déjà !</p>";
		$errorCreateMdp = "<p style=\"color: red;\">Les mots de passe ne correspondent pas !</p>";
	// Si pseudo et mail sont KO
	} elseif ($verifPseudo === true && $verifMail === true) {
		$errorCreatePseudo = "<p style=\"color: red;\">Ce pseudo existe déjà !</p>";
		$errorCreateMail = "<p style=\"color: red;\">Cet email existe déjà !</p>";
	// si pseudo et mot de passe sont KO
	} elseif ($verifPseudo === true && $_POST['pass'] != $_POST['passVerif']) {
		$errorCreatePseudo = "<p style=\"color: red;\">Ce pseudo existe déjà !</p>";
		$errorCreateMdp = "<p style=\"color: red;\">Les mots de passe ne correspondent pas !</p>";
	// si pseudo est KO
	} elseif ($verifPseudo === true) {
		$errorCreatePseudo = "<p style=\"color: red;\">Ce pseudo existe déjà !</p>";
	// si mail et mot de passe sont KO
	} elseif ($verifMail === true && ($_POST['pass'] != $_POST['passVerif'])) {
		$errorCreateMail = "<p style=\"color: red;\">Cet email existe déjà !</p>";
		$errorCreateMdp = "<p style=\"color: red;\">Les mots de passe ne correspondent pas !</p>";
	// si mail est KO
	} elseif ($verifMail === true) {
		$errorCreateMail = "<p style=\"color: red;\">Cet email existe déjà !</p>";
	// Si mot de passe est KO
	} elseif (($_POST['pass'] != $_POST['passVerif'])) {
		$errorCreateMdp = "<p style=\"color: red;\">Les mots de passe ne correspondent pas !</p>";
    }
    elseif (!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])) {
		$errorCreateMailForm = "<p style=\"color: red;\">Le mail n'est pas valide !</p>";
    }


?>