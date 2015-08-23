<gc:extends file="main"/>
<style>
  label{
    display:inline-block;
    width: 200px;
  }

  select  {
    width: 500px;
    padding: 8px;
    outline:none;
    margin-bottom: 8px;
  }
</style>
<form action="{{url:get}}" method="post" enctype="multipart/form-data">
<input type="hidden" name="request-post"/>
<label>Identifiant </label>
<input type="text" name="post.id" value="10"/><br />
<label>Contenu </label>
<input type="text" name="post.content" value="contenu"/><br />
<label>Article </label>
<select name="post.article">
	<gc:foreach var="$articles" as="$article">
		<option value="{$article->id}">{$article->title}</option>
	</gc:foreach>
</select><br />
<input type="submit" id="submit" value="envoyer"/><br />
</form>
<p>
<gc:if condition="isset($post)">
	<?php print_r($post->fields()); ?>
	test
</gc:if>
</p>