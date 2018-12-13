<?php declare(strict_types=1);

namespace Bafor\MoneySpecMatchers;

use Bafor\MoneySpecMatchers\Matchers\BeEqualMoneyMatcher;
use PhpSpec\ServiceContainer;

class Extension implements \PhpSpec\Extension
{
    public function load(ServiceContainer $container, array $params)
    {
        $container->define(
            'bafor.matchers.be_equal_money',
            function () {
                return new BeEqualMoneyMatcher();
            },
            ['matchers']
        );
    }
}