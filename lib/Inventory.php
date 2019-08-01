<?php

class inventory {
    public function PriceList(){
        // set up basic connection 
        $ftp_server = "ftp.comideac.com"; 
        $conn_id = ftp_ssl_connect($ftp_server); 

        // login with username and password 
        $ftp_user_name = "garcia.daniel@ideac.com.mx"; 
        $ftp_user_pass = "zWab!Llz-_j)"; 
        $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 
        ftp_pasv($conn_id, true); 
        // check connection 
        if ((!$conn_id) || (!$login_result)) { 
            echo "FTP connection has failed!"; 
            echo "Attempted to connect to $ftp_server for user $ftp_user_name"; 
            exit; 
        } else { 
            echo "Connected to $ftp_server, for user $ftp_user_name"; 
        } 

        if (ftp_chdir($conn_id, "ideac.com.mx/inventario")) {
            echo "\nCurrent directory is now: " . ftp_pwd($conn_id) . "\n";
            if (ftp_get($conn_id, 'ideac '.date('d-m-y').'.csv', 'inventario.csv', FTP_BINARY)) {
                echo "Se ha guardado satisfactoriamente en 'ideac ".date('d-m-y').".csv'\n";
                rename($_SERVER['DOCUMENT_ROOT'].'/magentoBridge/lib/ideac '.date('d-m-y').'.csv', $_SERVER['DOCUMENT_ROOT'].'/magentoBridge/lib/inventario.csv');
            } else {
                echo "Ha habido un problema\n";
            }
        } else { 
            echo "Couldn't change directory\n";
        }

        $buff = ftp_rawlist($conn_id, '.'); 
        //var_dump($buff); 
        ftp_close($conn_id); 
    }
}
$a = new inventory;
$a->PriceList();