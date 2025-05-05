```
projeto-portfolio/
├── admin/                     # Painel administrativo
│   ├── assets/                # Recursos do painel admin
│   ├── controllers/           # Controladores do painel
│   ├── views/                 # Telas do painel
│   └── index.php              # Entrada do painel admin
├── config/                    # Configurações do sistema
│   └── config.php             # Arquivo de configuração
├── data/                      # Arquivos JSON (banco de dados)
│   ├── menu.json
│   ├── sobre.json
│   ├── habilidades.json
│   ├── servicos.json
│   ├── projetos.json
│   ├── recomendacoes.json
│   └── contato.json
├── includes/                  # Arquivos incluídos em várias páginas
│   ├── header.php
│   └── footer.php
├── modules/                   # Módulos do site (templates)
│   ├── menu/
│   │   └── menu.php           # Template do módulo menu
│   ├── sobre/
│   │   └── sobre.php          # Template do módulo sobre
│   ├── habilidades/
│   │   └── habilidades.php    # Template do módulo habilidades
│   ├── servicos/
│   │   └── servicos.php       # Template do módulo serviços
│   ├── projetos/
│   │   └── projetos.php       # Template do módulo projetos
│   ├── recomendacoes/
│   │   └── recomendacoes.php  # Template do módulo recomendações
│   └── contato/
│       └── contato.php        # Template do módulo contato
├── public/                    # Diretório web público
│   ├── assets/                # Recursos públicos
│   │   ├── css/               # Estilos CSS
│   │   │   └── main.css       # Arquivo CSS principal
│   │   ├── js/                # Scripts JavaScript
│   │   │   └── main.js        # Arquivo JS principal
│   │   ├── img/               # Imagens do site
│   │   └── fonts/             # Fontes personalizadas
│   ├── uploads/               # Arquivos enviados pelos usuários
│   ├── .htaccess              # Configurações do Apache
│   └── index.php              # Front controller (ponto de entrada)
├── src/                       # Código-fonte da aplicação (estilo Symfony)
│   ├── Controller/            # Controladores (se necessário)
│   ├── Entity/                # Classes de entidade
│   │   ├── Menu.php
│   │   ├── Sobre.php
│   │   ├── Habilidade.php
│   │   ├── Servico.php
│   │   ├── Projeto.php
│   │   ├── Recomendacao.php
│   │   └── Contato.php
│   ├── Repository/            # Classes para acesso aos dados
│   │   ├── MenuRepository.php
│   │   ├── SobreRepository.php
│   │   ├── HabilidadeRepository.php
│   │   ├── ServicoRepository.php
│   │   ├── ProjetoRepository.php
│   │   ├── RecomendacaoRepository.php
│   │   └── ContatoRepository.php
│   ├── Service/               # Serviços da aplicação
│   │   └── JsonDatabaseService.php
│   └── Util/                  # Classes utilitárias
│       └── Renderer.php
├── var/                       # Arquivos gerados (logs, cache)
│   ├── cache/                 # Cache da aplicação
│   └── logs/                  # Logs da aplicação
├── .gitignore                 # Arquivos a serem ignorados pelo Git
├── composer.json              # Configuração do Composer (opcional)
└── README.md                  # Documentação do projeto
          
```