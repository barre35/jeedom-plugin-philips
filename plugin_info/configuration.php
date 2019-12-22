<?php

require_once dirname(__FILE__) . '/../../../core/php/core.inc.php';

include_file('core', 'authentification', 'php');

if (!isConnect('admin')) {
	throw new Exception('{{401 - Accès non autorisé}}');
}

?>