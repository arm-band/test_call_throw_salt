<?php

namespace BharlesCabbage;

class Helper
{
    protected $encode;

    public function __construct()
    {
        $this->encode = 'UTF-8';
    }

    public function _h ($str) {
        return htmlspecialchars($str, ENT_QUOTES, $this->encode);
    }
}
