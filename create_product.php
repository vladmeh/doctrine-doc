<?php
/**
 * Created by Alpha-Hydro.
 * @link http://www.alpha-hydro.com
 * @author Vladimir Mikhaylov <admin@alpha-hydro.com>
 * @copyright Copyright (c) 2018, Alpha-Hydro
 *
 */

require_once "bootstrap.php";

$newProductName = $argv[1];

$product = new Product();
$product->setName($newProductName);

try {
    $entityManager->persist($product);
    $entityManager->flush();
} catch (\Doctrine\ORM\ORMException $e) {
    echo $e->getMessage();
}

echo "Created Product with ID " . $product->getId() . "\n";