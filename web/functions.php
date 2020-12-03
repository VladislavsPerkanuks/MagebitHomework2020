<?php

$tableColumns = array();
$providers    = array();
$sorting      = getSorting();
$filter       = $_GET['filter'];
$search       = $_GET['search'];

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$recordsPerPage = 10;
$offset         = ($page - 1) * $recordsPerPage;

$query       = "SELECT * FROM users_email";
$countQuery  = "SELECT COUNT(*) FROM users_email";
$buttonQuery = $mysqli->query($query);

$filters        = [];
$allFilterArray = [
    'email' => array($filter, $search),
];

foreach ($allFilterArray as $key => $value) {
    foreach ($value as $item) {
        if (!empty($item)) {
            $filters[] = "$key LIKE '"."%$item%"."'";
        }
    }
}

if ($filters) {
    $query      .= " WHERE ".implode(' AND ', $filters);
    $countQuery .= " WHERE ".implode(' AND ', $filters);
}

$query       .= " ORDER BY $sorting LIMIT $offset, $recordsPerPage";
$result      = $mysqli->query($query);
$pagesResult = $mysqli->query($countQuery);
$totalRows   = mysqli_fetch_array($pagesResult)[0];
$totalPages  = ceil($totalRows / $recordsPerPage);

if (!$result) {
    echo $mysqli->error;
}

function checkProvider($email)
{
    $pos = strrpos($email, '@');

    return $pos ? substr($email, $pos + 1) : "";
}

function getSorting()
{
    $sort = $_GET['sort'];
    switch ($sort) {
        case "id":
            return $sort = "id";
        case "email":
            return $sort = "email";
        default:
            return $sort = "date";
    }
}
