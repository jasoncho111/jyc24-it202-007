<?php

global $countriestable;

if(!isset($countriestable)) {
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM Countries");
    try {
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($results) $countriestable = $results;
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }
}