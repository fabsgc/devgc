<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Profiler [{$data['url']}]</title>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="/{{path:IMAGE}}logo.png" />
		<gc:asset type="css" files="web/gcs/css/default.css,web/gcs/css/profiler.css" cache="3600"/>
	</head>
	<body>
		<header id="header">
			<div class="content">
				<h1 style="float:left">
					Injection Formulaire
				</h1>
			</div>
		</header>
		<div id="main">
			<div class="content">
				<form action="{{url:get}}" method="post">
					<input type="hidden" name="request-put"/>
					<input type="text" id="page" name="text" placeholder="entrez une valeur" />
					<input type="submit" value="envoyer"/>
				</form>
				<p>
					<gc:if condition="isset($request)">
						<gc:if condition="$request->valid()">
							<?php var_dump('aucune erreur en '.$request->data->method); ?>
						<gc:else/>
							<?php var_dump('des erreurs en '.$request->data->method); ?>
						</gc:if>
					</gc:if>
				</p>
			</div>
		</div>
		<script type="text/javascript">
			updateHeight();

			window.onresize = function(event) {
			updateHeight();
			};

			function updateHeight(){
			document.getElementById('main').style.height = window.innerHeight - document.getElementById('header').offsetHeight + "px";
			document.getElementById('page').style.width = window.innerWidth - 165 + "px";
			}

			function save(){
			document.getElementById('form').submit();
			}
		</script>
	</body>
</html>