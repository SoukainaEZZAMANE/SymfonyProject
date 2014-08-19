<?php

namespace Najdah\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class NajdahUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
