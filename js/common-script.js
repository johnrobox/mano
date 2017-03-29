/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// Defined javascript base url
    var url = 2;
    var server_url = '';
    switch (url) {
        case 1:
            server_url = 'http://localhost/mano/';
            break;
        case 2 :
            server_url = 'http://mano.local/';
            break;
        default:
            server_url = 'http://localhost';
            
    }
    var base_url = server_url + "index.php/administrator/";