<?php

function map_data($api_data) {
    $records = [];
    foreach($api_data as $entry) {
        $record["name"] = $entry["name"]["common"];
        $record["capital"] = isset($entry["capital"]) ? $entry["capital"][0]["name"] : "None";
        $record["currency"] = isset($entry["currencies"]) ? $entry["currencies"][0]["name"] : "None";
        $record["independent"] = $entry["independent"] ? 1 : 0;
        $record["un"] = $entry["unMember"] ? 1 : 0;
        $record["population"] = $entry["population"];
        $record["languages"] = isset($entry["languages"]) ? $entry["languages"] : [];
        array_push($records, $record);
    }

    return $records;
}

?>