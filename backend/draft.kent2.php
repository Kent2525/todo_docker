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

■ construct応用
【menu.php】
public function __construct($name, $price, $image) {
    $this->name = $name;
    $this->price = $price;
    $this->image = $image;
  }

<!-- これで$menu->getName, $menu->getImage, $menu->getTaxInclubdeが使えるようになる。 -->
  public function getName() {
    return $this->name;
  }
  
  public function getImage() {
    return $this->image;
  }

  public function getTaxIncludedPrice() {
    return floor($this->price * 1.08);
  }

【data.php】
require_once('menu.php')
<!-- __constructの($name, $price, $image)の並びになっている -->
$juice = new Menu('JUICE', 600, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/juice.png');
$coffee = new Menu('COFFEE', 500, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/coffee.png');
$curry = new Menu('CURRY', 900, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/curry.png');
$pasta = new Menu('PASTA', 1200, 'https://s3-ap-northeast-1.amazonaws.com/progate/shared/images/lesson/php/pasta.png');


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
 
■ formについて
<form action="ファイル名" method="post">
</form>

■ submitについて
<input type="submit" value="送信する">

■ 継承extends
controllerに表記がある
class 子クラス名 extends 親クラス（継承名）
<!-- 例 -->
class TodoController extends Controller

■ セッター（setter)

class Menu{
  private $orderCount;

  <!-- privateの場合、クラスの外から値を変更できなくなる。下記は値を変更できるメソッド。set○○○と設定するのが一般的 -->
  public function setOrderCount($orderCount) {
    $this->orderCount = $orderCount;
  }
}