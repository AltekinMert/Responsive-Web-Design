<!DOCTYPE html>
<html lang="en">
<head>
    <title>Java Jam Coffee House</title>
    <meta name="description" content="CENG 311 Inclass Activity 1" />
</head>
<body>
    <?php
    // Exchange rates
    $currency_rates = array(
        'USD_to_CAD' => 1.35,
        'USD_to_EUR' => 0.92,
        'USD_to_USD' => 1.00,
        'CAD_to_USD' => 0.74,
        'CAD_to_EUR' => 0.68,
        'CAD_to_CAD' => 1.00,
        'EUR_to_USD' => 1.09,
        'EUR_to_CAD' => 1.47,
        'EUR_to_EUR' => 1.00
    );

    function convertCurrency($from_currency, $to_currency, $miktar, $currency_rates) {
        $rate_key = $from_currency . '_to_' . $to_currency;
        if (array_key_exists($rate_key, $currency_rates)) {
            $exchange_rate = $currency_rates[$rate_key];
            return $miktar * $exchange_rate;
        }
    }

    $converted_amount_from = '';
    $original_amount_to = '';
    $from_currency_selected = 'USD';
    $to_currency_selected = 'USD';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["miktar_from"]) && isset($_GET["from_currency"]) && isset($_GET["to_currency"])) {
        $from_currency = $_GET["from_currency"];
        $to_currency = $_GET["to_currency"];
        $miktar = floatval($_GET["miktar_from"]);

        // Convert currency
        $result = convertCurrency($from_currency, $to_currency, $miktar, $currency_rates);

        $converted_amount_from = number_format($result, 0);
        $original_amount_to = number_format($miktar, 0);
        $from_currency_selected = $from_currency;
        $to_currency_selected = $to_currency;
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
        <table>
            <tr>
                <td>From:</td>
                <td><input type="text" name="miktar_from" value="<?php echo $original_amount_to; ?>" /></td>
                <td>Currency:</td>
                <td>
                    <select name="from_currency">
                        <option value="USD" <?php if ($from_currency_selected == 'USD') echo 'selected'; ?>>USD</option>
                        <option value="CAD" <?php if ($from_currency_selected == 'CAD') echo 'selected'; ?>>CAD</option>
                        <option value="EUR" <?php if ($from_currency_selected == 'EUR') echo 'selected'; ?>>EUR</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>To:</td>
                <td><input type="text" name="miktar_to" value="<?php echo $converted_amount_from; ?>" /></td>
                <td>Currency:</td>
                <td>
                    <select name="to_currency">
                        <option value="USD" <?php if ($to_currency_selected == 'USD') echo 'selected'; ?>>USD</option>
                        <option value="CAD" <?php if ($to_currency_selected == 'CAD') echo 'selected'; ?>>CAD</option>
                        <option value="EUR" <?php if ($to_currency_selected == 'EUR') echo 'selected'; ?>>EUR</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><input type="submit" value="convert" /></td>
            </tr>
        </table>
    </form>
</body>
</html>