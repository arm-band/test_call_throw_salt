<?php

namespace BharlesCabbage;

class CallThrow
{
    protected $encode;
    protected $algorythm;
    protected $Helper;

    public function __construct($Helper)
    {
        $this->encode     = 'UTF-8';
        $this->algorythm  = PASSWORD_BCRYPT;
        $this->Helper     = $Helper;
    }

    /**
     * salad: パスワードハッシュの計算
     *
     * @param {array} $args: フォーム入力値 (パスワードとソルトの配列)
     *
     * @return {array} : パスワードハッシュの値、メッセージ、結果ステータスの連想配列
     */
    public function salad (array $args)
    {
        $result  = '';
        $message = '';
        $status  = true;

        try {
            if ( !array_key_exists('pswd', $args) ) {
                $args['pswd'] = 'password';
            }

            if ( array_key_exists('salt', $args) && mb_strlen($args['salt'], $this->encode) > 0 ) {
                if (mb_strlen($args['salt'], $this->encode) < 22) {
                    $args['salt'] = str_pad($args['salt'], 22, "1234567890", STR_PAD_RIGHT);
                }
                $options = [
                    'salt' => $args['salt'],
                ];
                $result  = password_hash($args['pswd'], $this->algorythm, $options);
                throw new \Exception('I have a feeling, that\'s something predetermined.');
            }
            else {
                $result  = password_hash($args['pswd'], $this->algorythm);
                $message = 'I like this salt.';
                if ( preg_match('/^((B\.C\.)[\d]|(A\.D\.)?[\d]{1,4})?0?70?6$/', $args['pswd']) ) {
                    $message = 'Anniversary!';
                }
                $status  = true;
            }
        } catch ( \Exception $e ) {
            $message = $e->getMessage();
            $status  = false;
        }
        return [
            'result'    => $result,
            'message'   => $message,
            'status'    => $status,
            'callthrow' => 'call',
        ];
    }
    /**
     * coldsalad: トップページ
     *
     * @return {array} : ダミーの連想配列
     */
    public function coldsalad ()
    {
        return [
            'result'    => '',
            'message'   => '',
            'status'    => true,
            'callthrow' => 'index',
        ];
    }
}
