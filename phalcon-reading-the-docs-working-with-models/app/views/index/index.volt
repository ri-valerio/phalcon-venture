<h1>Congratulations!</h1>

<p>You're now flying with Phalcon. Great things are about to happen!</p>

{{ link_to ('index/find','Go to find Action') }}
<br>

<hr>

{{ link_to ('index/save','Go to save Action') }}
<br>
{{ link_to ('index/create','Go to create Action') }}
<br>
{{ link_to ('index/update','Go to update Action') }}
<br>

<hr>

{{ link_to ('index/delete','Go to delete Action') }}
<br>
{{ link_to ('index/bazinga','Go to bazinga Action') }}

<br>
<br>

<form action="index/formSave" method="POST" accept-charset="utf-8">
	<label>instituicao:<input type="text" name="instituicao" value=""></label>
	<label>foto_instituicao:<input type="text" name="foto_instituicao" value=""></label>
	<label>datetime_acordo:<input type="date" name="datetime_acordo" value=""></label>
	<input type="submit" value="submit">
</form>

<hr>
<br>

<?php foreach ($familia as $parente => $nome): ?>
	<?php echo $parente . " - " . $nome . "<br>"; ?>
<?php endforeach ?>

<hr>
<?php echo $eu; ?>
<hr>
<?php foreach ($cidades as $cidade): ?>
	<?php echo $cidade . "<br>"; ?>
<?php endforeach ?>
