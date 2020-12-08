PHP復習

■ foreach
<?php foreach ($menus as $menu): ?>
  <h3><?php echo $menu->name ?></h3>
<?php endforeach ?>
:を入れたり、endforeachの場所など注意が必要。

■ construct
class Man
{
	protected  $name;
	function __construct()	{
    <!-- 行いたい処理を書く。この場合、Man = 鈴木となる。-->
		$this->name = "鈴木";
	}
	function show() {
		echo $this->name;
	}
}

$seito = new Man();
$seito->show();
<!-- showの結果、鈴木が出力される。 -->