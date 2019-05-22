<?php

$alert = '';
$account = '';
$type = '';
$priority = '';
$summary = '';
$description = '';
$date = date('d/m/Y');

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    $string = strtoupper($string);
    return $string;
}

if (isset($_POST["submit"])) {

    // account
    if (empty($_POST["account"])) {
        $alert .= '<p>Account is required</p>';
    } else {
        $account = $_POST["account"];
    }

    // call type
    if (empty($_POST["type"])) {
        $alert .= '<p>Call type is required</p>';
    } else {
        $type = $_POST["type"];
    }

    // priority
    if (empty($_POST["priority"])) {
        $alert .= '<p>Priority is required</p>';
    } else {
        $priority = $_POST["priority"];
    }

    // summary
    if (empty($_POST["summary"])) {
        $alert .= '<p>Summary is required</p>';
    } else {
        $summary = $_POST["summary"];
    }

    // description
    if (empty($_POST["description"])) {
        $alert .= '<p>Description is required</p>';
    } else {
        $description = $_POST["description"];
    }

    if ($alert == '') {

        // alert success
        $alert = 'New ticket created successfully';

        // create file in folder
        $document = fopen("output/" . uniqid() . ".csv", "a");

        // define header fields
        $output_header = array(
            "ACCOUNT",
            "TYPE",
            "PRIORITY",
            "SUMMARY",
            "DESCRIPTION",
            "DATE"
        );
        // output header fields
        fputcsv($document, $output_header);

        // define data fields
        $output_data = array(
            $account,
            $type,
            $priority,
            $summary,
            $description,
            $date
        );

        // output data fields
        fputcsv($document, $output_data);

        // save document
        fclose($document);

    } else {

        // throw errors
        $error_message = array(
            "account" => $account,
            "type" => $type,
            "priority" => $priority,
            "summary" => $summary,
            "description" => $description
        );

    }

}
