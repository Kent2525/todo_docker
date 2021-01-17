PHP復習

■ printf
文字列、整数値、浮動小数点数など、指定したフォーマットを出力する。
%sは文字列(string), %dは整数値(integer), %fは浮動少数点数(double)
＜例１＞
printf("%s 君は %s を %d 個食べました。", "太郎", "りんご", 7)
<!-- 出力結果：太郎君はりんごを7個たべました。 -->

printf ('%s %s %s', 'Hellow', 'World', '!!');
printf('今日は %d年%d月%d日です。<br/>', date('Y'),date('m'),date('d'));
<!-- 出力結果：Hello World !! -->
<!-- 出力結果：今日は2020年12月19日です。 -->

■ プロパティ
クラス内で指定した変数が使用できるように宣言すること。

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
<!-- construct()内の変数はnewで受け取った値 -->
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

■ publicとprivate（アクセス修飾子）

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

■ゲッターとセッター（getter and setter）
ゲッターはプロパティがprivateの時に使用する。viewなどでプロパティ（変数）を表示したい時などに使用。
一方、セッターはユーザーがformなどで情報を送信してきた時に行う処理。
【index.php】
<!DOCTYPE html>
<p>この名前は<?php echo $menu->getName() ?>です。</p>
<form action="ファイル名" method="post" name="order">
  ........
  <input type="submit" value="送信する">
</form>

【menu.php】
class Menu {
  private $name;
  private $price;

  public function __construct($name, $price) {
    $this->name = $name;
    $this->price = $price;
  }

  <!-- $nameに代入された値をindex.phpなどのviewで使えるようにしている -->
  public function getName() {
    return $this->name;
  }

  <!-- $orderCountにformで送られてきた情報が入った状態で使えるようにしている -->
  pucblic function setOrderCount($orderCount) {
    $this->orderCount = $orderCount;
  }
}

【confirm.php】
<!-- $orderCountにユーザーが送ってformの情報を代入している。 -->
<!-- $_POSTはformから送られてきた情報を受け取る役割を持っている -->
<?php $orderCount = $_POST[$menu->getName()]?>


■ ゲッターとセッターについて part.2

ゲッターは読み込み専用、セッターは書き込み専用。
public function getType() {
  return $this->type;
}

public function setType() {
  $this->type = $type;
}

■ submitについて
<input type="submit" value="送信する">



■ 継承extends
controllerに表記がある
class 子クラス名 extends 親クラス（継承名）
<!-- 例 -->
class TodoController extends Controller


■ staticついて
staticは、簡単に言うと、クラスのインスタンスを生成することなしに、つまり、newせずに利用できるプロパティやメソッドのこと。
個別に値をずっと持たせておく必要のないとき(newしなくてよいとき)
クラスプロパティを使用する際に使う。クラスプロパティとはクラス内のプロパティの事。
【menu.php】
class Menu {
  public static $count = 4; <!-- ←4の数字を固定したい時に使う -->
}
  
【index.php】
require_once('menu.php');
<h3>メニュー<?php echo Menu::$count ?></h3> <!-- クラスプロパティにアクセスする場合はクラス名の後に::をつける -->

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

■ クエリ(query)
クエリとはDBに対して問い合わせ（命令・処理要求）を行うこと または検索エンジンに入力する検索ワードのこと。
今回はURLの末尾に情報を載せるように使っていく。
【index.php】
// このリンクをクリックした先のURLの末尾がgetNameで取得した情報が表示される。
<a href="show.php?name=<?php echo $menu->getName() ?>">

【show.php】
// $_GETを使用する事でクエリ情報を受け取る事ができる。
$menuName = $_GET['name'];
<p><?php echo $menuName ?>の詳細ページです</p>

■ findByNameメソッド（特定のインスタンスの取得）
クリックして別のページに遷移した時に、その先の情報を取得して表示しなくてはならない。
$_GETを使用したことによって名前はわかっているので、その名前からインスタンスを取得する
【show.php】
$menus = array('juice', 'coffee', 'curry', 'pasta');
// これで$menuをshow.phpで使った時にfindByNameのロジックが発動する。
$menu = Menu::findByName($menus, $menuName);

【Menu.php】
public static function findByName($menus, $name) {
  foreach ($menus as $menu) {
    if ($menu->getName() == $name) {
      return $menu;
    }
  }
}

■ instanceof(継承)

■ SQLステートメント
ステートメント = 書き方
下記のような書き方をSQLステートメントという。
INSERT INTO [Table]([Column]) VALUES [値1、値2、値3,...];
DELETE FROM [Table];

■ doc
docとエディターに打ち込むだけでHTMLの基本コードを出す事ができる。

■ == と ===

== : 型の相互変換をした後で $a が $b に等しい時に TRUE
=== : $a が $b に等しく、および同じ型である場合に TRUE

■  var_dump
var_dumpの前に<pre>を入れる事でブラウザで見やすく表示する事ができる。
（例）
    echo "<pre>";
    var_dump($todo);
    exit;

■  __FUNCTION__
echo __FUNCTION__; とする事でファンクション名を試しに出力する事ができる。

■  リダイレクト処理 header Location
メソッドの最後に header("Location: ./index.php"); のように書く事によって
指定した先にリダイレクトできる。

■  $_SERVER['REQUEST_METHOD']
ページがリクエストされた時のリクエストメソッド名を返す。
（例）
// POSTで受け取った上で
echo $_SERVER['REQUEST_METHOD']; //結果：post

if($_SERVER['REQUEST_METHOD'] == 'POST') {
ページが遷移されてきた時に、POSTの状態（何かフォームで送信された時にif内の処理が実行される。
}
 
■  printfとsprintf
この2つはフォーマット文字列（指定した文字列）を使う時に使用。
指定方法は%sは文字列(数字でもOK)、%dは整数、%fは浮動小数点
printfはechoと似ていて、単純に出力したい時に使う。
sprinfはフォーマット文字列を代入する時に使う。
（例）
$month = 2;
$day = 5;
printf("誕生日は%d月%d日です", $month, $day); //出力結果:"誕生日は2月5日です"

$title = testTitle;
$detail = testDetail;
$params = sprintf("Todo_id=%s&title=%s&detail=%s", 1, $title, $detail); 
echo $params; //出力結果:"todo_id=1&title=testTitle&detail=testDetail"

■  isset関数
引数に指定した変数が存在していればTRUE、存在しなかったりNULLの場合はFALSEを返す。if文とセットで使われる事が多い。empty関数と似ているが返り値が逆になる点が注意。
（例）
$var = 10;

print(isset($var));         // TRUE
print(isset($var2));        // FALSE
print(isset($var, $var2));  // FALSE

■  スーパーグローバル変数
PHPで定義済み変数の事。どの場所でも使用する事ができる変数。
下記の9種類が存在する。
$GLOBALS、$_SERVER、$_GET、$_POST、$_FILES、$_COOKIE、$_SESSION、$_REQUEST、$_ENV

■  $_SESSION
セッションとは、コンピュータのサーバー側に一時的にデータを保存する仕組みのこと。
cookieと似ているがcookieはブラウザ側、セッションはサーバー側にデータを保存する場所が違う。
実践ではバリデーションのエラーmsgを出力する際に使用。

（例）
session_start(); //セッションを開始するときに定義する
$_SESSION[変数]

■ $_GET
パラメータが付与されたURLの?以降に含まれる情報を取得。
（例）
// ※http:: ...detail?todo_id=2にアクセス。
public function detail() {
  $todo_id = $_GET['todo_id']; URLのパラメータを参照するので、id=2の情報が取得できる。
  var_dump($todo_id); // 出力結果：2
}

■ $_POST
フォームで送られてきた情報を受け取る時に使用。
<form action="" method="post">
  <input type="text" name="first_name">
  <input type="text" name="last_name">
</form>

受け取り側
echo $_POST["first_name"];
echo $_POST["last_name"];

■ DBからデータを抽出。where文
select * from テーブル名 where 条件式
（例）
select * from todos where id=1 //id=1のデータが抽出
$stmh = $pdo->query(sprintf('select * from todos where id = %s;', $todo_id));

■ 検索機能 whereメソッド
DBから指定したデータを抽出して、変数に代入する方法。
（例）
【view側】
<input type="text" class="form-control" name="search_title">
【Controller側】
$posts = News::where('title', $search_title)->get();
Newsテーブル内のtitleカラムを検索して, $search_title に打ち込まれた文字列に一致したレコードを取得する。




