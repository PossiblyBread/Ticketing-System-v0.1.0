<?php
include 'init.php';

if (!empty($_POST['action'])) {
    switch ($_POST['action']) {
        case 'listSla':
            $sla->listSla();
            break;

        case 'getSlaDetails':
            $sla->slaId = $_POST["slaId"];
            $sla->getSlaDetails();
            break;

        case 'addSla':
            $sla->sla = $_POST["sla"];
            $sla->status = $_POST["status"];
            $sla->insert();
            break;

        case 'updateSla':
            $sla->slaId = $_POST["slaId"];
            $sla->sla = $_POST["sla"];
            $sla->status = $_POST["status"];
            $sla->update();
            break;

        case 'deleteSla':
            $sla->slaId = $_POST["slaId"];
            $sla->delete();
            break;

        default:
            // Handle invalid action
            echo json_encode(["error" => "Invalid action"]);
            break;
    }
}
?>