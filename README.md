# Portfólio - Mylena Dantas Guimarães

Portfólio pessoal desenvolvido com HTML, CSS, JavaScript e PHP. O projeto reúne diferentes atividades e projetos desenvolvidos durante a formação em Análise e Desenvolvimento de Sistemas.

O portfólio possui uma página principal que permite navegar entre diferentes projetos através de um menu lateral. Os conteúdos são exibidos de forma fluida em uma área central utilizando `iframe`.

## Sobre o Projeto

Este projeto foi desenvolvido com o objetivo de apresentar trabalhos, atividades e conhecimentos adquiridos durante os estudos na área de tecnologia.

A aplicação reúne desde páginas institucionais simples até formulários dinâmicos com processamento no servidor e sistemas de autenticação com persistência em Banco de Dados MySQL.

## Tecnologias Utilizadas

* **Front-end:** HTML5, CSS3, JavaScript (ES6+)
* **Back-end:** PHP 8+
* **Banco de Dados:** MySQL
* **Arquitetura/Outros:** Leitura de variáveis de ambiente (`.env`), Sessões PHP (`session_start`), Navegação por `iframe`, Design Responsivo.

## Estrutura do Projeto

```text
Portifolio/
│
├── css/
│   └── style.css
│
├── img/
│   └── logo.png
│
├── index.html
│
└── pag/
    ├── calculadora/
    │   ├── css/
    │   │   └── style.css
    │   ├── img/
    │   │   └── logo.png
    │   ├── js/
    │   │   └── script.js
    │   └── index.html
    │
    ├── calculando_bhaskara/
    │   ├── css/
    │   │   └── style.css
    │   ├── img/
    │   │   └── logo.png
    │   ├── js/
    │   │   └── script.js
    │   └── index.html
    │
    ├── cartao_visita/
    │   ├── img/
    │   └── index.html
    │
    ├── curriculo/
    │   ├── css/
    │   │   └── style.css
    │   ├── img/
    │   └── index.html
    │
    ├── ficha_corrida/
    │   ├── css/
    │   │   └── style.css
    │   ├── img/
    │   │   └── logo.png
    │   ├── js/
    │   │   └── script.js
    │   ├── php/
    │   │   └── php.php
    │   └── index.html
    │
    ├── iframe/
    │   └── index.html
    │
    └── login/
        ├── database/
        │   └── usuario.sql
        ├── .env
        ├── conexao.php
        ├── index.php
        ├── logout.php
        ├── painel.php
        ├── painel-estilo.css
        └── style.css
```

## Projetos Integrados

### Cartão de Visitas

Página desenvolvida para apresentar informações pessoais e profissionais, incluindo dados de contato, foto e links para redes profissionais.

### Currículo

Página com uma versão digital do currículo, contendo informações sobre formação acadêmica, habilidades, cursos complementares e objetivo profissional.

### Ficha de Corrida

Formulário interativo desenvolvido em HTML e CSS para simular uma ficha de inscrição em uma corrida. Inclui script de processamento e envio via PHP (`php.php`).

### Calculadora

Projeto funcional em JavaScript para realizar operações matemáticas básicas (Soma, Subtração, Multiplicação e Divisão), além da opção de limpar dados.

### Equação de Segundo Grau (Bhaskara)

Calculadora lógica em JavaScript para resolver equações do segundo grau utilizando a fórmula de Bhaskara. O script recebe os valores `a`, `b` e `c`, calcula o Delta e retorna as raízes reais.

### Sistema de Login e Cadastro (PHP / MySQL)

Módulo de autenticação e gerenciamento de sessões com segurança e banco de dados MySQL:

* **Telas Unificadas:** Formulários de Login e Cadastro na mesma página (`index.php`), alternados via parâmetros `GET`.
* **Conexão Segura:** Arquivo `conexao.php` configurado para ler credenciais via variáveis de ambiente (`.env`) e criar a tabela `usuarios` automaticamente no banco MySQL se ela ainda não existir.
* **Área Restrita:** Painel privado (`painel.php`) protegido por verificação de sessão (`session_start`), onde são exibidas as informações do usuário autenticado.
* **Criptografia & Logout:** Senhas armazenadas com hash seguro (`password_hash`) e controle de encerramento de sessão via `logout.php`.
* **UI/UX & Mobile:** Interface responsiva para celulares com paleta personalizada (`#322030`, `#725b75`, `#e3cebd`).

### Página Inicial

Página padrão exibida no `iframe` ao carregar o portfólio, apresentando uma mensagem de boas-vindas ao visitante.

## Como Executar

### Pré-requisitos

* Navegador Web moderno.
* Servidor Web local com suporte a PHP e MySQL (ex: XAMPP, WAMP, Laragon ou PHP Built-in Server).

### Passo a Passo

1. **Clonar ou Baixar o Repositório:**

   ```bash
   git clone https://github.com/mylenadguimaraes-alt/Portifolio.git
   ```

2. **Configurar o ambiente no XAMPP/Servidor Local:**
   * Mova a pasta `Portifolio-master` para o diretório raiz do seu servidor local (ex: `C:\xampp\htdocs\`).

3. **Configurar o Banco de Dados para o Módulo de Login:**
   * Inicie os serviços do Apache e MySQL.
   * Crie um Banco de Dados no MySQL (ex: `sisvet`).
   * Crie/Ajuste o arquivo `.env` dentro da pasta `pag/login/` com as suas credenciais:

     ```env
     DB_HOST=localhost
     DB_USER=root
     DB_PASS=
     DB_NAME=usuario
     ```

   * *(Opcional)* Importe o arquivo `pag/login/database/usuario.sql` no seu banco de dados ou deixe que o arquivo `conexao.php` crie a tabela automaticamente na primeira execução.

4. **Acessar a Aplicação:**
   * Abra o navegador e acesse:
     `http://localhost/Portifolio/index.html`

## Objetivo

Servir como portfólio acadêmico e profissional, demonstrando a evolução técnica em Front-end e Back-end durante a formação em Análise e Desenvolvimento de Sistemas.

## Autora

**Mylena Dantas Guimarães**

Estudante de Análise e Desenvolvimento de Sistemas.

## Licença

Este projeto foi desenvolvido exclusivamente para fins acadêmicos e de portfólio pessoal.s
