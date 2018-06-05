# PayBear.io
## PayBear PHP Library

### API Keys
In order to use the system you need an API key. Getting a key is free and easy, sign up here: https://www.paybear.io

## Manual Installation
Download latest release and include PayBear.php file.

```php
require_once 'lib/PayBear.php';
```

### Getting Started

Usage of PayBear PHP library.

```php
$payBear = new PayBear('YOUR_API_SECRET_KEY');
```

### Get Currencies
Get a list of enabled currencies:

```php
$currencies = $payBear->getCurrencies();
```

### Create payment request and get payment address for customer

```php
$currencies = $payBear->getPaymentData($crypto, $callback_url);
```
$crypto is crypto currency to accept ('eth', 'btc', 'bch', 'ltc', 'dash', 'btg', etc)

$callback_url is your server callback url 

### Get Market Rate
Get current average market rates:

```php
$currencies = $payBear->getRates($fiat_code);
```
$fiat_code is fiat currency ('usd', 'eur', 'cad', 'rub' etc)

Get exchange rates for one currency

```php
$currencies = $payBear->getRate($fiat_code, $crypto);
```

$fiat_code is fiat currency ('usd', 'eur', 'cad', 'rub' etc)

$crypto is crypto currency code ('eth', 'btc', 'bch', 'ltc', 'dash', 'btg', etc)

