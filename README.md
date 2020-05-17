フードシェアアプリ（仮）
----

概要  
日本国内だけで６００万トンとも言われるフードロス問題の解決に貢献したいと思い、作成。  
余った食品を気軽にシェアしたいユーザーと、安価に食品を欲しいユーザーをマッチングする。  
----

特徴  
環境面  
Docker環境で構築  
 アプリケーションサーバーにPHP、Webサーバーにnginx、DBサーバーにMYSQL、dusk使用のためHeadless driverとしてSeleniumの、計4コンテナを作成し、運用した。  
AWSへのデプロイ  
 VPCを作成し、その内部でサブネットを構築。サブネット内にEC2インスタンスを立ち上げ、デプロイした。
CIツールとしてCircleCIを使用  
 自動テストが常にグリーンな状態か確認する目的で導入した。

機能面  
ブラウザテストも含めた自動テスト  
外部APIとしてGoogle Maps APIを使用したマップ機能  
ダイレクトメッセージ機能  
----

ER図  
![IMG_2053](https://user-images.githubusercontent.com/59130395/82132871-8de19200-981f-11ea-8f5a-ecf0cc7f83a5.JPG)  
----

デザインカンプ  
![IMG_2052](https://user-images.githubusercontent.com/59130395/82132870-85895700-981f-11ea-9cb1-f9b2f750f185.JPG)  
