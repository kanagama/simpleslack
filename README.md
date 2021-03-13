# SimpleSlack Client for PHP

メッセージ送るだけのシンプルなSlack拡張

## 要件
* PHP 7.1+
* ext-mbstring

## 使い方

new で webhook_url を指定して postMessage() するだけ

```php
use Kanagama\SimpleSlack;

$slack = new \Kanagama\SimpleSlack\SimpleSlack($slack_webhook_url);


$slack->postMessage('テスト投稿');
```

### webhook_url を毎回指定するのが面倒であれば、環境変数を設定すればOK

```
export SIMPLE_SLACK_WEBHOOK_URL="https://hooks.slack.com/services/xxxxxxxx/xxxxxxxxx/xxxxxxxx"

```

# パッケージ作成

## 必要なもの

composer.json と phpファイルのみ

### composer.json 説明

| 項目 | 簡易説明 | 詳細説明 |
| ---- | ---- | ---- |
| name | パッケージ名 | 「githubアカウント/パッケージ名」が基本 |
| description | 説明 | パッケージの説明 |
| keywords | packagistでの検索ワード | 弊社で使うだけなら要らないかも |
| type | ライブラリの種類 | library, project, metapackage, composer-plugin |
| license | ライセンス | MIT, GPL, BSD, MPL etc.. |
| require | 外部読み込み | ライブラリに必要なものを記入 |
| autoload | ソースコードの位置 | psr-4に準拠 |
| homepage | ホームページ | 自分のHPがあればそれを、なければgithubのURLでも書いておく |
| authors | 作者 | 自分の情報でも書いておく |
| support | サポート情報 | githubのURLと、そのissueのURLでも書いておく |

# packagist への登録

## アカウント作成 & github紐付け
いきなり github login は出来ない模様。
アカウントを作成してから、githubアカウントを紐付ける。

## パッケージ登録

submit から、githubのURLを登録する

```
https://github.com/kanagama/simpleslack
```