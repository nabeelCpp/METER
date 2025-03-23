<?php
namespace App\Helpers;

class CurrencyHelper
{
    const SAR_CURRENCY_SYMBOL = 'ر.س';
    const USD_CURRENCY_SYMBOL = '$';
    const SAR_CURRENCY_KEY = 0;
    const USD_CURRENCY_KEY = 1;
    const SAR_CURRENCY_CODE = 'SAR';
    const USD_CURRENCY_CODE = 'USD';

    const CURRENCIES = [
        self::SAR_CURRENCY_KEY => self::SAR_CURRENCY_CODE,
        self::USD_CURRENCY_KEY => self::USD_CURRENCY_CODE,
    ];
    /**
     * Format the given amount to the specified currency
     * @param float $amount
     * @param string $currency
     * @return string
     */
    public static function formatCurrency($amount, $currency = self::SAR_CURRENCY_CODE)
    {
        switch ($currency) {
            case self::USD_CURRENCY_CODE:
                return '$ ' . number_format($amount, 2);
            case self::SAR_CURRENCY_CODE:
                return 'ر.س ' . number_format($amount, 2);
            default:
                return number_format($amount, 2);
        }
    }
}
