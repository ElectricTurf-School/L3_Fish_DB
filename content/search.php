<?php
$search = clean_input($_POST['quick_search'] ?? $_GET['quick_search'] ?? "");

$condition_index = [
    'all' => $search != "" ? "WHERE CONCAT(name, sci_name) LIKE '%$search%' OR `native` LIKE '%$search%' OR avr_life LIKE '$search' OR description LIKE '%$search%'" : "",
    'recent' => $search != "" ? "" : "ORDER BY `fish`.`ID` DESC LIMIT 10",
    'random' => $search != "" ? "" : "ORDER BY RAND() LIMIT 10",
    'search' => $search != "" ? "WHERE CONCAT(name, sci_name) LIKE '%$search%'" : "",
    'country' => $search != "" ? "WHERE `native` LIKE '%$search%'" : "",
    'lifetime' => $search != "" ? "WHERE avr_life LIKE '$search'" : "",
    'description' => $search != "" ? "WHERE description LIKE '%$search%'" : "",


];
$action = $_POST['action'] ?? $_GET['action'] ?? 'search';
$search_conditions = $condition_index[$action] ?? $condition_index['search'];

include("content/results.php");
?>
