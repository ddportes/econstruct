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
            'cliente_nome'=>'cliente_nome',
            'cliente_cpf'=>'cliente_cpf',
            'cliente_rg'=>'cliente_rg',
            'cliente_sexo'=>'cliente_sexo',
            'cliente_estcivil'=>'cliente_estcivil',
            'cliente_profissao'=>'cliente_profissao',
            'cliente_nacionalidade'=>'cliente_nacionalidade',
            'cliente_naturalidade'=>'cliente_naturalidade',
            'cliente_endereco'=>'cliente_endereco',
            'cliente_logradouro'=>'cliente_logradouro',
            'cliente_bairro'=>'cliente_bairro',
            'cliente_numero'=>'cliente_numero',
            'cliente_complemento'=>'cliente_complemento',
            'cliente_cep'=>'cliente_cep',
            'cliente_cidade'=>'cliente_cidade',
            'cliente_estado'=>'cliente_estado',
            'cliente_conjuge_nome'=>'cliente_conjuge_nome',
            'cliente_conjuge_cpf'=>'cliente_conjuge_cpf',
            'cliente_conjuge_rg'=>'cliente_conjuge_rg',
            'cliente_conjuge_sexo'=>'cliente_conjuge_sexo',
            'cliente_conjuge_profissao'=>'cliente_conjuge_profissao',
            'cliente_conjuge_nacionalidade'=>'cliente_conjuge_nacionalidade',
            'cliente_conjuge_naturalidade'=>'cliente_conjuge_naturalidade',

            'empresa_razaosocial'=>'empresa_razaosocial',
            'empresa_cpfcnpj'=>'empresa_cpfcnpj',
            'empresa_inscricao'=>'empresa_inscricao',
            'empresa_endereco'=>'empresa_endereco',
            'empresa_logradouro'=>'empresa_logradouro',
            'empresa_numero'=>'empresa_numero',
            'empresa_complemento'=>'empresa_complemento',
            'empresa_bairro'=>'empresa_bairro',
            'empresa_cep'=>'empresa_cep',
            'empresa_cidade'=>'empresa_cidade',
            'empresa_estado'=>'empresa_estado',

            'representante_nome'=>'representante_nome',
            'representante_cpf'=>'representante_cpf',
            'representante_rg'=>'representante_rg',
            'representante_sexo'=>'representante_sexo',
            'representante_estcivil'=>'representante_estcivil',
            'representante_profissao'=>'representante_profissao',
            'representante_nacionalidade'=>'representante_nacionalidade',
            'representante_naturalidade'=>'representante_naturalidade',
            'representante_conjuge_nome'=>'representante_conjuge_nome',
            'representante_conjuge_cpf'=>'representante_conjuge_cpf',
            'representante_conjuge_rg'=>'representante_conjuge_rg',
            'representante_conjuge_sexo'=>'representante_conjuge_sexo',
            'representante_conjuge_profissao'=>'representante_conjuge_profissao',
            'representante_conjuge_nacionalidade'=>'representante_conjuge_nacionalidade',
            'representante_conjuge_naturalidade'=>'representante_conjuge_naturalidade',
            'representante_endereco'=>'representante_endereco',
            'representante_logradouro'=>'representante_logradouro',
            'representante_numero'=>'representante_numero',
            'representante_complemento'=>'representante_complemento',
            'representante_bairro'=>'representante_bairro',
            'representante_cep'=>'representante_cep',
            'representante_cidade'=>'representante_cidade',
            'representante_estado'=>'representante_estado',

            'projeto_descricao'=>'projeto_descricao',
            'projeto_custoestimado'=>'projeto_custoestimado',
            'projeto_datainicio'=>'projeto_datainicio',
            'projeto_dataentrega'=>'projeto_dataentrega',
            'projeto_terreno'=>'projeto_terreno',
            'projeto_areacobertaconstruida'=>'projeto_areacobertaconstruida',
            'projeto_areaabertaconstruida'=>'projeto_areaabertaconstruida',
            'projeto_areatotalconstruida'=>'projeto_areatotalconstruida',
            'projeto_ocupacao'=>'projeto_ocupacao',
            'projeto_frente'=>'projeto_frente',
            'projeto_fundo'=>'projeto_fundo',
            'projeto_endereco'=>'projeto_endereco',
            'projeto_logradouro'=>'projeto_logradouro',
            'projeto_numero'=>'projeto_numero',
            'projeto_complemento'=>'projeto_complemento',
            'projeto_bairro'=>'projeto_bairro',
            'projeto_cep'=>'projeto_cep',
            'projeto_cidade'=>'projeto_cidade',
            'projeto_estado'=>'projeto_estado',

            'orcamento_valor'=>'orcamento_valor',
            'orcamento_detalhes'=>'orcamento_detalhes',

            'contrato_dataassinatura'=>'contrato_dataassinatura',
            'contrato_dataassinaturaextenso'=>'contrato_dataassinaturaextenso',

            'error'=>''
        ];

        return $retorno;
    }

    public static function meses(){
        return [
            1=>'Janeiro',
            2=>'Fevereiro',
            3=>'Março',
            4=>'Abril',
            5=>'Maio',
            6=>'Junho',
            7=>'Julho',
            8=>'Agosto',
            9=>'Setembro',
            10=>'Outubro',
            11=>'Novembro',
            12=>'Dezembro',
        ];
    }

}