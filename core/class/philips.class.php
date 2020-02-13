<?php

/* * ***************************Includes********************************* */
  
require_once dirname(__FILE__) . '/../../../../core/php/core.inc.php';

class philips extends eqLogic { 
     
    public static function dependancy_info() {
      
      	log::add('philips', 'debug', '--- DEPENDANCY INFO ---');
      
      	$return = array(); 
      
		$return['log'] = 'philips_dep'; 
		$return['progress_file'] = '/tmp/philips_dependancy'; 
      
        $cmd = 'sudo /bin/bash ' . dirname(__FILE__) . '/../../ressources/info.sh';
        $cmd .= ' >> ' . log::getPathToLog('philips_dep') . ' 2>&1'; 
        
      	system(  $cmd, $code);
        
      	$return['state'] = ($code==0) ? 'ok' : 'nok'; 
        log::add('philips', 'debug', '--- DEPENDANCY ' . strtoupper($return['state']) . ' ---');
      	
		return $return; 
  	
    }

  	public static function dependancy_install() {
    
      	log::add('philips', 'debug', '--- DEPENDANCY INSTALL ---');
      
      	if (file_exists('/tmp/philips_dependancy')) { 
			return; 
		} 
      
		log::remove('philips_dep'); 
      
		$cmd = 'sudo /bin/bash ' . dirname(__FILE__) . '/../../ressources/install.sh'; 
		$cmd .= ' >> ' . log::getPathToLog('philips_dep') . ' 2>&1 &'; 
      
		exec($cmd); 
      
  	}
  
	// preInsert ⇒ Méthode appellée avant la création de votre objet

  	public function preInsert() {
    
      log::add('philips', 'debug', 'preInsert()');
      
    }
  
	// postInsert ⇒ Méthode appellée après la création de votre objet

  	public function postInsert() {
      
	  log::add('philips', 'debug', 'postInsert()');	
      
      log::add('philips', 'debug', 'postInsert()');
      
      	$cmd = new philipsCmd();
        $cmd->setName(__('OFF', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Standby');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 1);
		$cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Back', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Back');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 22);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Find', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Find');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 11);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Red', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'RedColour');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 7);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Green', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'GreenColour');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 8);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Yellow', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'YellowColour');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 9);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Blue', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'BlueColour');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 10);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Home', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Home');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 12);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('VolumeUp', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'VolumeUp');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 26);
        $cmd->setIsVisible(1);
        $cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('VolumeDown', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'VolumeDown');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 24);
        $cmd->setIsVisible(1);
        $cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Mute', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Mute');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 25);
        $cmd->setIsVisible(1);
        $cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Options', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Options');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 23);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Dot', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Dot');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 39);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('0', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Digit0');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 27);
        $cmd->setIsVisible(0);
		$cmd->save();
      
        $cmd = new philipsCmd();
        $cmd->setName(__('1', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Digit1');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 27);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('2', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Digit2');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 28);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('3', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Digit3');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 29);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('4', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Digit4');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 30);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('5', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Digit5');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 31);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('6', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Digit6');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 32);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('7', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Digit7');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 33);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('8', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Digit8');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 34);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('9', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Digit9');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 35);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Info', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Info');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 40);
        $cmd->setIsVisible(1);
        $cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('CursorUp', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'CursorUp');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 14);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('CursorDown', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'CursorDown');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 20);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('CursorLeft', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'CursorLeft');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 16);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('CursorRight', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'CursorRight');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 18);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Confirm', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Confirm');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 17);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Next', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Next');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 41);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Previous', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Previous');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 42);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Adjust', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Adjust');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 13);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('WatchTV', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'WatchTV');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 43);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Viewmode', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Viewmode');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 44);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Teletext', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Teletext');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 38);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Subtitle', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Subtitle');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 36);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('ChannelStepUp', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'ChannelStepUp');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 19);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('ChannelStepDown', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'ChannelStepDown');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 15);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Source', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Source');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 21);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('AmbilightOnOff', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'AmbilightOnOff');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 45);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('PlayPause', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'PlayPause');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 5);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Pause', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Pause');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 3);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('FastForward', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'FastForward');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 6);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Stop', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Stop');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 2);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Rewind', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Rewind');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
		$cmd->setConfiguration('order', 4);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Record', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Record');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 46);
        $cmd->setIsVisible(0);
		$cmd->save();
        
        $cmd = new philipsCmd();
        $cmd->setName(__('Online', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'Online');
		$cmd->setConfiguration('ApiType', 'key');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 47);
        $cmd->setIsVisible(0);
		$cmd->save();
		
		$cmd = new philipsCmd();
        $cmd->setName(__('HDMI 1', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'hdmi1');
		$cmd->setConfiguration('key_data2', 'KEYCODE_F1');
		$cmd->setConfiguration('ApiType', 'sources');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 48);
		$cmd->setIsVisible(0);
		$cmd->save();
		
		$cmd = new philipsCmd();
        $cmd->setName(__('HDMI 2', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'hdmi2');
		$cmd->setConfiguration('key_data2', 'KEYCODE_F2');
		$cmd->setConfiguration('ApiType', 'sources');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 49);
		$cmd->setIsVisible(0);
		$cmd->save();
		
		$cmd = new philipsCmd();
        $cmd->setName(__('HDMI 3', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'hdmi3');
		$cmd->setConfiguration('key_data2', 'KEYCODE_F3');
		$cmd->setConfiguration('ApiType', 'sources');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 50);
		$cmd->setIsVisible(0);
		$cmd->save();
		
		$cmd = new philipsCmd();
        $cmd->setName(__('HDMI 4', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'hdmi4');
		$cmd->setConfiguration('key_data2', 'KEYCODE_F4');
		$cmd->setConfiguration('ApiType', 'sources');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 50);
		$cmd->setIsVisible(0);
		$cmd->save();
		
		$cmd = new philipsCmd();
        $cmd->setName(__('HDMI 5', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'hdmi5');
		$cmd->setConfiguration('key_data2', 'KEYCODE_F5');
		$cmd->setConfiguration('ApiType', 'sources');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 50);
		$cmd->setIsVisible(0);
		$cmd->save();
		
		$cmd = new philipsCmd();
        $cmd->setName(__('HDMI 6', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'hdmi6');
		$cmd->setConfiguration('key_data2', 'KEYCODE_F6');
		$cmd->setConfiguration('ApiType', 'sources');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 50);
		$cmd->setIsVisible(0);
		$cmd->save();
		
		$cmd = new philipsCmd();
        $cmd->setName(__('HDMI Side', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'hdmiside');
		$cmd->setConfiguration('ApiType', 'sources');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 51);
		$cmd->setIsVisible(0);
		$cmd->save();
		
		$cmd = new philipsCmd();
        $cmd->setName(__('TV', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'tv');
		$cmd->setConfiguration('ApiType', 'sources');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 52);
		$cmd->setIsVisible(0);
		$cmd->save();
		
		$cmd = new philipsCmd();
        $cmd->setName(__('Satellite', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'satellite');
		$cmd->setConfiguration('ApiType', 'sources');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 53);
		$cmd->setIsVisible(0);
		$cmd->save();
		
		$cmd = new philipsCmd();
        $cmd->setName(__('EXT 1', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'ext1');
		$cmd->setConfiguration('ApiType', 'sources');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 54);
		$cmd->setIsVisible(0);
		$cmd->save();
		
		$cmd = new philipsCmd();
        $cmd->setName(__('EXT 2', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'ext2');
		$cmd->setConfiguration('ApiType', 'sources');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 55);
		$cmd->setIsVisible(0);
		$cmd->save();
		
		$cmd = new philipsCmd();
        $cmd->setName(__('Y Pb Pr', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'ypbpr');
		$cmd->setConfiguration('ApiType', 'sources');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 56);
      	$cmd->setIsVisible(0);
		$cmd->save();
		
		$cmd = new philipsCmd();
        $cmd->setName(__('VGA', __FILE__));
        $cmd->setEqLogic_id($this->id);
		$cmd->setConfiguration('key_data', 'vga');
		$cmd->setConfiguration('ApiType', 'sources');
        $cmd->setType('action');
        $cmd->setSubType('other');
        $cmd->setConfiguration('order', 57);
		$cmd->setIsVisible(0);
		$cmd->save();
      
    }

	// preUpdate ⇒ Méthode appellée avant la mise à jour de votre objet

	public function preUpdate() {
         
    	log::add('philips', 'debug', 'preUpdate()');
      
	}

  	// postUpdate ⇒ Méthode appellée après la mise à jour de votre objet

  	public function postUpdate() {
      
      	log::add('philips', 'debug', 'postUpdate()');
      
    }

  	// preSave ⇒ Méthode appellée avant la sauvegarde (creation et mise à jour donc) de votre objet

  	public function preSave() {   
      
      	log::add('philips', 'debug', 'preSave()');
      
    }

  	// postSave ⇒ Méthode appellée après la sauvegarde de votre objet

  	public function postSave() {
      
      	log::add('philips', 'debug', 'postSave0()');
            
    }

  	// preRemove ⇒ Méthode appellée avant la supression de votre objet

  	public function preRemove() {

      	log::add('philips', 'debug', 'preRemove()');
      
    }
  
  	// postRemove ⇒ Méthode appellée après la supression de votre objet

  	public function postRemove() {
      
      	log::add('philips', 'debug', 'postRemove()');
      
    }
    
}

class philipsCmd extends cmd {

	public function preSave() {
      
        if ($this->getConfiguration('key_data') == '') {
            throw new Exception(__('La clé data ne peut pas être vide',__FILE__));
        }
      
    }
    
    public function execute( $_options = null) {
	
		$eqLogic   = $this->getEqLogic();
      
        $IPaddress = $eqLogic->getConfiguration('IPaddress');
      	$user = $eqLogic->getConfiguration('user');
        $auth_key = $eqLogic->getConfiguration('auth_key');   

      	if( $user != "" && $auth_key != "" ) {
        	$request = "curl -k --digest -u".$user.":".$auth_key." -X POST https://".$IPaddress.":1926/6";
        } else {
          	$request = "curl -X POST http://".$IPaddress.":1925/1";
        }
      
        $api_type  = $this->getConfiguration('ApiType');
		$key_data  = $this->getConfiguration('key_data');
        
        switch($api_type) {
        
			case 'key':
            
            	$request .= "/input/key -v -k -d '{";
            	$request .= '"key":"';
            	$request .= $key_data;
            	$request .= '"}';
				$request .= "'";
            
            	$request_shell = new com_shell($request . ' 2>&1');
              	$result = trim($request_shell->exec());

              	return $result;
          
            break;
          
          	case 'volume':
            
            	if ($_options !== null && $_options !== '') {
              		$options = self::cmdToValue($_options);
              		if (is_json($_options)) {
                		$options = json_decode($_options, true);
              		}
            	} else {
              		$options = null;
            	}
            
            	if (isset($options['volume'])) {
              		$request .= "/audio/volume -d '{";
              		$request .= '"muted": false,"current":"';
              		$request .= $options['volume'];
              		$request .= '"}';
					$request .= "'";
                  
                  	$request_shell = new com_shell($request . ' 2>&1');
        			$result = trim($request_shell->exec());

        			return $result;
            	}
            
			break;

          	case 'sources':
            
            	$key_data2  = $this->getConfiguration('key_data2');
            
            	if( $key_data2 != "" ) {
                  
                  	$request .= "adb connect " . $IPaddress . " ; adb shell input keyevent " . $key_data2;
                  
            		$request_shell = new com_shell($request . ' 2>&1');
        			$result = trim($request_shell->exec());

        			return $result;
            
                } else {
                  
            		$request .= "/sources/current -d '{";
            		$request .= '"id":"';
            		$request .= $key_data;
            		$request .= '"}';
					$request .= "'";	
            
            		$request_shell = new com_shell($request . ' 2>&1');
        			$result = trim($request_shell->exec());

        			return $result;
            
                }
            
            	
                  
                  
            break;
            
          	default:
          
            break;
        
        }

    }
  
}