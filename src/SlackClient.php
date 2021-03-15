<?php
namespace Kanagama\SimpleSlack;

use GuzzleHttp\Client;
use BadFunctionCallException;

/**
 * シンプルなslack通知
 */
class SlackClient
{
    /**
     * しんぐるとん
     */
    private static $singleton = null;

    /**
     * webhookURL
     */
    private $webhook_url = '';

    /**
     * Guzzle Http Client
     */
    private $guzzle = null;

    /**
     * 設定
     */
    public function __construct()
    {
        if (is_null($this->guzzle)) {
            $this->guzzle = new \GuzzleHttp\Client;
        }
    }

    /**
     * インスタンス取得
     */
    public static function get()
    {
        if (is_null(self::$singleton)) {
            self::$singleton = new self();
        }
        return self::$singleton;
    }

    /**
     * 投稿ワークスペースURL変更
     *
     * @param string $webhook_url
     */
    public function setUrl(string $webhook_url = '')
    {
        // 引数が空の場合、環境変数で設定されている値を取得する（あれば）
        if (empty($webhook_url) && getenv('SIMPLE_SLACK_WEBHOOK_URL')) {
            $webhook_url = getenv('SIMPLE_SLACK_WEBHOOK_URL');
        }

        $this->webhook_url = $webhook_url;
    }

    /**
     * 投稿
     *
     * @param string $message
     */
    public function postMessage(string $message)
    {
        $this->setUrl($this->webhook_url);
        $this->checkWebHook();

        $this->guzzle->request('POST', $this->webhook_url, [
            'json' => [
                'text' => $message,
            ],
        ]);
    }

    /**
     * webhookURL存在チェック
     */
    private function checkWebHook()
    {
        if (empty($this->webhook_url)) {
            throw new BadFunctionCallException('Webhook URLが指定されていません。');
        }
    }
}