<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{

    public $autoId = false;

    public function up()
    {

        $this->table('cliente_situacoes')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 125,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('clientes')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('pessoa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('cliente_situacao_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('observacao', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'pessoa_id',
                ]
            )
            ->addIndex(
                [
                    'cliente_situacao_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('contatos')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('pessoa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('tipo', 'string', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('valor', 'string', [
                'default' => null,
                'limit' => 125,
                'null' => true,
            ])
            ->addColumn('principal', 'string', [
                'default' => null,
                'limit' => 1,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'pessoa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('contratos')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('projeto_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('orcamento_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('data_assinatura', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('minuta', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'projeto_id',
                ]
            )
            ->addIndex(
                [
                    'orcamento_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('dependentes')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('pessoa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('pai_mae_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'pessoa_id',
                ]
            )
            ->addIndex(
                [
                    'pai_mae_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('empresas')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('tipo', 'string', [
                'default' => null,
                'limit' => 1,
                'null' => false,
            ])
            ->addColumn('cpf_cnpj', 'string', [
                'default' => null,
                'limit' => 15,
                'null' => false,
            ])
            ->addColumn('inscricao', 'string', [
                'default' => null,
                'limit' => 63,
                'null' => true,
            ])
            ->addColumn('razao_social', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('nome_fantasia', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('data_inicio', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('data_fim', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('mensal', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 17,
                'scale' => 2,
            ])
            ->addColumn('observacao', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('endereco_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('representante_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('telefone', 'string', [
                'default' => null,
                'limit' => 63,
                'null' => true,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 125,
                'null' => true,
            ])
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->addIndex(
                [
                    'endereco_id',
                ]
            )
            ->addIndex(
                [
                    'representante_id',
                ]
            )
            ->create();

        $this->table('enderecos')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('pessoa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('logradouro', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('numero', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('complemento', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('bairro', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('cep', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('cidade', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('estado', 'string', [
                'default' => null,
                'limit' => 2,
                'null' => true,
            ])
            ->addColumn('principal', 'string', [
                'default' => null,
                'limit' => 1,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'pessoa_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('equipe_pedreiros')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('equipe_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('pedreiro_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'equipe_id',
                ]
            )
            ->addIndex(
                [
                    'pedreiro_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('equipes')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('projeto_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'projeto_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('fornecedor_situacoes')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('fornecedores')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('fornecedor_situacao_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('observacao', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('pessoa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'fornecedor_situacao_id',
                ]
            )
            ->addIndex(
                [
                    'pessoa_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('itens')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('nota_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('produto_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('observacao', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('valor', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 17,
                'scale' => 2,
            ])
            ->addColumn('desconto_valor', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 17,
                'scale' => 2,
            ])
            ->addColumn('desconto_percentual', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 17,
                'scale' => 2,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'produto_id',
                ]
            )
            ->addIndex(
                [
                    'nota_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('modelo_tipos')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 63,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('modelos')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('modelo_tipo_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('modelo', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 63,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'modelo_tipo_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->create();

        $this->table('modificacoes')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('datahora', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('controller', 'string', [
                'default' => null,
                'limit' => 125,
                'null' => false,
            ])
            ->addColumn('action', 'string', [
                'default' => null,
                'limit' => 125,
                'null' => false,
            ])
            ->addColumn('dados_originais', 'text', [
                'default' => null,
                'limit' => 4294967295,
                'null' => false,
            ])
            ->addColumn('dados_novos', 'text', [
                'default' => null,
                'limit' => 4294967295,
                'null' => false,
            ])
            ->create();

        $this->table('notas')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('projeto_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('data', 'date', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('valor', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 17,
                'scale' => 2,
            ])
            ->addColumn('fornecedor_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'projeto_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->addIndex(
                [
                    'fornecedor_id',
                ]
            )
            ->create();

        $this->table('ocorrencia_tipos')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('ocorrencias')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('ocorrencia_tipo_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('projeto_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('observacao', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('data', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('data_pendencia', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'ocorrencia_tipo_id',
                ]
            )
            ->addIndex(
                [
                    'projeto_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('orcamentos')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('projeto_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('custo', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 17,
                'scale' => 2,
            ])
            ->addColumn('total', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 17,
                'scale' => 2,
            ])
            ->addColumn('data_inicial', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('data_entrega', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('observacao', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'projeto_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('papeis')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 63,
                'null' => false,
            ])
            ->addColumn('papel_pai_id', 'integer', [
                'default' => null,
                'limit' => 10,
                'null' => true,
                'signed' => false,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('pedreiro_situacoes')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 125,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('pedreiros')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('pessoa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('pedreiro_situacao_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('observacao', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'pessoa_id',
                ]
            )
            ->addIndex(
                [
                    'pedreiro_situacao_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('permissao_papeis')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('permissao_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('papel_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'papel_id',
                ]
            )
            ->addIndex(
                [
                    'permissao_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('permissoes')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 125,
                'null' => false,
            ])
            ->addColumn('descricao_amigavel', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('permissao_pai_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('pessoas')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('nome', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('nome_social', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('estado_civil', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('conjuge_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('filhos', 'integer', [
                'default' => '0',
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('sexo', 'string', [
                'default' => null,
                'limit' => 1,
                'null' => true,
            ])
            ->addColumn('tipo', 'string', [
                'default' => null,
                'limit' => 1,
                'null' => false,
            ])
            ->addColumn('cpf_cnpj', 'string', [
                'default' => null,
                'limit' => 15,
                'null' => true,
            ])
            ->addColumn('rg', 'string', [
                'default' => null,
                'limit' => 125,
                'null' => true,
            ])
            ->addColumn('data_nascimento', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'conjuge_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('produto_tipos')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('produtos')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('produto_pai_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('produto_tipo_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'produto_tipo_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'produto_pai_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('projeto_situacoes')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 125,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('projetos')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('descricao', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('detalhes', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('cliente_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('pasta_projeto', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('projeto_situacao_id', 'integer', [
                'default' => '1',
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('contrato_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('custo_estimado', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 17,
                'scale' => 2,
            ])
            ->addColumn('terreno', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 17,
                'scale' => 2,
            ])
            ->addColumn('frente', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 17,
                'scale' => 2,
            ])
            ->addColumn('fundo', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 17,
                'scale' => 2,
            ])
            ->addColumn('area_construida_coberta', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 17,
                'scale' => 2,
            ])
            ->addColumn('area_construida_aberta', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 17,
                'scale' => 2,
            ])
            ->addColumn('observacao', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('endereco_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'projeto_situacao_id',
                ]
            )
            ->addIndex(
                [
                    'cliente_id',
                ]
            )
            ->addIndex(
                [
                    'contrato_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->addIndex(
                [
                    'endereco_id',
                ]
            )
            ->create();

        $this->table('recebimentos')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('projeto_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('valor', 'decimal', [
                'default' => null,
                'null' => false,
                'precision' => 17,
                'scale' => 2,
            ])
            ->addColumn('data', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('observacao', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'projeto_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('recibos')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('equipe_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('projeto_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('valor', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 17,
                'scale' => 2,
            ])
            ->addColumn('data', 'date', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'equipe_id',
                ]
            )
            ->addIndex(
                [
                    'projeto_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('rendas')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('fonte_pagadora', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('tipo', 'string', [
                'default' => null,
                'limit' => 1,
                'null' => true,
            ])
            ->addColumn('cpf_cnpj', 'string', [
                'default' => null,
                'limit' => 15,
                'null' => true,
            ])
            ->addColumn('renda_bruta', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 17,
                'scale' => 2,
            ])
            ->addColumn('renda_liquida', 'decimal', [
                'default' => null,
                'null' => true,
                'precision' => 17,
                'scale' => 2,
            ])
            ->addColumn('pessoa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'pessoa_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('user_papeis')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('papel_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'papel_id',
                ]
            )
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'user_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();

        $this->table('users')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('username', 'string', [
                'default' => null,
                'limit' => 63,
                'null' => true,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('status', 'string', [
                'default' => null,
                'limit' => 31,
                'null' => true,
            ])
            ->addColumn('hash', 'string', [
                'default' => null,
                'limit' => 1023,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('empresa_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('u_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addIndex(
                [
                    'empresa_id',
                ]
            )
            ->addIndex(
                [
                    'u_id',
                ]
            )
            ->create();
    }

    public function down()
    {
        $this->table('cliente_situacoes')->drop()->save();
        $this->table('clientes')->drop()->save();
        $this->table('contatos')->drop()->save();
        $this->table('contratos')->drop()->save();
        $this->table('dependentes')->drop()->save();
        $this->table('empresas')->drop()->save();
        $this->table('enderecos')->drop()->save();
        $this->table('equipe_pedreiros')->drop()->save();
        $this->table('equipes')->drop()->save();
        $this->table('fornecedor_situacoes')->drop()->save();
        $this->table('fornecedores')->drop()->save();
        $this->table('itens')->drop()->save();
        $this->table('modelo_tipos')->drop()->save();
        $this->table('modelos')->drop()->save();
        $this->table('modificacoes')->drop()->save();
        $this->table('notas')->drop()->save();
        $this->table('ocorrencia_tipos')->drop()->save();
        $this->table('ocorrencias')->drop()->save();
        $this->table('orcamentos')->drop()->save();
        $this->table('papeis')->drop()->save();
        $this->table('pedreiro_situacoes')->drop()->save();
        $this->table('pedreiros')->drop()->save();
        $this->table('permissao_papeis')->drop()->save();
        $this->table('permissoes')->drop()->save();
        $this->table('pessoas')->drop()->save();
        $this->table('produto_tipos')->drop()->save();
        $this->table('produtos')->drop()->save();
        $this->table('projeto_situacoes')->drop()->save();
        $this->table('projetos')->drop()->save();
        $this->table('recebimentos')->drop()->save();
        $this->table('recibos')->drop()->save();
        $this->table('rendas')->drop()->save();
        $this->table('user_papeis')->drop()->save();
        $this->table('users')->drop()->save();
    }
}
