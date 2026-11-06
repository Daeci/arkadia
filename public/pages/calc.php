<?php
function isValidValue(string $val): bool {
    $numberKeys = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "."];
    $operationKeys = ["√", "÷", "×", "-", "+", "="];
    $controlKeys = ["C", "Del"];
    $allowedKeys = [...$numberKeys, ...$operationKeys, ...$controlKeys];
    return in_array($val, $allowedKeys, true);
}

$expression = $_POST['expression'] ?? '';
$key = $_POST['key'] ?? null;
if ($key === 'C') {
    $expression = '';
} elseif ($key === 'Del') {
    $expression = mb_substr($expression, 0, -1);
} elseif ($key === '=') {
    
    $answer = 0;
    for ($i = 0; $i < mb_strlen($expression); $i++) {
        $val = mb_substr($expression, $i, 1);
        
        // check for valid input, early return with error code on any invalid input found
        if (!isValidValue($val)) {
            $expression = 'INVALID INPUT';
            break;
        }

        
    }
} elseif ($key !== null) {
    $expression .= $key;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Calculator</title>
        <link rel="icon" href="/icons/favicon-96x96.png" type="image/png" sizes="96x96">
        <link rel="icon" href="/icons/favicon.svg" type="image/svg+xml">
        <link rel="shortcut icon" href="/icons/favicon.ico">
        <link rel="apple-touch-icon" href="/icons/apple-touch-icon.png" sizes="180x180">
        <link rel="manifest" href="/icons/site.webmanifest">
        <link rel="stylesheet" href="/home.css">
        <link rel="stylesheet" href="calc.css">
    </head>
    <body>
        <header>

        </header>
        <main>
            <form class="calculator-outer" method="post">
                <input type="hidden" name="expression" value="<?= htmlspecialchars($expression) ?>">
                <div class="calculator-display">
                    <div class="text-entry">
                        <?= htmlspecialchars($expression) ?>
                    </div>
                </div>
                <div class="calculator-buttons">
                    <button type="submit" name="key" value="C">C</button>
                    <button type="submit" name="key" value="√">√</button>
                    <button type="submit" name="key" value="%">%</button>
                    <button type="submit" name="key" value="÷">÷</button>
                    <button type="submit" name="key" value="7">7</button>
                    <button type="submit" name="key" value="8">8</button>
                    <button type="submit" name="key" value="9">9</button>
                    <button type="submit" name="key" value="×">×</button>
                    <button type="submit" name="key" value="4">4</button>
                    <button type="submit" name="key" value="5">5</button>
                    <button type="submit" name="key" value="6">6</button>
                    <button type="submit" name="key" value="-">-</button>
                    <button type="submit" name="key" value="1">1</button>
                    <button type="submit" name="key" value="2">2</button>
                    <button type="submit" name="key" value="3">3</button>
                    <button type="submit" name="key" value="+">+</button>
                    <button type="submit" name="key" value="0">0</button>
                    <button type="submit" name="key" value=".">.</button>
                    <button type="submit" name="key" value="=">=</button>
                    <button type="submit" name="key" value="Del">Del</button>
                </div>
            </div>
        </main>
    </body>
</html>
