<?php

namespace App\Utility;

use Cake\Mailer\Email;

class Apoio{
    public static function generatePassword($qtyCaraceters = 8)
    {
        //Letras minúsculas embaralhadas
        $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');

        //Letras maiúsculas embaralhadas
        $capitalLetters = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');

        //Números aleatórios
        $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
        $numbers .= 1234567890;

        //Caracteres Especiais
        $specialCharacters = str_shuffle('!@#$%*-');

        //Junta tudo
        $characters = $capitalLetters.$smallLetters.$numbers;//.$specialCharacters;

        //Embaralha e pega apenas a quantidade de caracteres informada no parâmetro
        $password = substr(str_shuffle($characters), 0, $qtyCaraceters);

        //Retorna a senha
        return $password;
    }

    public static function enviaEmail($tipo,$corpo,$opcoes){
        $destino = $opcoes['email'];
        switch($tipo){
            case 'new_user':
                $assunto = '[e-Construct] Novo usuário';
                break;
            case 'reset_password':
                $assunto = '[e-Construct] Senha resetada';
                break;
            case 'error':
                $assunto = '[e-Construct] Erro';
                $destino = $opcoes['email_admin'];
                break;
        }

        $email = new Email('default');
        $email->from(['ddportes@gmail.com' => 'e-Construct'])
            ->emailFormat('html')
            ->to($destino)
            ->subject($assunto)
            ->send($corpo);

        return $email;
    }

    public static function mask($val, $mask)
    {
         $maskared = '';
         $k = 0;
         for($i = 0; $i<=strlen($mask)-1; $i++){
             if($mask[$i] == '#'){
                 if(isset($val[$k]))
                    $maskared .= $val[$k++];
             }else{
            if(isset($mask[$i]))
                $maskared .= $mask[$i];
            }
         }
         return $maskared;
    }

}