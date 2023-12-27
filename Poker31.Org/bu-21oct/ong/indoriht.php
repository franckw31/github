<!DOCTYPE html>
<html>

<head>
	<title>Astuce et effet CSS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="css/mes-styles.css2">
	<link rel="stylesheet" href="css/les-styles.css2">
</head>

<body>

	<div id="entete">
		<!-- <input type="button" class="btnMenu" value="Bonbache.fr" onclick="Javascript:window.open('https://www.bonbache.fr/','_blank');" />
<input type="button" class="btnMenu" value="Bonbache.fr/Javascript" onclick="Javascript:window.open('https://www.bonbache.fr/formation-technique-javascript-3-9.html','_blank');" />
<input type="button" class="btnMenu" value="Bonbache.fr/PHP" onclick="Javascript:window.open('https://www.bonbache.fr/formation-technique-php-3-7.html','_blank');" />
<input type="button" class="btnMenu" value="Bonbache.fr/CSS" onclick="Javascript:window.open('https://www.bonbache.fr/formation-technique-css-3-10.html','_blank');" /> -->
	</div>

	<div class="calque">
		Sections et onglets Css
	</div>

	<div id="btn">
		<div style="background-color:#2b579a;" class="rond">
		</div>
		<br />
		<div style="background-color:#777bb5;width:35px;height:35px;" class="rond">
		</div>
		<br />
		<div style="background-color:#d1ae42;width:25px;height:25px;" class="rond">
		</div>
	</div>

	<div id="conteneur">
		<div id="contenu">
			<div id="auCentre">
				<div id="bMenu">
					<a href="#" id="css" class="btn" onmouseover="afficher('css')">Css</a>
					<a href="#" id="js" class="btn" onmouseover="afficher('js')">JS</a>
					<a href="#" id="php" class="btn" onmouseover="afficher('php')">Php</a>
				</div>
				<div id="bSection">
					<div id="cssE" class="rubrique bgImg" style="background-image:url(img/logo-css.png);">
						Les <strong>CSS</strong> sont des <strong>feuilles de style en cascade</strong> :
						<strong>Cascading Style Sheets</strong>. On les exploite pour définir les attributs des
						<strong>éléments Html</strong> qui composent les pages d'un <strong>site Web</strong>.
						Conventionnellement, on les lie et on les déclare dans l'entête de la page, la <strong>section
							head</strong>. Ils sont ainsi externalisés pour être exploités par <strong>toutes les pages
							du site</strong>.<br /><br />
						C'est une excellente manière de normaliser les réglages de <strong>mise en forme</strong> et de
						<strong>mise en page</strong>. Mais c'est aussi une excellente façon d'optimiser les travaux de
						retouche. La moindre modification sur l'un des <strong>styles</strong> est ainsi automatiquement
						répercutée sur toutes les pages qui l'utilisent.<br /><br />
						<a href='https://www.bonbache.fr/effet-d-animation-entrant-sur-un-texte-en-css-665.html'
							target='_blank'><u>En savoir plus</u></a>
					</div>
					<div id="jsE" class="rubrique bgImg" style="background-image:url(img/logo-javascript.png);">
						Le <strong>code Javascript</strong> est ce que l'on appelle un <strong>code client</strong>. Il
						s'exécute sur la machine de l'internaute connecté au site internet. Il ne sollicite donc pas le
						serveur. Il permet des interactions avec l'utilisateur mais ne peut pas rendre des pages
						dynamiques comme le feraient le PHP ou l'ASP.Net qui permettent de solliciter le serveur et ses
						bases de données pour fournir des résultats contextuels.<br /><br />
						Lorsque nous développons des <strong>sites internet</strong>, il est très important d'équilibrer
						les charges. Si pour chaque demande, le serveur est sollicité et que le site jouit d'un trafic
						dense, ces sollicitations seront multipliées par le nombre d'internautes en cours de navigation.
						Le risque est d'engorger rapidement les ressources, d'allonger les temps de réponse, voire de
						faire tomber le <strong>serveur</strong>.<br /><br />
						<a href='https://www.bonbache.fr/debuter-la-programmation-web-en-javascript-220.html'
							target='_blank'><u>En savoir plus</u></a>
					</div>
					<div id="phpE" class="rubrique bgImg" style="background-image:url(img/logo-php.png);">
						.
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="calque" id="pied">
		Sources issues du <a href="https://www.bonbache.fr/" target="_blank">site Bonbache.fr</a> - Formations
		informatiques en vidéos : <a href="https://www.youtube.com/channel/UCW-_iHbGuZG9nsE8D76lpIQ"
			target="_blank">Chaîne Youtube Stéphane Rossetti</a>.
	</div>
	<script type="text/javascript" language="javascript">
		function afficher(id) {
			var leCalque = document.getElementById(id);
			var leCalqueE = document.getElementById(id + "E");

			document.getElementById("cssE").className = "rubrique bgImg";
			document.getElementById("jsE").className = "rubrique bgImg";
			document.getElementById("phpE").className = "rubrique bgImg";

			document.getElementById("css").className = "btn";
			document.getElementById("js").className = "btn";
			document.getElementById("php").className = "btn";

			leCalqueE.className += " montrer";
			leCalque.className = "btnA";
		}
	</script>
	<script type="text/javascript" language="javascript">
		afficher('css');
	</script>
</body>

</html>