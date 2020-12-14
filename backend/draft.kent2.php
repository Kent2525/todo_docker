PHP復習

■

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
<!-- コンストラクタの正体：$変数 = new クラス名をした次点で強制的にコンストラクタが読み込まれる。 -->
<!-- コンストクタはインスタンスを作った時点で最低限必要とされる処理をそこに記載する事が多い。 -->
<!-- https://www.youtube.com/watch?v=YZS_RAYYeXQ -->

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
<!-- 上記のような $変数名 = newクラス名('引数, ...')のようなコードはインスタンス化と呼ぶ -->

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

■ require
 require('ファイル名');で他フォルダーのファイルを読み込む。Laravelのuseに似ている。
<!-- 例 -->
 require('data.php');
 その他に
 require_once('data.php'); <!-- 既にファイルが読み込まれていたらスキップしてくれる -->
 include('data.php'); <!-- requireは読み込めなかったら、エラーになるがincludeはならない。 -->
 include_once('data.php'); <!-- 処理をそのまま実行しつつ、既にファイルが読み込まれていたらスキップする -->

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

■ staticついて
staticは、簡単に言うと、クラスのインスタンスを生成することなしに、つまり、newせずに利用できるプロパティやメソッドのことです。
個別に値をずっと持たせておく必要のないとき(newしなくてよいとき)
クラスプロパティを使用する際に使う。クラスプロパティとはクラス内のプロパティの事。
【menu.php】
class Menu {
  public static $count = 4; <!-- ←4の数字を固定したい時に使う -->
}
  
【index.php】
require_once('menu.php');
<h3>メニュー<?php echo Menu::$count ?></h3> <!-- ←echo の際は、クラス名の後に::をつける -->

■ self
例えばインスタンスの数が増減する度に、インスタンスの数を表示したい。
selfを使ってクラスプロパティに直接アクセスする。

【menu.php】
class Menu {
  public static $count = 0;
  public function __construct(...) {
    ...
    self::$count++;
    <!-- ↑selfとはMenuクラスのこと -->
  }
}

staticなのでゲッターを設定する必要がある。
public static function getCount() {
  return self::$count;
}

【index.php】
<p><?php echo Menu::getCount() ?> 個</p>
<!-- 出力はインスタンスの数 個が出る。 -->

■ classで型を指定する
<?php 
// (strict_type=1);を付けないともし違った型がきた場合、エラーが出ない。
declare(strict_type=1);

class Main {
  private string $text;  // stringにする事によって、文字列しか受け付けなくなる
}

■ 定数（オブジェクト定数）
クラスに紐づいた定数を設定する事ができる。

public const VERSION = 0.1; // 定数は慣習的に大文字にする。public をprivateに変えても大丈夫。


