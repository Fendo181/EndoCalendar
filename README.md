# PHP_Calender

##概要
PHPで1からカレンダーを設計する。  
PHPのオブジェクト指向的コーディングを学ぶ。

##一般的な対応表
|呼び出し方|インスタンスプロパティ|インスタンスメソッド|staticプロパティ|static メソッド|
|:------:|:-----------------:|:---------------:|:------------:|:------------:|
|class外から|$a->name;|$a->name();|クラス名::$name|クラス名::name()|
|インスタンスメソッッド内から|$thisi->name|$this->name()|self::$name|self::neme()|
|静的メソッド内から|なし|なし|self::$name|self::name()|



##外観  
![clender](https://github.com/Fendo181/Git_repos/blob/master/PHP_Calender/Top.png)

##version履歴と機能

ver 0.01 [2016_5_06]  
- カレンダー形式で月次表示
- ディフォルトは当月を表示
- 当月から前の月と次の月に飛べる。
- 年月を指定してカレンダを見れる。

ver 0.1 [2016_5_07]  
- Calender.phpのコードを修正


##TODO
- 予定表機能の作成
- 外観に力をいれる
  - HTML5/CSS3勉強
- LINEBOTとの連携を考える。
  