<?php

require_once 'Reporting.php';

$warehouse = new Warehouse();
$reporting = new Reporting();

$product1 = new Product("Ноутбук", new Money(25000, 99), "Електроніка");
$product2 = new Product("Смартфон", new Money(15000, 49), "Електроніка");

$reporting->registerIncome($product1, 10, $warehouse);
$reporting->registerIncome($product2, 15, $warehouse);

$products = $warehouse->getProducts();
$invoices = $reporting->getIncomeInvoices();

?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Склад та звітність</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>

<h2>Склад</h2>
<table>
    <tr>
        <th>Категорія</th>
        <th>Назва</th>
        <th>Ціна</th>
        <th>Кількість</th>
        <th>Дата надходження</th>
    </tr>
    <?php foreach ($products as $item): ?>
        <tr>
            <td><?= htmlspecialchars($item['product']->getCategory()) ?></td>
            <td><?= htmlspecialchars($item['product']->getName()) ?></td>
            <td><?= htmlspecialchars($item['product']->getPrice()) ?> грн</td>
            <td><?= htmlspecialchars($item['quantity']) ?></td>
            <td><?= htmlspecialchars($item['date_added']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<h2>Прибуткові накладні</h2>
<table>
    <tr>
        <th>Назва</th>
        <th>Кількість</th>
        <th>Дата</th>
    </tr>
    <?php foreach ($invoices as $invoice): ?>
        <tr>
            <td><?= htmlspecialchars($invoice['product']->getName()) ?></td>
            <td><?= htmlspecialchars($invoice['quantity']) ?></td>
            <td><?= htmlspecialchars($invoice['date']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>