# 制作背景

”社員名簿”と”座席管理”を組み合わせ、どの席に社員が座っているか探す、シンプルなサービスとなります。

背景として、座席のフリーアドレス化、コロナによる在宅と、自由な働き方が求められる一方で、自由に働く社員がどこにいるのかわからないケースがあります。

例えば、予算書類について、総務部の田口さんに話を聞きたいことがあるとします。そこで、総務部に着いても、「田口さんはどこにいますか…?」と探す手間が発生します。

そこで、本アプリにて、社員を検索すれば、いち早く、座席位置を割り出すサービスを作成しました。

# **ER 図**

<img src="../img/map.png">

# **インフラ構成図**

# **使用技術**

### バックエンド

PHP 8.1.10 / Laravel 9.52.0

### フロントエンド

HTML / CSS / javascript / Bootstrap5

### インフラ

mysql  / AWS(EC2, S3, RDS, Route 53, ELB, ACM)

### その他の使用技術

git(gitHub) / Visual Studio Code / Drawio(ER図・AWS構成図)
phpMyadmin(SQLクライアントツール)
