# PhpSpec Matchers for the phpmoney/money

Add matchers for `Money\Money` class

## Installation
```
composer require bafor/phpspec-moneyphp-matchers
```

Add the following definition to your `phpspec.yml`
```php
extensions:
    Bafor\MoneySpecMatchers\Extension: ~
   
```

## Usage
This package add matchers to compare objects of type `Money\Money` (amount and currency):

 * `shouldReturn` | `shouldNotReturn` 
 * `shouldBe` | `shouldNotBe` 
 * `shouldEqual` | `shouldNotEqaul`
 * `shouldBeEqualTo` | `shouldNotBeEqualTo` 


