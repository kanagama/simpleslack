<?php
namespace Kanagama\SimpleSlack;

use GuzzleHttp\Client;
use BadFunctionCallException;

/**
 * シンプルなslack通知
 */
class SimpleSlack
{
    /**
     * webhookURL
     */
    protected $webhook_url;

    /**
     * Guzzle Http Client
     */
    protected $guzzle;

    /**
     * 設定
     *
     * @param string $url
     */
    public function __construct(string $webhook_url = '')
    {
        $this->setWebhookUrl($webhook_url);

        // 必須パラメータ
        if (empty($this->webhook_url)) {
            throw new BadFunctionCallException;
        }

        $this->guzzle = new \GuzzleHttp\Client;
    }

    /**
     * 投稿ワークスペースURL変更
     *
     * @param string $webhook_url
     */
    public function setWebhookUrl(string $webhook_url)
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
        $this->guzzle->request('POST', $this->webhook_url, [
            'json' => [
                'text' => $message,
            ],
        ]);
    }
}