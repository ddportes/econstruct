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

    public static function tags(){
        $retorno = [
            'nome_cliente'=>'nome_cliente',
            'cpf_cliente'=>'cpf_cliente',
            'rg_cliente'=>'rg_cliente',
            'endereco_cliente'=>'endereco_cliente',
            'razaosocial_empresa'=>'razaosocial_empresa',
            'cpfcnpj_empresa'=>'cpfcnpj_empresa',
            'inscricao_empresa'=>'inscricao_empresa',
            'endereco_empresa'=>'endereco_empresa',
            'nome_conjuge'=>'nome_conjuge',
            'cpf_conjuge'=>'cpf_conjuge',
            'rg_conjuge'=>'rg_conjuge',
            'descricao_projeto'=>'descricao_projeto',
            'custoestimado_projeto'=>'custoestimado_projeto',
            'datainicio_projeto'=>'datainicio_projeto',
            'dataentrega_projeto'=>'dataentrega_projeto',
            'terreno_projeto'=>'terreno_projeto',
            'areacobertaconstruida_projeto'=>'areacobertaconstruida_projeto',
            'areaabertaconstruida_projeto'=>'areaabertaconstruida_projeto',
            'areatotalconstruida_projeto'=>'areatotalconstruida_projeto',
            'ocupacao_projeto'=>'ocupacao_projeto',
            'endereco_projeto'=>'endereco_projeto',
            'valor_orcamento'=>'valor_orcamento',
            'detalhes_orcamento'=>'detalhes_orcamento',
            'dataassinatura_contrato'=>'dataassinatura_contrato',
            'dataassinaturaextenso_contrato'=>'dataassinaturaextenso_contrato',
            'error'=>''
        ];

        return $retorno;
    }

    public function meses(){
        return [
            [1=>'Janeiro'],
            [2=>'Fevereiro'],
            [3=>'Março'],
            [4=>'Abril'],
            [5=>'Maio'],
            [6=>'Junho'],
            [7=>'Julho'],
            [8=>'Agosto'],
            [9=>'Setembro'],
            [10=>'Outubro'],
            [11=>'Novembro'],
            [12=>'Dezembro'],
        ];
    }

}