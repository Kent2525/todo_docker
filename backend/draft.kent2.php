<!-- PHP復習 -->

<!-- ■ foreach -->
<?php foreach ($menus as $menu): ?>
  <h3><?php echo $menu->name ?></h3>
<?php endforeach ?>
<!-- :を入れたり、endforeachの場所など注意が必要。 -->
