■ element
ディレクトリ構造：app/view/element
elementにはviewのheaderなどの共通部品が入っている。
View自体には、以下のようにしてelementのheaderに繋ぐ事ができる。
<php echo $this->element('header, array(...)'));


