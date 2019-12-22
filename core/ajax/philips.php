<?php

/* This file is part of Jeedom.
 *
 * Jeedom is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Jeedom is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Jeedom. If not, see <http://www.gnu.org/licenses/>.
 */

try {
    require_once dirname(__FILE__) . '/../../../../core/php/core.inc.php';
    include_file('core', 'authentification', 'php');

    if (!isConnect('admin')) {
        throw new Exception(__('401 - Accès non autorisé', __FILE__));
    }

    if ( init('action') == 'grant' ) {
      
		$input = '{ "auth" : { "auth_AppId" : "1" , "pin" : "' . $_POST['pin'] . '" , "auth_timestamp" : "" , "auth_signature" : "" } , "device" : { "device_name" : "heliotrope", "device_os" : "Android", "app_name" : "ApplicationName", "type" : "native" , "app_id": "app.id" , "id" : "' . $_POST['user'] . '" } }';
  
        $ch = curl_init();
  
      	$ip = init('ip');
      
        curl_setopt($ch, CURLOPT_URL, "https://".$ip.":1926/6/pair/grant");
      	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
        curl_setopt($ch, CURLOPT_USERPWD, $_POST['user'] . ":" . $_POST['auth_key']);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $input ); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json', 'Accept: application/json' ));
  
  		$output = curl_exec($ch);
  
  		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  
  		curl_close($ch);
      
  		ajax::success($httpcode);

	} else if ( init('action') == 'pair') {
      
    	$input = '{ "scope" :  [ "read", "write", "control"] , "device" : { "device_name" : "heliotrope", "device_os" : "Android", "app_name" : "ApplicationName", "type" : "native" , "app_id": "app.id" , "id" : "' . $_POST['user'] . '" } }';
  
        $ch = curl_init();

      	$ip = init('ip');
      
        curl_setopt($ch, CURLOPT_URL, "https://".$ip.":1926/6/pair/request");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $input ); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json', 'Accept: application/json' ));

        $output = curl_exec($ch);

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        ajax::success($output);
      
    }
    
	throw new Exception(__('Aucune methode correspondante à : ', __FILE__) . init('action'));
  
} catch (Exception $e) {
  
    ajax::error(displayExeption($e), $e->getCode());
  
}
  
?>