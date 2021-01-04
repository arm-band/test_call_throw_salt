<?php

namespace BharlesCabbage;

use Lukasoppermann\Httpstatus\Httpstatus as HttpStatus;

class DifferenceEngine
{
    protected $encode;
    protected $config;
    protected $Httpstatus;
    protected $Helper;

    public function __construct($Helper)
    {
        $this->encode     = 'UTF-8';
        $this->config     = require(__DIR__ . '/config.php');
        $this->Httpstatus = new Httpstatus();
        $this->Helper     = $Helper;
    }

    /**
     * mill: テンプレートの読み込み
     *
     * @param {array} $result_array: CallThrow の結果の連想配列
     */
    public function mill (array $result_array)
    {
        $status_code    = 200;
        $filepath = __DIR__ . '/../template/' . $result_array['callthrow'] . '.php';

        try {
            if ( file_exists($filepath) ) {
                if ( $result_array['status'] === true ) {
                    $status_code = 200;
                }
                else if ( $result_array['status'] === false ) {
                    $status_code = 400;
                }
                else {
                    $status_code = 200;
                }
            }
            else {
                throw new \Exception('Template file not found.');
            }
        } catch ( \Exception $e ) {
            $status_code = 404;
            $filepath = __DIR__ . '/../template/error.php';
        }

        $status = [
            'code'    => $status_code,
            'message' => $this->Httpstatus->getReasonPhrase($status_code),
        ];

        header('HTTP/1.1 ' . $this->Helper->_h($status['code']) . ' ' . $this->Helper->_h($status['message']));
        return require_once($filepath);
    }
    /**
     * ada: テンプレートの読み込み (エラー時)
     *
     * @param {int} $status_code: ステータスコード
     */
    public function ada (int $status_code)
    {
        $filepath = __DIR__ . '/../template/error.php';

        $status = [
            'code'    => $status_code,
            'message' => $this->Httpstatus->getReasonPhrase($status_code),
        ];

        header('HTTP/1.1 ' . $this->Helper->_h($status['code']) . ' ' . $this->Helper->_h($status['message']));
        return require_once($filepath);
    }
}
