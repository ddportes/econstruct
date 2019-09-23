-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 23-Set-2019 às 15:55
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `econstruct`
--

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `pessoa_id`, `cliente_situacao_id`, `observacao`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, 1, 1, NULL, '2019-09-16 18:50:28', '2019-09-16 18:50:28', 1, 1),
(2, 5, 1, NULL, '2019-09-16 21:10:20', '2019-09-16 21:10:20', 1, 1);

--
-- Extraindo dados da tabela `cliente_situacoes`
--

INSERT INTO `cliente_situacoes` (`id`, `descricao`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, 'Visita', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1),
(2, 'Negociação', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1),
(4, 'Em Projeto', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1),
(3, 'Pendente', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1),
(6, 'Bloqueado', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1),
(5, 'Pendente - Em Projeto', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1);

--
-- Extraindo dados da tabela `configuracoes`
--

INSERT INTO `configuracoes` (`id`, `minuta_default`, `minuta_equipe_default`, `recibo_default`, `empresa_id`, `u_id`, `created`, `modified`) VALUES
(1, 'EMPREITADA DE SERVIÇOS - OBRA CIVIL\r\n\r\nPelo presente contrato de prestação de serviços, as partes, de um lado, como CONTRATANTE, (razão social da empresa ou nome do contratante) [NOMECLIENTE], com sede (residência) em [CIDADECLIENTE]/[ESTADOCLIENTE], à Rua [LOGRADOUROCLIENTE][BAIRROCLIENTE][COMPLEMENTOCLIENTE], nº [NUMEROCLIENTE], inscritO no CPF sob nº [CPFCLIENTE] e identidade nº [RGCLIENTE], e de outro lado, como CONTRATADA, [NOMEEMPRESA],com sede (ou residência) à Rua [LOGRADOUROEMPRESA][BAIRROEMPRESA][COMPLEMENTOEMPRESA]nº [NUMEROEMPRESA], em [CIDADEMPRESA]/[ESTADOEMPRESA], inscrita no CNPJ (ou CPF) sob nº [CPFCNPJEMPRESA] e identidade nº [RGEMPRESA], têm entre si, como justo e contratado o que segue:\r\n\r\n1. O objeto deste contrato é a construção de [DESCRICAOPROJETO], situado(a) ...............\r\n\r\n2. A CONTRATADA declara que recebe, neste ato, exemplar de todo o projeto, bem como das plantas da obra e obriga-se a acatar todas as determinações da CONTRATANTE referentes à interpretação e execução dos mesmos, arcando com todos os prejuízos a que der causa.\r\n\r\n3. Em remuneração pelos serviços prestados, a CONTRATADA receberá da CONTRATANTE a quantia de R$ [VALORORCAMENTO]) (se necessário, especificar os preços unitários dos serviços), paga e reajustada da seguinte forma: ........... (ex: através de medições  - mensais/quinzenais, cuja liberação do valor será feita no ..... dia útil do mês subseqüente à execução dos serviços e desde que os mesmos tenham sido aprovados pela CONTRATANTE. As medições serão feitas da seguinte forma: ......................).\r\n\r\n3.1. O(s) preço(s) acima referido(s) constituirá(ão), a qualquer título, a única e completa remuneração da CONTRATADA pela adequada, perfeita e aceita execução deste contrato.\r\n\r\n4. De cada pagamento a ser efetuado à CONTRATADA  será retido, a título de garantia pela boa qualidade dos serviços, o percentual de .....% (........ por cento). Tais retenções serão devolvidas quando da conclusão satisfatória dos serviços, corrigidas pelo .......... (ou, sem nenhum acréscimo), mediante a apresentação dos comprovantes de recolhimento dos encargos previstos no presente instrumento.\r\n\r\n5.         A CONTRATADA deverá obedecer rigorosamente os prazos fixados no CRONOGRAMA DE OBRA abaixo:\r\n\r\n.....................................................................\r\n\r\n.....................................................................\r\n\r\n5.1       ACONTRATADA responderá por todos os prejuízos decorrentes da inobservância dos prazos acima estipulados, facultado à CONTRATANTE, em caso de atraso dos serviços, executá-los diretamente, ou por terceiros. Nestes casos, a CONTRATADA fará jus ao pagamento dos trabalhos até então executados, nos termos e condições deste contrato.\r\n\r\n6.         A CONTRATADA obriga-se a:\r\n\r\na) estudar e analisar detalhadamente os projetos, plantas, especificações e memoriais relativos à obra;\r\n\r\nb) refazer por sua conta e ordem os serviços que a critério da CONTRATANTE tenham sido executados em desacordo com os projetos, plantas, memoriais e normas técnicas aplicáveis;\r\n\r\nc) transportar os materiais, ferramentas e equipamentos necessários para a perfeita execução dos trabalhos;\r\n\r\nd) substituir os materiais que, por imprudência, negligência ou imperícia inutilizar;\r\n\r\ne) guardar e vigiar todos os seus bens existentes no local da obra;\r\n\r\nf) retirar do local das obras,  no prazo de ..... (..............) horas após o término das mesmas, todos os equipamentos, máquinas e materiais de sua propriedade;\r\n\r\ng) empregar na execução dos serviços contratados tão somente operários especializados, capazes, todos devidamente registrados e segurados, nas categorias e quantidades necessárias ao bom andamento dos serviços;\r\n\r\nh) cumprir todas as disposições legais relativas à higiene e segurança do trabalho;\r\n\r\ni) fornecer e obrigar que os operários utilizem todos os equipamentos de proteção individual, além de crachá de identificação padrão da CONTRATANTE, responsabilizando-se a CONTRATADA, única e exclusivamente, por todo e qualquer acidente de trabalho com o seu pessoal.\r\n\r\nj) substituir todo e qualquer empregado, no prazo de ..... (...............) horas, após solicitação da CONTRATANTE;\r\n\r\nl) arcar com todas as obrigações decorrentes do presente contrato, em especial, as de natureza tributária, trabalhista, previdenciária;\r\n\r\nm) apresentar, mensalmente, cópia autenticada das guias de recolhimento relativas ao INSS, FGTS, ISS e demais encargos;\r\n\r\nn) apresentar certidões do INSS, FGTS, PIS, ISS e outras que vierem a ser exigidas pela CONTRATANTE,quando do término das obras;\r\n\r\no) responsabilizar-se pelo pagamento dos autos de infração a que der causa, sejam eles de natureza trabalhista ou decorrentes da inobservância das normas de medicina e segurança do trabalho.\r\n\r\np) fornecer à CONTRATANTE os recibos dos pagamentos efetuados aos seus empregados, inclusive do acerto final (Rescisão) e folha de pagamento;\r\n\r\nq) fazer seguro de responsabilidade civil - danos materiais e pessoais a terceiros - de forma a isentar a CONTRATANTE de qualquer responsabilidade por danos e prejuízos decorrentes de acidentes que eventualmente ocorram durante a execução dos serviços previstos neste contrato;\r\n\r\nr) responder pela boa qualidade dos serviços e solidez das obras, nos termos da lei e do contrato.\r\n\r\n7. São obrigações da CONTRATANTE:\r\n\r\na) fornecer as plantas, desenhos, memoriais da obra;\r\n\r\nb) fornecer outros elementos e/ou condições que forem necessários a execução dos serviços;\r\n\r\nc) pagar pontualmente pelos serviços executados, conforme medição periódica;\r\n\r\nd) fornecer os materiais, na quantidade e qualidade indispensáveis para a boa execução dos serviços.\r\n\r\n8. A CONTRATADA não poderá subempreitar ou ceder, total ou parcialmente, este contrato.\r\n\r\n9. É proibido à CONTRATADA executar qualquer alteração, supressão ou acréscimo dos serviços previstos no presente contrato, sem que a CONTRATANTE, previamente, autorize por escrito, sob a forma de aditivo a este ou na forma de novo contrato.\r\n\r\n10. O presente contrato será rescindido sem nenhuma formalidade, além de simples carta protocolada, face o descumprimento de qualquer cláusula ou condição deste contrato, cabendo à CONTRATADA, nesses casos, unicamente o recebimento do valor dos serviços concluídos até a data da rescisão, com o desconto dos valores eventualmente devidos em virtude da aplicação das disposições do presente.\r\n\r\n11.       A parte que infringir qualquer disposição do presente instrumento arcará com o pagamento de multa no valor de R$ ................. (ou, equivalente a ....% do valor do contrato).\r\n\r\n12.       A CONTRATADA deverá proceder a Anotação de Responsabilidade Técnica - ART - do CREA, nos termos da Lei 6.496/77.\r\n\r\n13.       A omissão no exercício de qualquer direito ou a maneira de exercê-lo constituir-se-ão atos de mera liberalidade, não podendo ser entendidos como novação.\r\n\r\n14.       As partes elegem o Foro da Comarca de ................../(UF) para dirimir eventuais litígios decorrentes deste contrato.\r\n\r\nEstando assim justas e contratadas, firmam as partes o presente instrumento, em ...... vias de igual teor e forma, perante as testemunhas abaixo.\r\n\r\nLocal e data:\r\n\r\n__________________________                   _______________________\r\n\r\n              CONTRATANTE                                        CONTRATADA\r\n\r\nTestemunhas:\r\n\r\n1ª) Ass. _________________________\r\n\r\nNome:\r\n\r\nRG:\r\n\r\n2ª) Ass. _________________________\r\n\r\nNome:\r\n\r\nRG:', NULL, NULL, 1, 1, '2019-09-23 00:00:00', '2019-09-23 00:00:00');

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`id`, `pessoa_id`, `tipo`, `valor`, `principal`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, 1, 'telefone', '(67) 99999-9999', 'S', '2019-09-16 18:50:28', '2019-09-23 12:16:59', 1, 1),
(2, 1, 'email', 'teste@teste.org', 'N', '2019-09-16 18:50:28', '2019-09-23 12:16:59', 1, 1),
(3, 2, 'telefone', NULL, 'S', '2019-09-16 19:01:28', '2019-09-20 20:32:08', 1, 1),
(4, 4, 'telefone', '(67) 33333-3333', 'S', '2019-09-16 21:10:15', '2019-09-16 21:10:15', 1, 1),
(5, 5, 'telefone', '(67) 88888-8888', 'S', '2019-09-16 21:10:20', '2019-09-16 21:10:20', 1, 1),
(6, 5, 'email', NULL, 'N', '2019-09-16 21:10:20', '2019-09-16 21:10:20', 1, 1);

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `tipo`, `cpf_cnpj`, `razao_social`, `nome_fantasia`, `data_inicio`, `data_fim`, `created`, `modified`, `mensal`, `observacao`, `u_id`, `endereco_id`, `contato_id`, `representante_id`) VALUES
(1, 'F', '00527880167', NULL, 'Denilson D\'Avila Portes', '2019-08-07', NULL, '2019-08-07 15:31:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'F', '00527880167', NULL, 'Empresa teste', '2019-08-15', NULL, NULL, NULL, '0.00', NULL, 1, NULL, NULL, NULL);

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `pessoa_id`, `logradouro`, `numero`, `complemento`, `bairro`, `cep`, `cidade`, `estado`, `principal`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S', '2019-09-16 18:50:28', '2019-09-23 12:16:59', 1, 1),
(2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S', '2019-09-16 21:10:20', '2019-09-16 21:10:20', 1, 1);

--
-- Extraindo dados da tabela `ocorrencias`
--

INSERT INTO `ocorrencias` (`id`, `ocorrencia_tipo_id`, `projeto_id`, `observacao`, `data`, `data_pendencia`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed posuere rutrum ipsum vehicula maximus. Maecenas imperdiet urna quis enim dapibus, ut tristique erat dapibus. Nunc sollicitudin, sem ut cursus eleifend, ipsum nisl rutrum urna, vel dictum justo lectus at lacus. Donec eget orci id tortor ornare dapibus et quis eros. Etiam lobortis elementum fringilla. Duis tristique, est dapibus auctor vulputate, ligula metus tristique mi, in rutrum velit lectus vel felis. Aenean consectetur diam eu metus fermentum, sed dapibus purus consectetur. Curabitur pellentesque arcu vel magna imperdiet hendrerit. Vivamus vehicula nulla eget est ullamcorper, eu laoreet nibh feugiat. Phasellus feugiat sapien vitae mattis posuere.\r\n\r\nNullam non faucibus nulla. Nulla egestas arcu rutrum placerat rhoncus. Ut elementum lectus vitae mollis gravida. Quisque nec nibh justo. Aliquam blandit mauris sit amet elit mollis ultrices id vitae nulla. Vivamus semper felis metus, ut mollis lacus imperdiet vel. Nunc fermentum vitae nunc ut consectetur. Ut.', '2019-09-16', NULL, '2019-09-16 18:50:28', '2019-09-16 18:50:28', 1, 1),
(2, 1, 1, '', '2019-09-16', '2019-08-30', '2019-09-16 18:56:27', '2019-09-18 19:36:47', 1, 1),
(3, 1, 1, 'Praesent nulla purus, lobortis vel quam eu, semper pretium magna. Proin rutrum ipsum eu velit pulvinar, et ultricies sapien fringilla. Integer eget faucibus justo. Integer pulvinar in purus nec dignissim. Sed libero diam, congue vel nunc a, ullamcorper facilisis libero. Suspendisse potenti. Sed non commodo erat, sed facilisis ipsum. Ut blandit aliquam arcu non bibendum.\r\n\r\nMorbi euismod posuere tortor at ullamcorper. Etiam ipsum sem, volutpat eu facilisis in, vehicula at magna. Integer pharetra eleifend lectus, nec dictum.', '2019-09-16', NULL, '2019-09-16 19:16:40', '2019-09-16 19:16:40', 1, 1),
(4, 1, 2, 'Casa Grande com 3 quartos', '2019-09-16', NULL, '2019-09-16 21:10:20', '2019-09-16 21:10:20', 1, 1),
(5, 1, 1, NULL, '2019-09-23', NULL, '2019-09-23 12:16:59', '2019-09-23 12:16:59', 1, 1);

--
-- Extraindo dados da tabela `ocorrencia_tipos`
--

INSERT INTO `ocorrencia_tipos` (`id`, `descricao`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, 'Visita', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1),
(2, 'Anotação', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1),
(3, 'Pendência', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1),
(4, 'Alteração', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1);

--
-- Extraindo dados da tabela `orcamentos`
--

INSERT INTO `orcamentos` (`id`, `projeto_id`, `custo`, `total`, `data_inicial`, `data_entrega`, `observacao`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, 0, '80000.00', '120000.00', '2019-10-17', '2020-02-19', 'teste', '2019-09-18 14:55:32', '2019-09-18 14:55:32', 1, 1),
(6, 1, '10000.00', '5000.00', '2019-09-19', '2019-09-27', 'defd', '2019-09-20 20:28:43', '2019-09-20 20:28:43', 1, 1);

--
-- Extraindo dados da tabela `papeis`
--

INSERT INTO `papeis` (`id`, `descricao`, `papel_pai_id`, `empresa_id`, `created`, `modified`, `u_id`) VALUES
(1, 'administrador', NULL, 1, '2019-08-07 14:39:40', '2019-08-07 14:39:40', NULL),
(2, 'Lançamento de Notas', NULL, 1, '2019-08-20 07:55:24', '2019-08-20 07:55:24', 1),
(3, 'Secretária', NULL, 1, '2019-08-20 07:55:24', '2019-08-20 07:55:24', 1);

--
-- Extraindo dados da tabela `pedreiro_situacoes`
--

INSERT INTO `pedreiro_situacoes` (`id`, `descricao`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, 'Auxiliar de Pedreiro', '2019-09-04 10:45:15', '2019-09-04 10:45:15', 1, 1),
(2, 'Ajudante de Pedreiro', '2019-09-04 10:45:15', '2019-09-04 10:45:15', 1, 1),
(3, 'Eletricista', '2019-09-04 10:45:15', '2019-09-04 10:45:15', 1, 1),
(4, 'Pintor', '2019-09-04 10:45:15', '2019-09-04 10:45:15', 1, 1),
(5, 'Encanador', '2019-09-04 10:45:15', '2019-09-04 10:45:15', 1, 1),
(6, 'Pedreiro', '2019-09-04 10:45:15', '2019-09-04 10:45:15', 1, 1),
(7, 'Mestre de Obras', '2019-09-04 10:45:15', '2019-09-04 10:45:15', 1, 1),
(8, 'Bloqueado', '2019-09-04 10:45:15', '2019-09-04 10:45:15', 1, 1);

--
-- Extraindo dados da tabela `permissao_papeis`
--

INSERT INTO `permissao_papeis` (`id`, `permissao_id`, `papel_id`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, 1, 1, '2019-08-20 10:24:47', '2019-08-20 10:24:47', 1, 1),
(2, 2, 2, '2019-08-21 10:53:20', '2019-08-21 10:53:20', 1, 1),
(3, 3, 2, '2019-08-21 10:53:20', '2019-08-21 10:53:20', 1, 1);

--
-- Extraindo dados da tabela `permissoes`
--

INSERT INTO `permissoes` (`id`, `descricao`, `descricao_amigavel`, `permissao_pai_id`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, 'administrador', 'Administrador', NULL, '2019-08-20 10:24:47', '2019-08-20 10:24:47', 1, 1),
(2, 'CLIENTES', 'Cadastro de Clientes', NULL, '2019-08-21 10:53:20', '2019-08-21 10:53:20', 1, 1),
(3, 'ADD', 'Inserir Novo Cliente', 2, '2019-08-21 10:53:20', '2019-08-21 10:53:20', 1, 1);

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `nome_social`, `estado_civil`, `conjuge_id`, `filhos`, `sexo`, `tipo`, `cpf_cnpj`, `rg`, `data_nascimento`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, 'Aquele cara', NULL, NULL, 2, 0, 'M', 'F', NULL, NULL, NULL, '2019-09-16 18:50:28', '2019-09-16 19:16:40', 1, 1),
(2, 'Aquela mulher', NULL, NULL, NULL, 0, 'F', 'F', NULL, NULL, NULL, '2019-09-16 19:01:28', '2019-09-16 19:01:28', 1, 1),
(3, 'Aquela criança', NULL, NULL, NULL, 0, 'M', 'F', NULL, NULL, NULL, '2019-09-16 19:18:05', '2019-09-16 19:18:05', 1, 1),
(4, 'Outra mulher', NULL, NULL, NULL, 0, 'F', 'F', NULL, NULL, NULL, '2019-09-16 21:10:15', '2019-09-16 21:10:15', 1, 1),
(5, 'Outro Cara', NULL, NULL, 4, 0, 'M', 'F', NULL, NULL, NULL, '2019-09-16 21:10:20', '2019-09-16 21:10:20', 1, 1);

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `produto_pai_id`, `descricao`, `produto_tipo_id`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, NULL, 'Cimento', 1, '2019-08-09 18:09:03', '2019-08-09 18:09:03', NULL, NULL),
(2, NULL, 'teste', 1, '2019-08-09 18:22:58', '2019-08-09 18:22:58', 1, NULL);

--
-- Extraindo dados da tabela `produto_tipos`
--

INSERT INTO `produto_tipos` (`id`, `descricao`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, 'Material de Construção', '2019-08-09 18:08:40', '2019-08-09 18:08:40', NULL, NULL);

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`id`, `descricao`, `detalhes`, `cliente_id`, `pasta_projeto`, `projeto_situacao_id`, `contrato_id`, `created`, `modified`, `custo_estimado`, `terreno`, `area_construida_coberta`, `area_construida_aberta`, `observacao`, `empresa_id`, `u_id`) VALUES
(1, 'Casa pequena e barata', 'Casa de 2 quartos, banheiro, sala, cozinha americana.', 1, NULL, 1, NULL, '2019-09-16 18:50:28', '2019-09-23 12:16:59', '80000.00', '200.00', '100.00', '20.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed posuere rutrum ipsum vehicula maximus. Maecenas imperdiet urna quis enim dapibus, ut tristique erat dapibus. Nunc sollicitudin, sem ut cursus eleifend, ipsum nisl rutrum urna, vel dictum justo lectus at lacus. Donec eget orci id tortor ornare dapibus et quis eros. Etiam lobortis elementum fringilla. Duis tristique, est dapibus auctor vulputate, ligula metus tristique mi, in rutrum velit lectus vel felis. Aenean consectetur diam eu metus fermentum, sed dapibus purus consectetur. Curabitur pellentesque arcu vel magna imperdiet hendrerit. Vivamus vehicula nulla eget est ullamcorper, eu laoreet nibh feugiat. Phasellus feugiat sapien vitae mattis posuere.\r\n\r\nNullam non faucibus nulla. Nulla egestas arcu rutrum placerat rhoncus. Ut elementum lectus vitae mollis gravida. Quisque nec nibh justo. Aliquam blandit mauris sit amet elit mollis ultrices id vitae nulla. Vivamus semper felis metus, ut mollis lacus imperdiet vel. Nunc fermentum vitae nunc ut consectetur. Ut.', 1, 1),
(2, 'Casa Grande', NULL, 2, NULL, 1, NULL, '2019-09-16 21:10:20', '2019-09-16 21:10:20', NULL, NULL, NULL, NULL, 'Casa Grande com 3 quartos', 1, 1);

--
-- Extraindo dados da tabela `projeto_situacoes`
--

INSERT INTO `projeto_situacoes` (`id`, `descricao`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, 'Visita', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1),
(2, 'Pré-Projeto', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1),
(3, 'Projeto', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1),
(4, 'Execução - Terreno', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1),
(5, 'Execução - Base', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1),
(6, 'Execução - Cobertura', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1),
(7, 'Execução - Elétrica/Hidráulica', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1),
(8, 'Execução - Acabamento', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1),
(9, 'Finalização - Regularização', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1),
(10, 'Finalização - Entrega', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1),
(11, 'Concluído', '2019-08-21 16:05:30', '2019-08-21 16:05:30', 1, 1);

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`, `hash`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, 'denilson.portes', 'ddppandego@hotmail.com', '$2y$10$/0tlY6VQimnSWoFAGOTWHeMlIoT.b41xkwe2U9f2eP2zmZ7TU9Y76', 'Ativo', NULL, '2019-08-13 11:35:25', '2019-08-15 12:01:59', 0, 1),
(4, 'teste2', 'denilson.portes@ufms.br', '$2y$10$ggdtj4xJ4CRcKvtQ6dX9keGaaghJvsXyafdRQjGUA7XwtYFIE.lZ6', 'Ativo', '397160d47fd9387154c4cc68eb5260f3', '2019-08-21 17:54:55', '2019-08-21 17:57:58', 1, 4);

--
-- Extraindo dados da tabela `user_papeis`
--

INSERT INTO `user_papeis` (`id`, `user_id`, `papel_id`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, 1, 1, '2019-08-07 14:40:20', '2019-08-07 14:40:20', 1, 1),
(4, 4, 1, '2019-08-21 17:54:55', '2019-08-21 17:54:55', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
