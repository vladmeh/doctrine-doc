<?php
/**
 * Created by Alpha-Hydro.
 * @link http://www.alpha-hydro.com
 * @author Vladimir Mikhaylov <admin@alpha-hydro.com>
 * @copyright Copyright (c) 2018, Alpha-Hydro
 *
 */

use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once "bootstrap.php";

return ConsoleRunner::createHelperSet($entityManager);