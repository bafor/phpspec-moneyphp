<?php declare(strict_types=1);

namespace Bafor\MoneySpecMatchers\Matchers;

use Money\Money;
use PhpSpec\Exception\Example\FailureException;
use PhpSpec\Formatter\Presenter\Presenter;
use PhpSpec\Matcher\Matcher;

class BeEqualMoneyMatcher implements Matcher
{
    /** @var Presenter */
    private $presenter;

    private static $keywords = [
        'return',
        'be',
        'equal',
        'beEqualTo'
    ];

    public function __construct(Presenter $presenter)
    {
        $this->presenter = $presenter;
    }

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
        return
            \in_array($name, self::$keywords) &&
            1 === \count($arguments) &&
            $arguments[0] instanceof Money;
    }

    /**
     * Evaluates positive match.
     *
     * @param string  $name
     * @param Money   $subject
     * @param Money[] $arguments
     */
    public function positiveMatch(string $name, $subject, array $arguments)
    {
        $this->assertType($subject);

        if (!$subject->equals($arguments[0])) {
            throw new FailureException(
                sprintf('Expected %s %s, but got %s %s',
                    $arguments[0]->getAmount(),
                    $arguments[0]->getCurrency()->getCode(),
                    $subject->getAmount(),
                    $subject->getCurrency()->getCode()
                )
            );
        }
    }

    private function assertType($subject): void
    {
        if (!$subject instanceof Money) {
            throw new FailureException(
                sprintf('Expect object of type Money, got %s', $this->presenter->presentValue($subject))
            );
        }
    }

    /**
     * Evaluates negative match.
     *
     * @param string  $name
     * @param Money   $subject
     * @param Money[] $arguments
     */
    public function negativeMatch(string $name, $subject, array $arguments)
    {
        if ($subject->equals($arguments[0])) {
            throw new FailureException(
                sprintf('Excpected %s %s not be equal to %s %s',
                    $subject->getAmount(),
                    $subject->getCurrency()->getCode(),
                    $arguments[0]->getAmount(),
                    $arguments[0]->getCurrency()->getCode()
                )
            );
        }
    }

    /**
     * Returns matcher priority.
     *
     * @return integer
     */
    public function getPriority(): int
    {
        return 200;
    }
}