# MeetingRoom
Controle da Sala de Reunião - Reserva

## Instalação
Segue o passos de instalação

1 - Efetuar clone do código no github, com seguinte comando
git clone https://github.com/GilvanFernandes/MeetingRoom.git

2 - Efetuar um restore da base em MySQL
Caminho dos Arquivos: dump/init.sql

3 - Configurar conexão ao banco de dados
Caminho do arquivo: application/config/database.php

4 - Configurar URL default do site
Caminho do arquivo: application/config/config.php

Alterar a linha que contém a URL, informando o caminho do servidor web que foi clonado o projeto: $config['base_url'] = 'http://localhost/Github/MeetingRoom/';


## Primeiro Acesso

Para primeiro acesso da ferramenta será utilizado pré-determinado como usuário e senha demonstrado abaixo:

Usuário: gil-f-o@hotmail.com
Senha: teste1234

## Projetos Utilizados
Framework Codeigniter: https://github.com/bcit-ci/CodeIgniter
Template AdminLTE: https://github.com/almasaeed2010/AdminLTE
