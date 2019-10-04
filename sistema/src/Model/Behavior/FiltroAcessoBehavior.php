<?php

namespace App\Model\Behavior;

use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Query;

class FiltroAcessoBehavior extends Behavior
{

    public function initialize(array $config)
    {
        parent::initialize($config);
    }

    public function beforeFind(Event $event, Query $query, \ArrayObject $options, $primary)
    {

        if (!$primary || !isset($_SESSION) || !isset($_SESSION['Auth']) /*|| $usuario['id'] == 1*/)
            return $query;

        /** @var Usuario $usuario */
        $nomeTabelaQuery = $event->getSubject()->getAlias();

        if(isset($_SESSION['Auth']['User'])) {
            $usuario = $_SESSION['Auth']['User'];
        }

        switch ($nomeTabelaQuery) {
            case 'UsersPapeis':
                if(isset($usuario)) {
                    $conditions = [];

                    $conditions[] = ['UsersPapeis.empresa_id =' => $usuario['empresa_id']];

                    $query->andWhere(['AND' => $conditions]);
                }
                break;
            case 'Rendas':
                $conditions = [];

                $conditions[] = ['Rendas.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Recibos':
                $conditions = [];

                $conditions[] = ['Recibos.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Recebimentos':
                $conditions = [];

                $conditions[] = ['Recebimentos.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Projetos':
                $conditions = [];

                $conditions[] = ['Projetos.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'ProjetoSituacoes':
                $conditions = [];

                $conditions[] = ['ProjetoSituacoes.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'ProdutoTipos':
                $conditions = [];

                $conditions[] = ['ProdutoTipos.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Produtos':
                $conditions = [];

                $conditions[] = ['Produtos.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Pessoas':
                $conditions = [];

                $conditions[] = ['Pessoas.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Permissoes':
                if(isset($usuario)) {
                    $conditions = [];

                    $conditions[] = ['Permissoes.empresa_id =' => $usuario['empresa_id']];

                    $query->andWhere(['AND' => $conditions]);
                }
                break;
            case 'PermissaoPapeis':
                if(isset($usuario)) {
                    $conditions = [];

                    $conditions[] = ['PermissaoPapeis.empresa_id =' => $usuario['empresa_id']];

                    $query->andWhere(['AND' => $conditions]);
                }
                break;
            case 'Pedreiros':
                $conditions = [];

                $conditions[] = ['Pedreiros.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'PedreiroSituacoes':
                $conditions = [];

                $conditions[] = ['PedreiroSituacoes.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Papeis':
                if(isset($usuario)) {
                    $conditions = [];

                    $conditions[] = ['Papeis.empresa_id =' => $usuario['empresa_id']];

                    $query->andWhere(['AND' => $conditions]);
                }
                break;
            case 'Orcamentos':
                $conditions = [];

                $conditions[] = ['Orcamentos.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'OcorrenciaTipos':
                $conditions = [];

                $conditions[] = ['OcorrenciaTipos.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Ocorrencias':
                $conditions = [];

                $conditions[] = ['Ocorrencias.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Notas':
                $conditions = [];

                $conditions[] = ['Notas.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'FornecedorSituacoes':
                $conditions = [];

                $conditions[] = ['FornecedorSituacoes.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Fornecedores':
                $conditions = [];

                $conditions[] = ['Fornecedores.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Equipes':
                $conditions = [];

                $conditions[] = ['Equipes.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'EquipePedreiros':
                $conditions = [];

                $conditions[] = ['EquipePedreiros.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Enderecos':
                $conditions = [];

                $conditions[] = ['Enderecos.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Empresas':
                $conditions = [];
                if($usuario['empresa_id'] <> 0) {
                    $conditions[] = ['Empresas.id =' => $usuario['empresa_id']];
                    $query->andWhere(['AND' => $conditions]);
                }
                break;
            case 'Contratos':
                $conditions = [];

                $conditions[] = ['Contratos.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Contatos':
                $conditions = [];

                $conditions[] = ['Contatos.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Clientes':
                $conditions = [];

                $conditions[] = ['Clientes.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'ClienteSituacoes':
                $conditions = [];

                $conditions[] = ['ClienteSituacoes.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Dependentes':
                $conditions = [];

                $conditions[] = ['Dependentes.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Modificacoes':
                $conditions = [];

                $conditions[] = ['Modificacoes.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Configuracoes':
                $conditions = [];

                $conditions[] = ['Configuracoes.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;
            case 'Itens':
                $conditions = [];

                $conditions[] = ['Itens.empresa_id =' => $usuario['empresa_id']];

                $query->andWhere(['AND' => $conditions]);
                break;

        }

        return $query;
    }
}