<?php

require_once dirname(__FILE__) . '/../../../core/php/core.inc.php';

include_file('core', 'authentification', 'php');

if (!isConnect('admin')) {
	throw new Exception('{{401 - Accès non autorisé}}');
}

?>
  
<!-- ============= -->
<!-- == Install == -->
<!-- ============= -->

<?php
  
function philips_install() {

	log::add('philips', 'debug', '--- INSTAL ---');
  
}

?>
  
<!-- ============ -->
<!-- == Update == -->
<!-- ============ -->

<?php
  
function philips_update() {

	log::add('philips', 'debug', '--- UPDATE ---');
  
}

?>
  
<!-- ============ -->
<!-- == Remove == -->
<!-- ============ -->

<?php
  
function philips_remove() {

  	log::add('philips', 'debug', '--- REMOVE ---');
  
}

?>