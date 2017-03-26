/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Defined javascript base url
    var url = 1;
    var base_url = '';
    var live_base_segment = "/index.php/admin/";
    var base_segment = '/mano/index.php/administrator/';
    switch (url) {
        case 1:
            base_url = 'http://localhost' + base_segment;
            break;
        case 2 :
            base_url = 'http://practice.com' + base_segment;
            break;
        case 3 :
            // subject to change, it depends on registered ip address
            base_url = 'http://192.168.0.3' + base_segment;
            break;
        case 4 :
            base_url = 'http://localhost:8888' + base_segment;
            break;
	    case 5 :
		    base_url = "http://kapai-coredrops.ml" + live_base_segment;
			break;
        default:
            base_url = 'http://localhost' + base_segment;
            
    }
    