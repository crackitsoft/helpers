<?php

namespace crackitsoft\helpers;

use crackitsoft\helpers\traits\Keygen;


class Migration extends \yii\db\Migration
{
    use Keygen;
    public function buildFkClause($delete = '', $update = '')
    {
        return implode(' ', ['', $delete, $update]);
    }
}