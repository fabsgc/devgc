<gc:extends file="main"/>
<form action="{{url:get}}" method="post">
	<input type="hidden" name="request-put"/>
	<input type="text" id="form" name="text" placeholder="entrez une valeur" />
	<input type="submit" id="submit" value="envoyer"/>
</form>
<p>
	<gc:if condition="isset($request)">
		<gc:if condition="$request->valid()">
			<?php var_dump('aucune erreur en '.$request->data->method); ?>
		<gc:else/>
			<?php var_dump('des erreurs en '.$request->data->method); ?>

			<ul>
				<gc:foreach var="$request->errors()" as="$errors">
					<li><strong>{$errors['field']}</strong> : {$errors['message']}</li>
				</gc:foreach>
			</ul>
		</gc:if>
	</gc:if>
</p>