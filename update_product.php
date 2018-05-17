<?php
/**
 * Created by Alpha-Hydro.
 * @link http://www.alpha-hydro.com
 * @author Vladimir Mikhaylov <admin@alpha-hydro.com>
 * @copyright Copyright (c) 2018, Alpha-Hydro
 *
 */
require_once "bootstrap.php";

$id = $argv[1];
$newName = $argv[2];

try {
    $product = $entityManager->find('Product', $id);
} catch (\Doctrine\ORM\ORMException $e) {
    echo $e->getMessage();
}

if ($product === null) {
    echo "Product $id does not exist.\n";
    exit(1);
}

$product->setName($newName);

try {
    $entityManager->flush();
} catch (\Doctrine\ORM\ORMException $e) {
    echo $e->getMessage();
}