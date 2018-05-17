<?php
/**
 * Created by Alpha-Hydro.
 * @link http://www.alpha-hydro.com
 * @author Vladimir Mikhaylov <admin@alpha-hydro.com>
 * @copyright Copyright (c) 2018, Alpha-Hydro
 *
 */

require_once "bootstrap.php";

$reporterId = $argv[1];
$engineerId = $argv[2];
$productIds = explode(",", $argv[3]);

try {
    $reporter = $entityManager->find("User", $reporterId);
    $engineer = $entityManager->find("User", $engineerId);
} catch (\Doctrine\ORM\ORMException $e) {
    echo $e->getMessage();
}

if (!$reporter || !$engineer) {
    echo "No reporter and/or engineer found for the given id(s).\n";
    exit(1);
}

$bug = new Bug();
$bug->setDescription("Something does not work!");
$bug->setCreated(new DateTime("now"));
$bug->setStatus("OPEN");

foreach ($productIds as $productId) {
    /**@var Product $product*/
    try {
        $product = $entityManager->find("Product", $productId);
    } catch (\Doctrine\ORM\ORMException $e) {
        echo $e->getMessage();
    }
    $bug->assignToProduct($product);
}

/** @var User $reporter */
$bug->setReporter($reporter);
/** @var User $engineer */
$bug->setEngineer($engineer);

try {
    $entityManager->persist($bug);
    $entityManager->flush();
} catch (\Doctrine\ORM\ORMException $e) {
    echo $e->getMessage();
}

echo "Your new Bug Id: ".$bug->getId()."\n";