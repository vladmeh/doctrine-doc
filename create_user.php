<?php
/**
 * Created by Alpha-Hydro.
 * @link http://www.alpha-hydro.com
 * @author Vladimir Mikhaylov <admin@alpha-hydro.com>
 * @copyright Copyright (c) 2018, Alpha-Hydro
 *
 */

require_once "bootstrap.php";

$newUsername = $argv[1];

$user = new User();
$user->setName($newUsername);

try {
    $entityManager->persist($user);
    $entityManager->flush();
} catch (\Doctrine\ORM\ORMException $e) {
    echo $e->getMessage();
}

echo "Created User with ID " . $user->getId() . "\n";