
function addCmdToTable(_cmd) {
  
	var tr = '';
  
    if (!isset(_cmd)) {
        var _cmd = {configuration: {}};
    }
  
  console.log( _cmd);
    tr += '<tr class="cmd" data-cmd_id="' + init(_cmd.id) + '">';
    tr += ' <td>';
    tr += '  <span class="cmdAttr" data-l1key="id">';
    tr += ' </td>';
    tr += ' <td>';
    tr += '  <span class="cmdAttr" data-l1key="name">';
  	tr += ' </td>';
    tr += ' <td>';
    tr += '  <span class="cmdAttr" data-l1key="type"></span>';
    tr += ' </td>';
    tr += ' <td>';
    tr += '  <span class="cmdAttr" data-l1key="configuration" data-l2key="ApiType"></span>';
    tr += ' </td>';
    tr += ' <td>';
    tr += '  <span class="cmdAttr" data-l1key="configuration" data-l2key="key_data"></span>';
    tr += ' </td>';
    tr += ' <td>';
    tr += '  <span><input type="checkbox" class="cmdAttr checkbox-inline" data-l1key="isVisible" /> {{Affichage}}<br/></span>';
	tr += ' </td>';
    tr += ' <td>';
    if (is_numeric(_cmd.id)) {
        tr += '<a class="btn btn-default btn-xs cmdAction expertModeVisible" data-action="configure"><i class="fa fa-cogs"></i></a> ';
        tr += '<a class="btn btn-default btn-xs cmdAction" data-action="test"><i class="fa fa-rss"></i> {{Tester}}</a>';
    }
    //tr += '  <i class="fa fa-minus-circle pull-right cmdAction cursor" data-action="remove"></i>';
  	tr += ' </td>';
    tr += '</tr>';
  
    $('#table_cmd tbody').append(tr);
    $('#table_cmd tbody tr:last').setValues(_cmd, '.cmdAttr');
  
    jeedom.cmd.changeType($('#table_cmd tbody tr:last'), init(_cmd.subType));
  
}
                     
function getKey( ) {

  $('.eqLogicAttr[data-l1key=configuration][data-l2key=user]').val(Date.now()); 
    
  $.ajax({
        url: "plugins/philips/core/ajax/philips.php",
        dataType: 'json',
    	type: 'post',
    	data: { 
          "action" : "pair",
          "ip" : $('.eqLogicAttr[data-l1key=configuration][data-l2key=IPaddress]').val(),
          "user" : $('.eqLogicAttr[data-l1key=configuration][data-l2key=user]').val() 
        },
    	complete : function(resultat){ 
          
           	console.log("*** COMPLETE ***");
            
          	console.log(resultat);
          
            var data = JSON.parse(resultat.responseText);        
          
            var obj = JSON.parse(data.result);  
          
            console.log(obj);
          
          	if( obj.error_id == "SUCCESS" ) {
              
            	$('.eqLogicAttr[data-l1key=configuration][data-l2key=auth_key]').val( obj.auth_key );
                $('.eqLogicAttr[data-l1key=configuration][data-l2key=timestamp]').val( obj.timestamp );
                $('.eqLogicAttr[data-l1key=configuration][data-l2key=timeout]').val( obj.timeout );
              
			} 
          
        }		
  });

}



function getToken( ) {

  $.ajax({
        url: "plugins/philips/core/ajax/philips.php",
        dataType: 'json',
    	type: 'post',
    	data: { 
            "action" : "grant",
          	"ip" : $('.eqLogicAttr[data-l1key=configuration][data-l2key=IPaddress]').val(),
            "pin" : $('.eqLogicAttr[data-l1key=configuration][data-l2key=pin]').val(), 
            "timestamp" : $('.eqLogicAttr[data-l1key=configuration][data-l2key=timestamp]').val(),
            "user" : $('.eqLogicAttr[data-l1key=configuration][data-l2key=user]').val(),
            "auth_key" : $('.eqLogicAttr[data-l1key=configuration][data-l2key=auth_key]').val()
        },
    	complete : function(resultat){ 
          
           	console.log("*** COMPLETE ***");
            
          	console.log(resultat);
          
          	var data = JSON.parse(resultat.responseText);        
          
            var obj = JSON.parse(data.result);  
          
            console.log(obj);
          
          	if( obj.error_id == "SUCCESS" ) {
              
            	$('.eqLogicAttr[data-l1key=configuration][data-l2key=auth_key]').val( obj.auth_key );
                $('.eqLogicAttr[data-l1key=configuration][data-l2key=timestamp]').val( obj.timestamp );
                $('.eqLogicAttr[data-l1key=configuration][data-l2key=timeout]').val( obj.timeout );
              
			} 
          
        }		
  });

}