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

■ publicとprivate

class Menu {
  public $name
  public function __construct($name) {
    $this->name = $name;
  }
}
$curry = new Menu('CURRY');
echo $curry->name;
<!-- public なので'CURRY'を出力する事ができる。 -->

class Menu {
  private $name
  public function __construct($name) {
    $this->name = $name;
  }
}
$curry = new Menu('CURRY');
echo $curry->name;
<!-- privateでアクセスできないのでエラーが発生。 -->

■ require_once
 require_once('ファイル名');で他フォルダーのファイルを読み込む。Laravelのuseに似ている。
<!-- 例 -->
 require_once('data.php');
 