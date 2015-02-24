<h1>Congratulations!</h1>

<p>You're now flying with Phalcon. Great things are about to happen!</p>


<p>Hello View of BattleController</p>

<form action="create" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
<input type="file"  name="photo" id="photo1">
  <button>Create a Battle!</button>
</form>

<?php echo $this->tag->image("img/simpson.png"); ?>

<!-- only this one is rendering because it's an external resource -->
<?php echo Phalcon\Tag::image("http://s.glbimg.com/jo/g1/f/original/2014/06/26/giphy_2.gif");?>

<?php echo $this->tag->image(array('img/simpson.png')); ?>


<img src="img/simpson.png" alt="">
