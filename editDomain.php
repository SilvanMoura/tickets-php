<?php
require __DIR__ . '/vendor/autoload.php';

use App\Entity\Domain;

session_start();

$id = $_GET['id'];

$domainInfo = new Domain();
$domainInfo->id = $id;
$domainData = $domainInfo->getDomainsById();

if (isset($_POST['name'], $_POST['domain'])) {
    $domainInfo->name = $_POST['name'];
    $domainInfo->domain = $_POST['domain'];
    $domainInfo->status = $_POST['status'];
    
    $domainInfo->updateDomainsById();
    
    header('location: systemParams.php');
    exit;
}


include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/editDomain.php';
include __DIR__ . '/includes/footer.php';