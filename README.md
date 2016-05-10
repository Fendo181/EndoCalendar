# PHP_Calender

##概要
PHPで1からスケジュール機能つきカレンダーを設計する。  
PHPのオブジェクト指向的コーディングを学ぶ。

##一般的な対応表
|呼び出し方|インスタンスプロパティ|インスタンスメソッド|staticプロパティ|static メソッド|
|:------:|:-----------------:|:---------------:|:------------:|:------------:|
|class外から|$a->name;|$a->name();|クラス名::$name|クラス名::name()|
|インスタンスメソッッド内から|$thisi->name|$this->name()|self::$name|self::neme()|
|静的メソッド内から|なし|なし|self::$name|self::name()|



##外観  
![clender](https://github.com/Fendo181/Git_repos/blob/master/PHP_Calender/Top.png)

##更新履歴確認  
![clendar1](https://github.com/Fendo181/Git_repos/blob/master/PHP_Calender/Top2.png)

##version履歴と機能

ver 0.01 [2016_5_06]  
- カレンダー形式で月次表示
- ディフォルトは当月を表示
- 当月から前の月と次の月に飛べる。
- 年月を指定してカレンダを見れる。

ver 0.1 [2016_5_07]  
- Calender.phpのコードを修正  

- [2016_5_09]
  - 予定機能(CRUD)はLaravelの方に記述したほうがわかりやすい。  

ver 0.3 [2016_5_08]
- CRUD操作機能をいれた更新履歴画面の追加
- カレンダーの一部表記を修正  

ver 0.4 [2016_5_10]
- 年月日ごとに対応したリンクを表示できた!


##TODO
- 予定表機能の作成
- 外観にも力いれる
  - HTML5/CSS3勉強
- もっと動的にページを見せたい
  - JS/jQuery/Ajax勉強　→重要
- Slackとの連携を考える。
- 色で指定できる。
- Mysqlの操作の履歴を閲覧できる()
  