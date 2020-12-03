<?php

include('createTable.php');
include('functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/style.css"/>
    <title>Table contents</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 6px;
        }
    </style>
</head>

<body>
<table style="position: relative; left: 10%;top: 10%">
    <?php
    while ($column = mysqli_fetch_field($result)) : ?>
        <th>
            <?php
            echo "<a href=tableContents.php?search=$search&sort=$column->name&order=$order&filter=$filter>"
                ."$column->name"."</a>";
            array_push($tableColumns, $column->name); ?>
        </th>
    <?php
    endwhile;

    while ($row = mysqli_fetch_array($buttonQuery)) {
        foreach ($tableColumns as $item) {
            if ($item == "email") {
                $provider = checkProvider($row[$item]);
                if ($provider !== ""
                    && !in_array($provider, $providers, true)
                ) {
                    array_push($providers, $provider);
                }
            }
        }
    } ?>

    <?php
    while ($row = mysqli_fetch_array($result)) : ?>
        <tr>
            <?php
            foreach ($tableColumns as $item) : ?>
                <td>
                    <?php
                    echo $row[$item]; ?>
                </td>
            <?php
            endforeach; ?>
            <td>
                <?php
                echo "<a href=delete.php?id=$row[0]> Delete </a>" ?>
            </td>
        </tr>
    <?php
    endwhile; ?>
</table>

<div style="position: absolute; left: 8%; top: 35px">
    <?php
    foreach ($providers as $provider) : ?>
        <button>
            <?php
            echo("<a href=tableContents.php?search=$search&sort=$sorting&filter=$provider>"
                ."$provider"."</a>") ?>
        </button>
    <?php
    endforeach; ?>
    <button><a href="tableContents.php"> Show all providers</a></button>
</div>

<div style="position: absolute; left: 40%; top: 70px">
    <form action="tableContents.php" method="get">
        <input type="text" name="search">
        <input type="submit" value="search">
    </form>
</div>
<ul>
    <?php
    if ($page !== '1' && $page !== 1): ?>
        <li>
            <?php
            echo "<a href=";
            echo "?page=".($page - 1)
                ."&search=$search&sort=$sorting&order=$order&filter=$filter>"
                ."Prev"."</a>"; ?>
        </li>
    <?php
    endif;

    if ($page !== strval($totalPages) && $page !== (int)$totalPages): ?>
        <li>
            <?php
            echo "<a href=";
            echo "?page=".($page + 1)
                ."&search=$search&sort=$sorting&order=$order&filter=$filter>"
                ."Next"."</a>"; ?>
        </li>
    <?php
    endif; ?>
</ul>
</body>
</html>
