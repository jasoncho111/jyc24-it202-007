<?php

function map_data($api_data) {
    $records = [];
    foreach($api_data as $entry) {
        $record["name"] = $entry["name"]["common"];
        $record["capital"] = $entry["capital"][0]["name"];
        $record["currency"] = $entry["currencies"][0]["name"];
        $record["independent"] = $entry["independent"] ? 1 : 0;
        $record["un"] = $entry["unMember"] ? 1 : 0;
        $record["population"] = $entry["population"];
        $record["languages"] = $entry["languages"];
        array_push($records, $record);
    }

    return $records;
}

?>