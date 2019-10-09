-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 09-Out-2019 às 22:12
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
(2, 5, 1, NULL, '2019-09-16 21:10:20', '2019-09-16 21:10:20', 1, 1),
(7, 11, 1, NULL, '2019-10-07 19:40:51', '2019-10-07 19:40:51', 1, 1),
(12, 16, 1, NULL, '2019-10-08 12:43:11', '2019-10-08 12:43:11', 1, 1),
(13, 17, 1, NULL, '2019-10-08 12:43:43', '2019-10-08 12:43:43', 1, 1),
(14, 18, 1, NULL, '2019-10-08 12:45:51', '2019-10-08 12:45:51', 1, 1);

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
(1, '<p>cpfcnpj_empresa</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>EMPREITADA DE SERVI&Ccedil;OS - OBRA CIVIL Pelo presente contrato de presta&ccedil;&atilde;o de servi&ccedil;os, as partes, de um lado, como CONTRATANTE, (raz&atilde;o social da empresa ou nome do contratante) [NOMECLIENTE], com sede (resid&ecirc;ncia) em [CIDADECLIENTE]/[ESTADOCLIENTE], &agrave; Rua [LOGRADOUROCLIENTE][BAIRROCLIENTE][COMPLEMENTOCLIENTE], n&ordm; [NUMEROCLIENTE], inscritO no CPF sob n&ordm; [CPFCLIENTE] e identidade n&ordm; [RGCLIENTE], e de outro lado, como CONTRATADA, [NOMEEMPRESA],com sede (ou resid&ecirc;ncia) &agrave; Rua [LOGRADOUROEMPRESA][BAIRROEMPRESA][COMPLEMENTOEMPRESA]n&ordm; [NUMEROEMPRESA], em [CIDADEMPRESA]/[ESTADOEMPRESA], inscrita no CNPJ (ou CPF) sob n&ordm; [CPFCNPJEMPRESA] e identidade n&ordm; [RGEMPRESA], t&ecirc;m entre si, como justo e contratado o que segue: 1. O objeto deste contrato &eacute; a constru&ccedil;&atilde;o de [DESCRICAOPROJETO], situado(a) ............... 2. A CONTRATADA declara que recebe, neste ato, exemplar de todo o projeto, bem como das plantas da obra e obriga-se a acatar todas as determina&ccedil;&otilde;es da CONTRATANTE referentes &agrave; interpreta&ccedil;&atilde;o e execu&ccedil;&atilde;o dos mesmos, arcando com todos os preju&iacute;zos a que der causa. 3. Em remunera&ccedil;&atilde;o pelos servi&ccedil;os prestados, a CONTRATADA receber&aacute; da CONTRATANTE a quantia de R$ [VALORORCAMENTO]) (se necess&aacute;rio, especificar os pre&ccedil;os unit&aacute;rios dos servi&ccedil;os), paga e reajustada da seguinte forma: ........... (ex: atrav&eacute;s de medi&ccedil;&otilde;es - mensais/quinzenais, cuja libera&ccedil;&atilde;o do valor ser&aacute; feita no ..... dia &uacute;til do m&ecirc;s subseq&uuml;ente &agrave; execu&ccedil;&atilde;o dos servi&ccedil;os e desde que os mesmos tenham sido aprovados pela CONTRATANTE. As medi&ccedil;&otilde;es ser&atilde;o feitas da seguinte forma: ......................). 3.1. O(s) pre&ccedil;o(s) acima referido(s) constituir&aacute;(&atilde;o), a qualquer t&iacute;tulo, a &uacute;nica e completa remunera&ccedil;&atilde;o da CONTRATADA pela adequada, perfeita e aceita execu&ccedil;&atilde;o deste contrato. 4. De cada pagamento a ser efetuado &agrave; CONTRATADA ser&aacute; retido, a t&iacute;tulo de garantia pela boa qualidade dos servi&ccedil;os, o percentual de .....% (........ por cento). Tais reten&ccedil;&otilde;es ser&atilde;o devolvidas quando da conclus&atilde;o satisfat&oacute;ria dos servi&ccedil;os, corrigidas pelo .......... (ou, sem nenhum acr&eacute;scimo), mediante a apresenta&ccedil;&atilde;o dos comprovantes de recolhimento dos encargos previstos no presente instrumento. 5. A CONTRATADA dever&aacute; obedecer rigorosamente os prazos fixados no CRONOGRAMA DE OBRA abaixo: ..................................................................... ..................................................................... 5.1 ACONTRATADA responder&aacute; por todos os preju&iacute;zos decorrentes da inobserv&acirc;ncia dos prazos acima estipulados, facultado &agrave; CONTRATANTE, em caso de atraso dos servi&ccedil;os, execut&aacute;-los diretamente, ou por terceiros. Nestes casos, a CONTRATADA far&aacute; jus ao pagamento dos trabalhos at&eacute; ent&atilde;o executados, nos termos e condi&ccedil;&otilde;es deste contrato. 6. A CONTRATADA obriga-se a: a) estudar e analisar detalhadamente os projetos, plantas, especifica&ccedil;&otilde;es e memoriais relativos &agrave; obra; b) refazer por sua conta e ordem os servi&ccedil;os que a crit&eacute;rio da CONTRATANTE tenham sido executados em desacordo com os projetos, plantas, memoriais e normas t&eacute;cnicas aplic&aacute;veis; c) transportar os materiais, ferramentas e equipamentos necess&aacute;rios para a perfeita execu&ccedil;&atilde;o dos trabalhos; d) substituir os materiais que, por imprud&ecirc;ncia, neglig&ecirc;ncia ou imper&iacute;cia inutilizar; e) guardar e vigiar todos os seus bens existentes no local da obra; f) retirar do local das obras, no prazo de ..... (..............) horas ap&oacute;s o t&eacute;rmino das mesmas, todos os equipamentos, m&aacute;quinas e materiais de sua propriedade; g) empregar na execu&ccedil;&atilde;o dos servi&ccedil;os contratados t&atilde;o somente oper&aacute;rios especializados, capazes, todos devidamente registrados e segurados, nas categorias e quantidades necess&aacute;rias ao bom andamento dos servi&ccedil;os; h) cumprir todas as disposi&ccedil;&otilde;es legais relativas &agrave; higiene e seguran&ccedil;a do trabalho; i) fornecer e obrigar que os oper&aacute;rios utilizem todos os equipamentos de prote&ccedil;&atilde;o individual, al&eacute;m de crach&aacute; de identifica&ccedil;&atilde;o padr&atilde;o da CONTRATANTE, responsabilizando-se a CONTRATADA, &uacute;nica e exclusivamente, por todo e qualquer acidente de trabalho com o seu pessoal. j) substituir todo e qualquer empregado, no prazo de ..... (...............) horas, ap&oacute;s solicita&ccedil;&atilde;o da CONTRATANTE; l) arcar com todas as obriga&ccedil;&otilde;es decorrentes do presente contrato, em especial, as de natureza tribut&aacute;ria, trabalhista, previdenci&aacute;ria; m) apresentar, mensalmente, c&oacute;pia autenticada das guias de recolhimento relativas ao INSS, FGTS, ISS e demais encargos; n) apresentar certid&otilde;es do INSS, FGTS, PIS, ISS e outras que vierem a ser exigidas pela CONTRATANTE,quando do t&eacute;rmino das obras; o) responsabilizar-se pelo pagamento dos autos de infra&ccedil;&atilde;o a que der causa, sejam eles de natureza trabalhista ou decorrentes da inobserv&acirc;ncia das normas de medicina e seguran&ccedil;a do trabalho. p) fornecer &agrave; CONTRATANTE os recibos dos pagamentos efetuados aos seus empregados, inclusive do acerto final (Rescis&atilde;o) e folha de pagamento; q) fazer seguro de responsabilidade civil - danos materiais e pessoais a terceiros - de forma a isentar a CONTRATANTE de qualquer responsabilidade por danos e preju&iacute;zos decorrentes de acidentes que eventualmente ocorram durante a execu&ccedil;&atilde;o dos servi&ccedil;os previstos neste contrato; r) responder pela boa qualidade dos servi&ccedil;os e solidez das obras, nos termos da lei e do contrato. 7. S&atilde;o obriga&ccedil;&otilde;es da CONTRATANTE: a) fornecer as plantas, desenhos, memoriais da obra; b) fornecer outros elementos e/ou condi&ccedil;&otilde;es que forem necess&aacute;rios a execu&ccedil;&atilde;o dos servi&ccedil;os; c) pagar pontualmente pelos servi&ccedil;os executados, conforme medi&ccedil;&atilde;o peri&oacute;dica; d) fornecer os materiais, na quantidade e qualidade indispens&aacute;veis para a boa execu&ccedil;&atilde;o dos servi&ccedil;os. 8. A CONTRATADA n&atilde;o poder&aacute; subempreitar ou ceder, total ou parcialmente, este contrato. 9. &Eacute; proibido &agrave; CONTRATADA executar qualquer altera&ccedil;&atilde;o, supress&atilde;o ou acr&eacute;scimo dos servi&ccedil;os previstos no presente contrato, sem que a CONTRATANTE, previamente, autorize por escrito, sob a forma de aditivo a este ou na forma de novo contrato. 10. O presente contrato ser&aacute; rescindido sem nenhuma formalidade, al&eacute;m de simples carta protocolada, face o descumprimento de qualquer cl&aacute;usula ou condi&ccedil;&atilde;o deste contrato, cabendo &agrave; CONTRATADA, nesses casos, unicamente o recebimento do valor dos servi&ccedil;os conclu&iacute;dos at&eacute; a data da rescis&atilde;o, com o desconto dos valores eventualmente devidos em virtude da aplica&ccedil;&atilde;o das disposi&ccedil;&otilde;es do presente. 11. A parte que infringir qualquer disposi&ccedil;&atilde;o do presente instrumento arcar&aacute; com o pagamento de multa no valor de R$ ................. (ou, equivalente a ....% do valor do contrato). 12. A CONTRATADA dever&aacute; proceder a Anota&ccedil;&atilde;o de Responsabilidade T&eacute;cnica - ART - do CREA, nos termos da Lei 6.496/77. 13. A omiss&atilde;o no exerc&iacute;cio de qualquer direito ou a maneira de exerc&ecirc;-lo constituir-se-&atilde;o atos de mera liberalidade, n&atilde;o podendo ser entendidos como nova&ccedil;&atilde;o. 14. As partes elegem o Foro da Comarca de ................../(UF) para dirimir eventuais lit&iacute;gios decorrentes deste contrato. Estando assim justas e contratadas, firmam as partes o presente instrumento, em ...... vias de igual teor e forma, perante as testemunhas abaixo. Local e data: __________________________ _______________________ CONTRATANTE CONTRATADA Testemunhas: 1&ordf;) Ass. _________________________ Nome: RG: 2&ordf;) Ass. _________________________ Nome: RG:</p>\r\n', '<p>&nbsp;</p>\r\n\r\n<p>dsasdasd</p>\r\n\r\n<p>dsEMPREITADA DE SERVI&Ccedil;OS - OBRA CIVIL Pelo presente contrato de presta&ccedil;&atilde;o de servi&ccedil;os, as partes, de um lado, como CONTRATANTE, (raz&atilde;o social da empresa ou nome do contratante) [NOMECLIENTE], com sede (resid&ecirc;ncia) em [CIDADECLIENTE]/[ESTADOCLIENTE], &agrave; Rua [LOGRADOUROCLIENTE][BAIRROCLIENTE][COMPLEMENTOCLIENTE], n&ordm; [NUMEROCLIENTE], inscritO no CPF sob n&ordm; [CPFCLIENTE] e identidade n&ordm; [RGCLIENTE], e de outro lado, como CONTRATADA, [NOMEEMPRESA],com sede (ou resid&ecirc;ncia) &agrave; Rua [LOGRADOUROEMPRESA][BAIRROEMPRESA][COMPLEMENTOEMPRESA]n&ordm; [NUMEROEMPRESA], em [CIDADEMPRESA]/[ESTADOEMPRESA], inscrita no CNPJ (ou CPF) sob n&ordm; [CPFCNPJEMPRESA] e identidade n&ordm; [RGEMPRESA], t&ecirc;m entre si, como justo e contratado o que segue: 1. O objeto deste contrato &eacute; a constru&ccedil;&atilde;o de [DESCRICAOPROJETO], situado(a) ............... 2. A CONTRATADA declara que recebe, neste ato, exemplar de todo o projeto, bem como das plantas da obra e obriga-se a acatar todas as determina&ccedil;&otilde;es da CONTRATANTE referentes &agrave; interpreta&ccedil;&atilde;o e execu&ccedil;&atilde;o dos mesmos, arcando com todos os preju&iacute;zos a que der causa. 3. Em remunera&ccedil;&atilde;o pelos servi&ccedil;os prestados, a CONTRATADA receber&aacute; da CONTRATANTE a quantia de R$ [VALORORCAMENTO]) (se necess&aacute;rio, especificar os pre&ccedil;os unit&aacute;rios dos servi&ccedil;os), paga e reajustada da seguinte forma: ........... (ex: atrav&eacute;s de medi&ccedil;&otilde;es - mensais/quinzenais, cuja libera&ccedil;&atilde;o do valor ser&aacute; feita no ..... dia &uacute;til do m&ecirc;s subseq&uuml;ente &agrave; execu&ccedil;&atilde;o dos servi&ccedil;os e desde que os mesmos tenham sido aprovados pela CONTRATANTE. As medi&ccedil;&otilde;es ser&atilde;o feitas da seguinte forma: ......................). 3.1. O(s) pre&ccedil;o(s) acima referido(s) constituir&aacute;(&atilde;o), a qualquer t&iacute;tulo, a &uacute;nica e completa remunera&ccedil;&atilde;o da CONTRATADA pela adequada, perfeita e aceita execu&ccedil;&atilde;o deste contrato. 4. De cada pagamento a ser efetuado &agrave; CONTRATADA ser&aacute; retido, a t&iacute;tulo de garantia pela boa qualidade dos servi&ccedil;os, o percentual de .....% (........ por cento). Tais reten&ccedil;&otilde;es ser&atilde;o devolvidas quando da conclus&atilde;o satisfat&oacute;ria dos servi&ccedil;os, corrigidas pelo .......... (ou, sem nenhum acr&eacute;scimo), mediante a apresenta&ccedil;&atilde;o dos comprovantes de recolhimento dos encargos previstos no presente instrumento. 5. A CONTRATADA dever&aacute; obedecer rigorosamente os prazos fixados no CRONOGRAMA DE OBRA abaixo: ..................................................................... ..................................................................... 5.1 ACONTRATADA responder&aacute; por todos os preju&iacute;zos decorrentes da inobserv&acirc;ncia dos prazos acima estipulados, facultado &agrave; CONTRATANTE, em caso de atraso dos servi&ccedil;os, execut&aacute;-los diretamente, ou por terceiros. Nestes casos, a CONTRATADA far&aacute; jus ao pagamento dos trabalhos at&eacute; ent&atilde;o executados, nos termos e condi&ccedil;&otilde;es deste contrato. 6. A CONTRATADA obriga-se a: a) estudar e analisar detalhadamente os projetos, plantas, especifica&ccedil;&otilde;es e memoriais relativos &agrave; obra; b) refazer por sua conta e ordem os servi&ccedil;os que a crit&eacute;rio da CONTRATANTE tenham sido executados em desacordo com os projetos, plantas, memoriais e normas t&eacute;cnicas aplic&aacute;veis; c) transportar os materiais, ferramentas e equipamentos necess&aacute;rios para a perfeita execu&ccedil;&atilde;o dos trabalhos; d) substituir os materiais que, por imprud&ecirc;ncia, neglig&ecirc;ncia ou imper&iacute;cia inutilizar; e) guardar e vigiar todos os seus bens existentes no local da obra; f) retirar do local das obras, no prazo de ..... (..............) horas ap&oacute;s o t&eacute;rmino das mesmas, todos os equipamentos, m&aacute;quinas e materiais de sua propriedade; g) empregar na execu&ccedil;&atilde;o dos servi&ccedil;os contratados t&atilde;o somente oper&aacute;rios especializados, capazes, todos devidamente registrados e segurados, nas categorias e quantidades necess&aacute;rias ao bom andamento dos servi&ccedil;os; h) cumprir todas as disposi&ccedil;&otilde;es legais relativas &agrave; higiene e seguran&ccedil;a do trabalho; i) fornecer e obrigar que os oper&aacute;rios utilizem todos os equipamentos de prote&ccedil;&atilde;o individual, al&eacute;m de crach&aacute; de identifica&ccedil;&atilde;o padr&atilde;o da CONTRATANTE, responsabilizando-se a CONTRATADA, &uacute;nica e exclusivamente, por todo e qualquer acidente de trabalho com o seu pessoal. j) substituir todo e qualquer empregado, no prazo de ..... (...............) horas, ap&oacute;s solicita&ccedil;&atilde;o da CONTRATANTE; l) arcar com todas as obriga&ccedil;&otilde;es decorrentes do presente contrato, em especial, as de natureza tribut&aacute;ria, trabalhista, previdenci&aacute;ria; m) apresentar, mensalmente, c&oacute;pia autenticada das guias de recolhimento relativas ao INSS, FGTS, ISS e demais encargos; n) apresentar certid&otilde;es do INSS, FGTS, PIS, ISS e outras que vierem a ser exigidas pela CONTRATANTE,quando do t&eacute;rmino das obras; o) responsabilizar-se pelo pagamento dos autos de infra&ccedil;&atilde;o a que der causa, sejam eles de natureza trabalhista ou decorrentes da inobserv&acirc;ncia das normas de medicina e seguran&ccedil;a do trabalho. p) fornecer &agrave; CONTRATANTE os recibos dos pagamentos efetuados aos seus empregados, inclusive do acerto final (Rescis&atilde;o) e folha de pagamento; q) fazer seguro de responsabilidade civil - danos materiais e pessoais a terceiros - de forma a isentar a CONTRATANTE de qualquer responsabilidade por danos e preju&iacute;zos decorrentes de acidentes que eventualmente ocorram durante a execu&ccedil;&atilde;o dos servi&ccedil;os previstos neste contrato; r) responder pela boa qualidade dos servi&ccedil;os e solidez das obras, nos termos da lei e do contrato. 7. S&atilde;o obriga&ccedil;&otilde;es da CONTRATANTE: a) fornecer as plantas, desenhos, memoriais da obra; b) fornecer outros elementos e/ou condi&ccedil;&otilde;es que forem necess&aacute;rios a execu&ccedil;&atilde;o dos servi&ccedil;os; c) pagar pontualmente pelos servi&ccedil;os executados, conforme medi&ccedil;&atilde;o peri&oacute;dica; d) fornecer os materiais, na quantidade e qualidade indispens&aacute;veis para a boa execu&ccedil;&atilde;o dos servi&ccedil;os. 8. A CONTRATADA n&atilde;o poder&aacute; subempreitar ou ceder, total ou parcialmente, este contrato. 9. &Eacute; proibido &agrave; CONTRATADA executar qualquer altera&ccedil;&atilde;o, supress&atilde;o ou acr&eacute;scimo dos servi&ccedil;os previstos no presente contrato, sem que a CONTRATANTE, previamente, autorize por escrito, sob a forma de aditivo a este ou na forma de novo contrato. 10. O presente contrato ser&aacute; rescindido sem nenhuma formalidade, al&eacute;m de simples carta protocolada, face o descumprimento de qualquer cl&aacute;usula ou condi&ccedil;&atilde;o deste contrato, cabendo &agrave; CONTRATADA, nesses casos, unicamente o recebimento do valor dos servi&ccedil;os conclu&iacute;dos at&eacute; a data da rescis&atilde;o, com o desconto dos valores eventualmente devidos em virtude da aplica&ccedil;&atilde;o das disposi&ccedil;&otilde;es do presente. 11. A parte que infringir qualquer disposi&ccedil;&atilde;o do presente instrumento arcar&aacute; com o pagamento de multa no valor de R$ ................. (ou, equivalente a ....% do valor do contrato). 12. A CONTRATADA dever&aacute; proceder a Anota&ccedil;&atilde;o de Responsabilidade T&eacute;cnica - ART - do CREA, nos termos da Lei 6.496/77. 13. A omiss&atilde;o no exerc&iacute;cio de qualquer direito ou a maneira de exerc&ecirc;-lo constituir-se-&atilde;o atos de mera liberalidade, n&atilde;o podendo ser entendidos como nova&ccedil;&atilde;o. 14. As partes elegem o Foro da Comarca de ................../(UF) para dirimir eventuais lit&iacute;gios decorrentes deste contrato. Estando assim justas e contratadas, firmam as partes o presente instrumento, em ...... vias de igual teor e forma, perante as testemunhas abaixo. Local e data: __________________________ _______________________ CONTRATANTE CONTRATADA Testemunhas: 1&ordf;) Ass. _________________________ Nome: RG: 2&ordf;) Ass. _________________________ Nome: RG:</p>\r\n', '<p>dsaasd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>dsEMPREITADA DE SERVI&Ccedil;OS - OBRA CIVIL Pelo presente contrato de presta&ccedil;&atilde;o de servi&ccedil;os, as partes, de um lado, como CONTRATANTE, (raz&atilde;o social da empresa ou nome do contratante) [NOMECLIENTE], com sede (resid&ecirc;ncia) em [CIDADECLIENTE]/[ESTADOCLIENTE], &agrave; Rua [LOGRADOUROCLIENTE][BAIRROCLIENTE][COMPLEMENTOCLIENTE], n&ordm; [NUMEROCLIENTE], inscritO no CPF sob n&ordm; [CPFCLIENTE] e identidade n&ordm; [RGCLIENTE], e de outro lado, como CONTRATADA, [NOMEEMPRESA],com sede (ou resid&ecirc;ncia) &agrave; Rua [LOGRADOUROEMPRESA][BAIRROEMPRESA][COMPLEMENTOEMPRESA]n&ordm; [NUMEROEMPRESA], em [CIDADEMPRESA]/[ESTADOEMPRESA], inscrita no CNPJ (ou CPF) sob n&ordm; [CPFCNPJEMPRESA] e identidade n&ordm; [RGEMPRESA], t&ecirc;m entre si, como justo e contratado o que segue: 1. O objeto deste contrato &eacute; a constru&ccedil;&atilde;o de [DESCRICAOPROJETO], situado(a) ............... 2. A CONTRATADA declara que recebe, neste ato, exemplar de todo o projeto, bem como das plantas da obra e obriga-se a acatar todas as determina&ccedil;&otilde;es da CONTRATANTE referentes &agrave; interpreta&ccedil;&atilde;o e execu&ccedil;&atilde;o dos mesmos, arcando com todos os preju&iacute;zos a que der causa. 3. Em remunera&ccedil;&atilde;o pelos servi&ccedil;os prestados, a CONTRATADA receber&aacute; da CONTRATANTE a quantia de R$ [VALORORCAMENTO]) (se necess&aacute;rio, especificar os pre&ccedil;os unit&aacute;rios dos servi&ccedil;os), paga e reajustada da seguinte forma: ........... (ex: atrav&eacute;s de medi&ccedil;&otilde;es - mensais/quinzenais, cuja libera&ccedil;&atilde;o do valor ser&aacute; feita no ..... dia &uacute;til do m&ecirc;s subseq&uuml;ente &agrave; execu&ccedil;&atilde;o dos servi&ccedil;os e desde que os mesmos tenham sido aprovados pela CONTRATANTE. As medi&ccedil;&otilde;es ser&atilde;o feitas da seguinte forma: ......................). 3.1. O(s) pre&ccedil;o(s) acima referido(s) constituir&aacute;(&atilde;o), a qualquer t&iacute;tulo, a &uacute;nica e completa remunera&ccedil;&atilde;o da CONTRATADA pela adequada, perfeita e aceita execu&ccedil;&atilde;o deste contrato. 4. De cada pagamento a ser efetuado &agrave; CONTRATADA ser&aacute; retido, a t&iacute;tulo de garantia pela boa qualidade dos servi&ccedil;os, o percentual de .....% (........ por cento). Tais reten&ccedil;&otilde;es ser&atilde;o devolvidas quando da conclus&atilde;o satisfat&oacute;ria dos servi&ccedil;os, corrigidas pelo .......... (ou, sem nenhum acr&eacute;scimo), mediante a apresenta&ccedil;&atilde;o dos comprovantes de recolhimento dos encargos previstos no presente instrumento. 5. A CONTRATADA dever&aacute; obedecer rigorosamente os prazos fixados no CRONOGRAMA DE OBRA abaixo: ..................................................................... ..................................................................... 5.1 ACONTRATADA responder&aacute; por todos os preju&iacute;zos decorrentes da inobserv&acirc;ncia dos prazos acima estipulados, facultado &agrave; CONTRATANTE, em caso de atraso dos servi&ccedil;os, execut&aacute;-los diretamente, ou por terceiros. Nestes casos, a CONTRATADA far&aacute; jus ao pagamento dos trabalhos at&eacute; ent&atilde;o executados, nos termos e condi&ccedil;&otilde;es deste contrato. 6. A CONTRATADA obriga-se a: a) estudar e analisar detalhadamente os projetos, plantas, especifica&ccedil;&otilde;es e memoriais relativos &agrave; obra; b) refazer por sua conta e ordem os servi&ccedil;os que a crit&eacute;rio da CONTRATANTE tenham sido executados em desacordo com os projetos, plantas, memoriais e normas t&eacute;cnicas aplic&aacute;veis; c) transportar os materiais, ferramentas e equipamentos necess&aacute;rios para a perfeita execu&ccedil;&atilde;o dos trabalhos; d) substituir os materiais que, por imprud&ecirc;ncia, neglig&ecirc;ncia ou imper&iacute;cia inutilizar; e) guardar e vigiar todos os seus bens existentes no local da obra; f) retirar do local das obras, no prazo de ..... (..............) horas ap&oacute;s o t&eacute;rmino das mesmas, todos os equipamentos, m&aacute;quinas e materiais de sua propriedade; g) empregar na execu&ccedil;&atilde;o dos servi&ccedil;os contratados t&atilde;o somente oper&aacute;rios especializados, capazes, todos devidamente registrados e segurados, nas categorias e quantidades necess&aacute;rias ao bom andamento dos servi&ccedil;os; h) cumprir todas as disposi&ccedil;&otilde;es legais relativas &agrave; higiene e seguran&ccedil;a do trabalho; i) fornecer e obrigar que os oper&aacute;rios utilizem todos os equipamentos de prote&ccedil;&atilde;o individual, al&eacute;m de crach&aacute; de identifica&ccedil;&atilde;o padr&atilde;o da CONTRATANTE, responsabilizando-se a CONTRATADA, &uacute;nica e exclusivamente, por todo e qualquer acidente de trabalho com o seu pessoal. j) substituir todo e qualquer empregado, no prazo de ..... (...............) horas, ap&oacute;s solicita&ccedil;&atilde;o da CONTRATANTE; l) arcar com todas as obriga&ccedil;&otilde;es decorrentes do presente contrato, em especial, as de natureza tribut&aacute;ria, trabalhista, previdenci&aacute;ria; m) apresentar, mensalmente, c&oacute;pia autenticada das guias de recolhimento relativas ao INSS, FGTS, ISS e demais encargos; n) apresentar certid&otilde;es do INSS, FGTS, PIS, ISS e outras que vierem a ser exigidas pela CONTRATANTE,quando do t&eacute;rmino das obras; o) responsabilizar-se pelo pagamento dos autos de infra&ccedil;&atilde;o a que der causa, sejam eles de natureza trabalhista ou decorrentes da inobserv&acirc;ncia das normas de medicina e seguran&ccedil;a do trabalho. p) fornecer &agrave; CONTRATANTE os recibos dos pagamentos efetuados aos seus empregados, inclusive do acerto final (Rescis&atilde;o) e folha de pagamento; q) fazer seguro de responsabilidade civil - danos materiais e pessoais a terceiros - de forma a isentar a CONTRATANTE de qualquer responsabilidade por danos e preju&iacute;zos decorrentes de acidentes que eventualmente ocorram durante a execu&ccedil;&atilde;o dos servi&ccedil;os previstos neste contrato; r) responder pela boa qualidade dos servi&ccedil;os e solidez das obras, nos termos da lei e do contrato. 7. S&atilde;o obriga&ccedil;&otilde;es da CONTRATANTE: a) fornecer as plantas, desenhos, memoriais da obra; b) fornecer outros elementos e/ou condi&ccedil;&otilde;es que forem necess&aacute;rios a execu&ccedil;&atilde;o dos servi&ccedil;os; c) pagar pontualmente pelos servi&ccedil;os executados, conforme medi&ccedil;&atilde;o peri&oacute;dica; d) fornecer os materiais, na quantidade e qualidade indispens&aacute;veis para a boa execu&ccedil;&atilde;o dos servi&ccedil;os. 8. A CONTRATADA n&atilde;o poder&aacute; subempreitar ou ceder, total ou parcialmente, este contrato. 9. &Eacute; proibido &agrave; CONTRATADA executar qualquer altera&ccedil;&atilde;o, supress&atilde;o ou acr&eacute;scimo dos servi&ccedil;os previstos no presente contrato, sem que a CONTRATANTE, previamente, autorize por escrito, sob a forma de aditivo a este ou na forma de novo contrato. 10. O presente contrato ser&aacute; rescindido sem nenhuma formalidade, al&eacute;m de simples carta protocolada, face o descumprimento de qualquer cl&aacute;usula ou condi&ccedil;&atilde;o deste contrato, cabendo &agrave; CONTRATADA, nesses casos, unicamente o recebimento do valor dos servi&ccedil;os conclu&iacute;dos at&eacute; a data da rescis&atilde;o, com o desconto dos valores eventualmente devidos em virtude da aplica&ccedil;&atilde;o das disposi&ccedil;&otilde;es do presente. 11. A parte que infringir qualquer disposi&ccedil;&atilde;o do presente instrumento arcar&aacute; com o pagamento de multa no valor de R$ ................. (ou, equivalente a ....% do valor do contrato). 12. A CONTRATADA dever&aacute; proceder a Anota&ccedil;&atilde;o de Responsabilidade T&eacute;cnica - ART - do CREA, nos termos da Lei 6.496/77. 13. A omiss&atilde;o no exerc&iacute;cio de qualquer direito ou a maneira de exerc&ecirc;-lo constituir-se-&atilde;o atos de mera liberalidade, n&atilde;o podendo ser entendidos como nova&ccedil;&atilde;o. 14. As partes elegem o Foro da Comarca de ................../(UF) para dirimir eventuais lit&iacute;gios decorrentes deste contrato. Estando assim justas e contratadas, firmam as partes o presente instrumento, em ...... vias de igual teor e forma, perante as testemunhas abaixo. Local e data: __________________________ _______________________ CONTRATANTE CONTRATADA Testemunhas: 1&ordf;) Ass. _________________________ Nome: RG: 2&ordf;) Ass. _________________________ Nome: RG:</p>\r\n', 1, 1, '2019-09-23 00:00:00', '2019-10-07 17:38:08');

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`id`, `pessoa_id`, `tipo`, `valor`, `principal`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, 1, 'telefone', '(67) 99999-9999', 'S', '2019-09-16 18:50:28', '2019-09-23 12:16:59', 1, 1),
(2, 1, 'email', 'teste@teste.org', 'N', '2019-09-16 18:50:28', '2019-09-23 12:16:59', 1, 1),
(3, 2, 'telefone', NULL, 'S', '2019-09-16 19:01:28', '2019-10-03 20:31:34', 1, 1),
(4, 4, 'telefone', '(67) 33333-3333', 'S', '2019-09-16 21:10:15', '2019-09-16 21:10:15', 1, 1),
(5, 5, 'telefone', '(67) 88888-8888', 'S', '2019-09-16 21:10:20', '2019-09-16 21:10:20', 1, 1),
(6, 5, 'email', NULL, 'N', '2019-09-16 21:10:20', '2019-09-16 21:10:20', 1, 1),
(16, 11, 'email', 'teste@teste.org', 'N', '2019-10-07 19:40:51', '2019-10-07 19:40:51', 1, 1),
(25, 16, 'telefone', NULL, 'S', '2019-10-08 12:43:11', '2019-10-08 12:43:11', 1, 1),
(15, 11, 'telefone', '(67) 99999-9999', 'S', '2019-10-07 19:40:51', '2019-10-07 19:40:51', 1, 1),
(26, 16, 'email', NULL, 'N', '2019-10-08 12:43:11', '2019-10-08 12:43:11', 1, 1),
(27, 17, 'telefone', NULL, 'S', '2019-10-08 12:43:43', '2019-10-08 12:43:43', 1, 1),
(28, 17, 'email', NULL, 'N', '2019-10-08 12:43:43', '2019-10-08 12:43:43', 1, 1),
(29, 18, 'telefone', NULL, 'S', '2019-10-08 12:45:51', '2019-10-08 12:45:51', 1, 1),
(30, 18, 'email', NULL, 'N', '2019-10-08 12:45:51', '2019-10-08 12:45:51', 1, 1);

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `tipo`, `cpf_cnpj`, `inscricao`, `razao_social`, `nome_fantasia`, `data_inicio`, `data_fim`, `created`, `modified`, `mensal`, `observacao`, `u_id`, `endereco_id`, `representante_id`, `telefone`, `email`) VALUES
(1, 'F', '005.278.801-67', '1337484', 'Denilson D\'Avila Portes', 'Denilson D\'Avila Portes', '2019-08-07', NULL, '2019-08-07 15:31:20', '2019-10-09 19:36:17', NULL, NULL, 1, 3, 21, '(67) 99999-9999', 'denilson.portes@ufms.br'),
(2, 'F', '00527880167', NULL, NULL, 'Empresa teste', '2019-08-15', NULL, NULL, NULL, '0.00', NULL, 1, NULL, NULL, NULL, NULL);

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `pessoa_id`, `logradouro`, `numero`, `complemento`, `bairro`, `cep`, `cidade`, `estado`, `principal`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S', '2019-09-16 18:50:28', '2019-09-23 12:16:59', 1, 1),
(2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S', '2019-09-16 21:10:20', '2019-09-16 21:10:20', 1, 1),
(3, NULL, 'Rua Carlos Chagas', 348, 'casa 2', 'Caiçara', 79090292, 'Campo Grande', 'MS', 'S', NULL, '2019-10-09 19:36:17', 1, 1),
(5, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S', '2019-10-07 19:40:51', '2019-10-07 19:40:51', 1, 1),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S', '2019-10-07 19:40:51', '2019-10-07 19:40:51', 1, 1),
(7, 18, 'Rua Carlos Chagas', NULL, NULL, 'Caiçara', 79090292, 'Campo Grande', 'MS', 'S', '2019-10-08 12:45:51', '2019-10-08 12:45:51', 1, 1),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'S', '2019-10-08 12:45:51', '2019-10-08 12:45:51', 1, 1);

--
-- Extraindo dados da tabela `ocorrencias`
--

INSERT INTO `ocorrencias` (`id`, `ocorrencia_tipo_id`, `projeto_id`, `observacao`, `data`, `data_pendencia`, `created`, `modified`, `empresa_id`, `u_id`) VALUES
(1, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed posuere rutrum ipsum vehicula maximus. Maecenas imperdiet urna quis enim dapibus, ut tristique erat dapibus. Nunc sollicitudin, sem ut cursus eleifend, ipsum nisl rutrum urna, vel dictum justo lectus at lacus. Donec eget orci id tortor ornare dapibus et quis eros. Etiam lobortis elementum fringilla. Duis tristique, est dapibus auctor vulputate, ligula metus tristique mi, in rutrum velit lectus vel felis. Aenean consectetur diam eu metus fermentum, sed dapibus purus consectetur. Curabitur pellentesque arcu vel magna imperdiet hendrerit. Vivamus vehicula nulla eget est ullamcorper, eu laoreet nibh feugiat. Phasellus feugiat sapien vitae mattis posuere.\r\n\r\nNullam non faucibus nulla. Nulla egestas arcu rutrum placerat rhoncus. Ut elementum lectus vitae mollis gravida. Quisque nec nibh justo. Aliquam blandit mauris sit amet elit mollis ultrices id vitae nulla. Vivamus semper felis metus, ut mollis lacus imperdiet vel. Nunc fermentum vitae nunc ut consectetur. Ut.', '2019-09-16', NULL, '2019-09-16 18:50:28', '2019-09-16 18:50:28', 1, 1),
(2, 1, 1, '', '2019-09-16', '2019-08-30', '2019-09-16 18:56:27', '2019-09-18 19:36:47', 1, 1),
(3, 1, 1, 'Praesent nulla purus, lobortis vel quam eu, semper pretium magna. Proin rutrum ipsum eu velit pulvinar, et ultricies sapien fringilla. Integer eget faucibus justo. Integer pulvinar in purus nec dignissim. Sed libero diam, congue vel nunc a, ullamcorper facilisis libero. Suspendisse potenti. Sed non commodo erat, sed facilisis ipsum. Ut blandit aliquam arcu non bibendum.\r\n\r\nMorbi euismod posuere tortor at ullamcorper. Etiam ipsum sem, volutpat eu facilisis in, vehicula at magna. Integer pharetra eleifend lectus, nec dictum.', '2019-09-16', NULL, '2019-09-16 19:16:40', '2019-09-16 19:16:40', 1, 1),
(4, 1, 2, 'Casa Grande com 3 quartos', '2019-09-16', NULL, '2019-09-16 21:10:20', '2019-09-16 21:10:20', 1, 1),
(5, 1, 1, NULL, '2019-09-23', NULL, '2019-09-23 12:16:59', '2019-09-23 12:16:59', 1, 1),
(6, 1, 3, NULL, '2019-10-07', NULL, '2019-10-07 19:40:51', '2019-10-07 19:40:51', 1, 1),
(7, 1, 4, NULL, '2019-10-08', NULL, '2019-10-08 12:45:51', '2019-10-08 12:45:51', 1, 1);

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
(6, 1, '10000.00', '5000.00', '2019-09-27', '2019-09-27', 'teste', '2019-09-20 20:28:43', '2019-09-24 12:02:19', 1, 1),
(8, 2, NULL, NULL, NULL, NULL, '', '2019-10-03 19:19:40', '2019-10-03 19:19:40', 1, 1);

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
(5, 'Outro Cara', NULL, NULL, 4, 0, 'M', 'F', NULL, NULL, NULL, '2019-09-16 21:10:20', '2019-09-16 21:10:20', 1, 1),
(6, 'ddsds', NULL, NULL, NULL, 0, 'M', 'F', NULL, NULL, NULL, '2019-10-03 20:32:24', '2019-10-03 20:32:24', 1, 1),
(11, 'testesd', NULL, NULL, NULL, 0, 'M', 'F', NULL, NULL, NULL, '2019-10-07 19:40:51', '2019-10-07 19:40:51', 1, 1),
(16, 'dsfdfdssfd', NULL, NULL, NULL, 0, 'M', 'F', NULL, NULL, NULL, '2019-10-08 12:43:11', '2019-10-08 12:43:11', 1, 1),
(17, 'dsfdfdssfd', NULL, NULL, NULL, 0, 'M', 'F', NULL, NULL, NULL, '2019-10-08 12:43:43', '2019-10-08 12:43:43', 1, 1),
(18, 'dsfdfdssfd', NULL, NULL, NULL, 0, 'M', 'F', NULL, NULL, NULL, '2019-10-08 12:45:51', '2019-10-08 12:45:51', 1, 1),
(19, 'Denilson Davila Portes', NULL, 1, NULL, 0, 'M', 'F', '00527880167', '1337484', '1986-04-18', '2019-10-09 19:27:55', '2019-10-09 19:27:55', 1, 1),
(20, 'Denilson Davila Portes', NULL, 1, NULL, 0, 'M', 'F', '00527880167', '1337484', '1986-04-18', '2019-10-09 19:28:11', '2019-10-09 19:28:11', 1, 1),
(21, 'Denilson Davila Portes', NULL, 1, NULL, 0, 'M', 'F', '00527880167', '1337484', '1986-04-18', '2019-10-09 19:36:17', '2019-10-09 19:36:17', 1, 1);

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

INSERT INTO `projetos` (`id`, `descricao`, `detalhes`, `cliente_id`, `pasta_projeto`, `projeto_situacao_id`, `contrato_id`, `created`, `modified`, `custo_estimado`, `terreno`, `area_construida_coberta`, `area_construida_aberta`, `observacao`, `endereco_id`, `empresa_id`, `u_id`) VALUES
(1, 'Casa pequena e barata', 'Casa de 2 quartos, banheiro, sala, cozinha americana.', 1, NULL, 1, NULL, '2019-09-16 18:50:28', '2019-10-07 18:18:03', '80000.00', '200.00', '100.00', '20.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed posuere rutrum ipsum vehicula maximus. Maecenas imperdiet urna quis enim dapibus, ut tristique erat dapibus. Nunc sollicitudin, sem ut cursus eleifend, ipsum nisl rutrum urna, vel dictum justo lectus at lacus. Donec eget orci id tortor ornare dapibus et quis eros. Etiam lobortis elementum fringilla. Duis tristique, est dapibus auctor vulputate, ligula metus tristique mi, in rutrum velit lectus vel felis. Aenean consectetur diam eu metus fermentum, sed dapibus purus consectetur. Curabitur pellentesque arcu vel magna imperdiet hendrerit. Vivamus vehicula nulla eget est ullamcorper, eu laoreet nibh feugiat. Phasellus feugiat sapien vitae mattis posuere.\r\n\r\nNullam non faucibus nulla. Nulla egestas arcu rutrum placerat rhoncus. Ut elementum lectus vitae mollis gravida. Quisque nec nibh justo. Aliquam blandit mauris sit amet elit mollis ultrices id vitae nulla. Vivamus semper felis metus, ut mollis lacus imperdiet vel. Nunc fermentum vitae nunc ut consectetur. Ut.', NULL, 1, 1),
(4, 'teste', NULL, 14, NULL, 1, NULL, '2019-10-08 12:45:51', '2019-10-08 12:45:51', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1),
(3, 'dsdsds', 'sddsds', 7, NULL, 1, NULL, '2019-10-07 19:40:51', '2019-10-07 19:40:51', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1);

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
