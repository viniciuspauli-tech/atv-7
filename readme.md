# Necessidade
A necessidade deste projeto surge da importância de dominar a integração entre o front-end e o banco de dados no desenvolvimento web. Criar um sistema prático de gerenciamento de pratos (CRUD) resolve o desafio de aprender, na prática, como capturar dados do usuário, armazená-los de forma segura via PDO no MySQL e exibi-los de maneira dinâmica com PHP. Ele atende à necessidade essencial de estruturar projetos de forma organizada, aplicar rotas relativas corretas e implementar boas práticas de segurança e manipulação de dados em um ambiente local XAMPP.

# Requisitos Funcionais
RF1 — Cadastrar Usuário: O sistema deve permitir cadastrar usuários informando nome e e-mail.

RF2 — Cadastrar Prato: O sistema deve permitir que um usuário cadastre um prato informando nome, descrição, preço e categoria.

RF3 — Listar Pratos: O sistema deve apresentar todos os pratos cadastrados, informando também o usuário responsável pelo cadastro.

RF4 — Editar Prato: O sistema deve permitir alterar as informações de um prato já cadastrado.

RF5 — Excluir Prato: O sistema deve permitir excluir um prato já cadastrado.

RF6 — Listar Pratos por Usuário: O sistema deve permitir visualizar os pratos cadastrados por um determinado usuário.

RNF1 — Validação dos Campos: O sistema não deve permitir o cadastro de usuários ou pratos com campos obrigatórios vazios.

RNF2 — Segurança dos Dados: As operações que recebem informações fornecidas pelo usuário deverão utilizar Prepared Statements.

# Sistema
Este projeto é um sistema web educacional para gerenciamento de pratos (CRUD) desenvolvido em PHP e MySQL, utilizando a pilha do XAMPP (Apache e MySQL) no ambiente local. Sua estrutura organiza o banco de dados via PDO (config/database.php), o visual (css/style.css), os elementos reutilizáveis de tela (includes/), a lógica de cadastro, edição e exclusão (pratos/) e a listagem principal (scripts/php/index.php). Para executá-lo, o repositório deve estar alocado no diretório htdocs do XAMPP, os serviços Apache e MySQL ativos e o banco sistema_pratos configurado via phpMyAdmin com a tabela pratos (com campos de ID, nome, descrição e preço). No desenvolvimento, destacam-se boas práticas como conexões seguras, reutilização de código com inclusões relativas, formatação numérica de valores e prevenção de falhas de segurança com sanitização de dados.
