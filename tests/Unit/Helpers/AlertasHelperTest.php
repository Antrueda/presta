<?php

namespace Tests\Unit\Helpers;

use App\Helpers\AlertasHelper;
use PHPUnit\Framework\TestCase;

class AlertasHelperTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testEl_usuarioTiene_permiso_Y_Hay_registros()
    {
        AlertasHelper::getArmarAlerta(['tipoacci' => 2]);
    }
}
