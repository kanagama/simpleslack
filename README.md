# SimpleSlack Client for PHP

メッセージ送るだけのシンプルなSlack拡張

## 要件
* PHP 7.1+
* ext-mbstring

## 使い方

new で webhook_url を指定して postMessage() するだけ

```php
$slack = new \Kanagama\SimpleSlack\SimpleSlack($slack_webhook_url);


$slack->postMessage('テスト投稿');
```

### webhook_url を毎回指定するのが面倒であれば、環境変数を設定すればOK

```
export SIMPLE_SLACK_WEBHOOK_URL="https://hooks.slack.com/services/xxxxxxxx/xxxxxxxxx/xxxxxxxx"

```
