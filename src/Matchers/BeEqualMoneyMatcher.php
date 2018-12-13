<?php declare(strict_types=1);

namespace Bafor\MoneySpecMatchers\Matchers;

use Money\Money;
use PhpSpec\Exception\Example\FailureException;
use PhpSpec\Matcher\Matcher;

class BeEqualMoneyMatcher implements Matcher
{

    /**
     * Checks if matcher supports provided subject and matcher name.
     *
     * @param string $name
     * @param mixed  $subject
     * @param array  $arguments
     *
     * @return Boolean
     */
    public function supports(string $name, $subject, array $arguments): bool
    {
        return $name === 'beEqualMoney' &&
            $subject instanceof Money &&
            1 === \count($arguments);
    }

    /**
     * Evaluates positive match.
     *
     * @param string $name
     * @param mixed  $subject
     * @param array  $arguments
     */
    public function positiveMatch(string $name, $subject, array $arguments)
    {
        if (!$arguments[0] instanceof Money) {
            throw new FailureException('dupa');
        };
    }

    /**
     * Evaluates negative match.
     *
     * @param string $name
     * @param mixed  $subject
     * @param array  $arguments
     */
    public function negativeMatch(string $name, $subject, array $arguments)
    {
        throw new \Exception("negativeMatch - Not Implemented yet");
    }

    /**
     * Returns matcher priority.
     *
     * @return integer
     */
    public function getPriority(): int
    {
        return 100;
    }
}