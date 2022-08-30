<?php

    namespace src\Services;

    class ApiServices{
        private static $curl;
        private static $output;
        public static function callApi($cep){
            if(self::$curl == null){
                try{
                    //Iniciando curl
                    self::$curl = curl_init(); 
                    //Informando a url da API para utilizar 
                    curl_setopt(self::$curl, CURLOPT_URL, "https://viacep.com.br/ws/".$cep."/json");
                    //return transfer string
                    curl_setopt(self::$curl, CURLOPT_RETURNTRANSFER, 1);

                    self::$output = curl_exec(self::$curl);

                    curl_close(self::$curl);
                }catch(Exception $err){
                    echo 'Error connect to api';
                    error_log($err->getMessage());
                }
            }
            return self::$output;
        }

    }


?>