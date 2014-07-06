<?php
/**
 * @version     1.0.0
 * @package     com_ehl_members
 * @copyright   Copyright (C) 2014. Alle rettigheder forbeholdes.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Lars Mogensen <lars@enhedslisten.net> - http://www.webitall.dk
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

/**
 * Medlems list controller class.
 */
class Ehl_membersControllerMedlems extends JControllerAdmin
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function getModel($name = 'medlem', $prefix = 'Ehl_membersModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
    
    
	public static function import()
	{	//organization_id = 12
        
        $row = 1;
        $db = JFactory::getDbo();
        if (($handle = fopen("../media/import.csv", "r")) !== FALSE) {
            echo '<table border="1" cellpadding="3">';
            echo '<tr><td>Id</td><td>Navn</td><td>Adresse</td><td>Postnr</td><td>By</td><td>Telefon</td><td>Mobil</td><td>Arbejdstlf</td>
			<td>Mail</td><td>Mail2</td><td>Dobbeltmedl</td><td>Køn</td><td>Oprettet</td><td>Fødeår</td><td>C/O</td><td>Status</td>
			<td>Stednavn</td><td>Postbox</td><td>Uddannelse</td><td>Beskæftigelse</td><td>Fagforbund</td><td>Tillidshverv</td><td>Fagforening</td>
			<td>Tillidsposter udenfor Ø</td><td>Lokalt materiale</td><td>Noter1</td><td>Noter2</td><tr>';
            fgetcsv($handle, 5000, ",");
            while (($data = fgetcsv($handle, 5000, ";")) !== FALSE ) {
				$member = array();
				$member[id] = (int)$data[1];
				$member[name] = $data[0].' '.$data[2];
				$member[address] = $data[8].' '.$data[9];
				if( strlen($data[11])>0 ) {
					$member[address] .= ' '.$data[10];
				}
				if( strlen($data[13])>0 ) {
					$member[address] .= ', '.$data[13].'.';
				}
				if( strlen($data[15])>0 ) {
					$member[address] .= ' '.$data[15];
				}
				$member[zip] = (int)$data[19];
				$member[city] = $data[20];
				$member[phone] = $data[22];
				$member[mobile] = $data[23];
				$member[workphone] = $data[24];
				$member[email] = $data[25];
				$member[email2] = $data[26];
				$member[doublemember] = $data[10]=="1"?1:0;
				if( $data[4]=='Mand' ) { $member[gender]='m'; }
				else if($data[4]=='Kvinde' ) { $member[gender]='k'; }
				else {$member[gender]='0'; }
				$member[created] = date('Y-m-d',strtotime($data[3]));
				$member[birthyear] = $data[5];
				$member[coname] = $data[6];
				//if( $member[memberstatus] )
				if( mb_strtolower(substr($data[7],0,2)) == 'ø' ) { $member[memberstatus]='ø'; }
				else if( mb_strtolower(substr($data[7],0,2)) == 'me' ) { $member[memberstatus]='m'; }
				else if( mb_strtolower(substr($data[7],0,2)) == 'ud' ) { $member[memberstatus]='u'; }
				else { $member[memberstatus]='0'; }
				$member[placename] = $data[17];
				$member[postbox] = $data[18];
				$member[education] = $data[27];
				$member[job] = $data[28];
				$member[union1] = $data[29];
				$member[affiliations] = $data[30];
				$member[union2] = $data[31];
				$member[affiliations_outside] = $data[32];
				$member[materal] = $data[33];
				$member[localnotes] = $data[34];
				$member[localnotes2] = $data[35];
				

				echo '<tr><td>'.$member[id].'</td>';
				echo '<td>'.$member[name].'</td>';
				echo '<td>'.$member[address].'</td>';
				echo '<td>'.$member[zip].'</td>';
				echo '<td>'.$member[city].'</td>';
				echo '<td>'.$member[phone].'</td>';
				echo '<td>'.$member[mobile].'</td>';
				echo '<td>'.$member[workphone].'</td>';
				echo '<td>'.$member[email].'</td>';
				echo '<td>'.$member[email2].'</td>';
				echo '<td>'.$member[doublemember].'</td>';
				echo '<td>'.$member[gender].'</td>';
				echo '<td>'.$member[created].'</td>';
				echo '<td>'.$member[birthyear].'</td>';
				echo '<td>'.$member[coname].'</td>';
				echo '<td>'.$member[memberstatus].'</td>';
				echo '<td>'.$member[placename].'</td>';
				echo '<td>'.$member[postbox].'</td>';
				echo '<td>'.$member[education].'</td>';
				echo '<td>'.$member[job].'</td>';
				echo '<td>'.$member[union1].'</td>';
				echo '<td>'.$member[affiliations].'</td>';
				echo '<td>'.$member[union2].'</td>';
				echo '<td>'.$member[affiliations_outside].'</td>';
				echo '<td>'.$member[materal].'</td>';
				echo '<td>'.$member[localnotes].'</td>';
				echo '<td>'.$member[localnotes2].'</td></tr>';
				
               
                $query = $db->getQuery(true)
					->select('*')
					->from('#__ehl_members')
					->where('id='.(int)$member[id]);
				$db->setQuery($query);
				$row = $db->loadObject(); 
				
				 $query = $db->getQuery(true);
				if( (int)$row->id > 0 ) {
					$query->update('#__ehl_members')
						->where('id='.(int)$member[id]);
				}
				else {
					$query->insert('#__ehl_members')
						->set('state=1');
				}
				$update = false; $mapupdate=false;
				foreach( $member AS $key => $value ) {
					if( $row->{$key} != $value ) {
						$query->set($key.'='.$db->quote($value));
						if( $key='address') { $mapupdate=true; }
						$update = true;
					}
				}
				if( $mapupdate ) {
					sleep(1);
					$geodata = self::getLocation( $member[address].' '.$member[zip].' '.$member[city] );
					$query->set('maps_latt='.$db->quote($geodata[lat]));
					$query->set('maps_lang='.$db->quote($geodata[lng]));
				}
				
				if( $update ) {
					$query->set('updated=NOW()');
					$db->setQuery($query);
					$db->execute(); 
				}
				
				               
            }
            echo '</table>';
            fclose($handle);
        }
	}
	
	public static function getLocation($address=""){
        if( $address == "" ) { $address = "Lindevej 8 6710 Esbjerg V"; }
        
        $url = 'http://maps.google.com/maps/api/geocode/json?sensor=false&address='.urlencode($address);
       
        $resp_json = self::curl_file_get_contents($url);
        $resp = json_decode($resp_json, true);

        if($resp['status']='OK'){
            //echo $address.'<pre>'; 
            //var_dump($resp['results'] );
            //echo '</pre><br>';
            return $resp['results'][0]['geometry']['location'];
        }else{
            return false;
        }
    }
    
    private static function curl_file_get_contents($URL){
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $URL);
        $contents = curl_exec($c);
        curl_close($c);

        if ($contents) return $contents;
            else return FALSE;
    }
	
	
	
	/**
	 * Method to save the submitted ordering values for records via AJAX.
	 *
	 * @return  void
	 *
	 * @since   3.0
	 */
	public function saveOrderAjax()
	{
		// Get the input
		$input = JFactory::getApplication()->input;
		$pks = $input->post->get('cid', array(), 'array');
		$order = $input->post->get('order', array(), 'array');

		// Sanitize the input
		JArrayHelper::toInteger($pks);
		JArrayHelper::toInteger($order);

		// Get the model
		$model = $this->getModel();

		// Save the ordering
		$return = $model->saveorder($pks, $order);

		if ($return)
		{
			echo "1";
		}

		// Close the application
		JFactory::getApplication()->close();
	}
    
    
    
}