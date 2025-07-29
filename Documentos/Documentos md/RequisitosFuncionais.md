
## Requisitos Funcionais

### RF01 - Entrar no Sistema

**Descrição:** O sistema deve permitir que os usuários cadastrados realizem login para acessar as demais funções.  
**Entradas:** Nome de usuário e senha.  
**Origem:** Tela de login.  
**Saída:** Garantir o acesso ao sistema ou erro de autenticação.  
**Destino:** Interface principal do sistema.  
**Ação:** Validação das credenciais e início da sessão.  
**Pré-condição:** O usuário deve estar previamente cadastrado e ativo.  
**Pós-condição:** Sessão iniciada com acesso ao sistema.  
**Efeitos colaterais:** Criação de sessão do usuário e registro do log de acesso.

----------

### RF02 - Cadastrar Usuários

**Descrição:** O sistema deve permitir o cadastro de novos usuários com diferentes perfis de acesso.  
**Entradas:** Nome, usuário, senha, cargo, e-mail, permissões.
**Origem:** Tela de cadastro.  
**Saída:** Confirmação do cadastro ou mensagem de erro.  
**Destino:** Banco de dados.  
**Ação:** Registro dos dados do novo usuário.  
**Pré-condição:** O usuário autenticado deve ter permissão para cadastro de contas.  
**Pós-condição:** Usuário cadastrado e disponível para acesso ao sistema.  
**Efeitos colaterais:** Atualização da lista de usuários e controle de acesso.

----------

### RF03 - Manter Usuário

**Descrição:** O sistema deve permitir a edição, ativação/desativação e exclusão de usuários.  
**Entradas:** Dados do usuário a serem alterados (nome, senha, cargo, status, permissões). 
**Origem:** Tela de gerenciamento de usuários.  
**Saída:** Confirmação da atualização ou exclusão.  
**Destino:** Banco de dados.  
**Ação:** Atualização dos registros de usuário.  
**Pré-condição:** O usuário a ser modificado deve estar cadastrado, o usuário autenticado deve ter permissão para alterar usuários.  
**Pós-condição:** Dados atualizados ou usuário removido conforme a ação realizada.  
**Efeitos colaterais:** Alteração nos privilégios de acesso e histórico de alterações.

----------

### RF04 - Cadastrar Quartos

**Descrição:** O sistema deve permitir o cadastro de novos quartos, registrando suas características.  
**Entradas:** Número do quarto, descrição, tipo, tarifa e status inicial.  
**Origem:** Tela de cadastro de quartos.  
**Saída:** Confirmação do cadastro ou mensagem de erro.  
**Destino:** Banco de dados.  
**Ação:** Registro das informações do quarto no sistema.  
**Pré-condição:** Usuário autenticado com permissão de cadastro de quartos.  
**Pós-condição:** Quarto cadastrado e disponível para futuras reservas.  
**Efeitos colaterais:** Atualização da disponibilidade e informações de tarifas.

----------

### RF05 - Gerenciar Quartos

**Descrição:** O sistema deve permitir a edição e remoção dos registros dos quartos, além da alteração de seu status.  
**Entradas:** Dados do quarto a serem atualizados (status, tarifa, descrição, etc.).  
**Origem:** Tela de gerenciamento de quartos (gerente/administrador).  
**Saída:** Confirmação da alteração ou exclusão.  
**Destino:** Banco de dados.  
**Ação:** Atualização ou remoção dos dados do quarto.  
**Pré-condição:** Quarto deve estar previamente cadastrado, o usuário deve possuir permissão para modificar quartos.  
**Pós-condição:** Quarto atualizado ou removido do sistema.  
**Efeitos colaterais:** Reavaliação da disponibilidade e impacto nas reservas vinculadas.

----------

### RF06 - Adicionar Hóspedes

**Descrição:** O sistema deve permitir o cadastro de novos hóspedes para uma reserva.  
**Entradas:** Nome, CPF, telefone, endereço e dados adicionais relevantes.    
**Origem:** Tela de cadastro de hóspedes.  
**Saída:** Confirmação do cadastro do hóspede.  
**Destino:** Banco de dados.  
**Ação:** Registro dos dados do hóspede.  
**Pré-condição:** Acesso autenticado e usuário com permissão para cadastro de hóspedes.  
**Pós-condição:** Hóspede adicionado e disponível para associação à reserva.  
**Efeitos colaterais:** Atualização do registro do histórico do hóspede.

----------

### RF07 - Atualizar Hóspedes 

**Descrição:** O sistema deve permitir a edição dos dados cadastrais dos hóspedes.  
**Entradas:** Dados atualizados do hóspede (nome, telefone, endereço, etc.).  
**Origem:** Tela de manutenção de hóspedes.  
**Saída:** Confirmação da atualização ou mensagem de erro.  
**Destino:** Banco de dados.  
**Ação:** Atualização dos registros do hóspede.  
**Pré-condição:** Hóspede previamente cadastrado no sistema, usuário com permissão para modificar informação dos hóspedes.  
**Pós-condição:** Dados do hóspede atualizados.  
**Efeitos colaterais:** Sincronização com histórico de reservas e estadias.

----------

### RF08 - Adicionar Reservas

**Descrição:** O sistema deve permitir o cadastro de novas reservas para hóspedes.  
**Entradas:** Dados do hóspede, número do quarto, datas de entrada e saída, forma de pagamento.  
**Origem:** Tela de cadastro de reservas.  
**Saída:** Confirmação da reserva com número de identificação.  
**Destino:** Banco de dados. 
**Ação:** Registro da reserva e bloqueio do quarto para o período informado.  
**Pré-condição:** Hóspede cadastrado, quarto disponível e usuário com permissão de criar reservas.  
**Pós-condição:** Reserva ativa e vinculada ao hóspede e quarto.  
**Efeitos colaterais:** Atualização da disponibilidade do quarto e emissão de notificações.

----------

### RF09 - Atualizar Reservas

**Descrição:** O sistema deve permitir a modificação ou cancelamento de reservas existentes.  
**Entradas:** Identificador da reserva, novos dados de reserva (datas, quarto, etc.) ou confirmação de cancelamento.  
**Origem:** Tela de gerenciamento de reservas.  
**Saída:** Confirmação da atualização ou cancelamento.  
**Destino:** Banco de dados.  
**Ação:** Atualização dos registros da reserva.  
**Pré-condição:** Reserva previamente cadastrada em situação que permita alteração e usuário com permissão para alterar reservas.  
**Pós-condição:** Reserva modificada ou cancelada, conforme solicitado.  
**Efeitos colaterais:** Reavaliação da disponibilidade do quarto e ajustes financeiros se necessário.

----------

### RF10 - Realizar Check-in

**Descrição:** O sistema deve permitir o registro do check-in dos hóspedes no hotel.  
**Entradas:** Identificação da reserva, documento do hóspede e horário de chegada.  
**Origem:** Tela de check-in.  
**Saída:** Confirmação do check-in realizado.  
**Destino:** Banco de dados. 
**Ação:** Atualização do status da reserva para “ocupado” e registro do horário de entrada.  
**Pré-condição:** Reserva ativa e confirmada, usuário com permissão para realizar check-in.  
**Pós-condição:** Check-in realizado e hospedagem iniciada.  
**Efeitos colaterais:** Bloqueio do quarto para novas reservas durante a estadia.

----------

### RF11 - Realizar Check-out

**Descrição:** O sistema deve registrar a saída dos hóspedes e encerrar a hospedagem.  
**Entradas:** Identificação da hospedagem, horário de saída e confirmação de pagamento final.  
**Origem:** Tela de check-out.  
**Saída:** Recibo de check-out e confirmação do encerramento da hospedagem.  
**Destino:** Banco de dados.  
**Ação:** Registro do horário de saída e encerramento da estadia.  
**Pré-condição:** Hospedagem ativa com check-in realizado, usuário com permissão para realizar check-out.  
**Pós-condição:** Hospedagem encerrada e quarto liberado para nova reserva.  
**Efeitos colaterais:** Atualização do histórico financeiro e disponibilidade do quarto.

----------

### RF12 - Abrir Caixa

**Descrição:** O sistema deve permitir a abertura do caixa para o início do turno de trabalho.  
**Entradas:** Valor inicial do caixa, identificação do operador e horário de abertura.  
**Origem:** Tela de caixa. 
**Saída:** Confirmação da abertura do caixa.  
**Destino:** Banco de dados.  
**Ação:** Registro do valor inicial e abertura do período de caixa.  
**Pré-condição:** Operador com permissão financeira autenticado e turno iniciado.  
**Pós-condição:** Caixa aberto para registro de operações financeiras.  
**Efeitos colaterais:** Geração de log para auditoria.

----------

### RF13 - Manter Caixa

**Descrição:** O sistema deve permitir o gerenciamento e fechamento do caixa ao final do turno.  
**Entradas:** Registros de entradas e saídas do caixa, valores de pagamentos e despesas.  
**Origem:** Tela de fechamento e gerenciamento de caixa (operador financeiro).  
**Saída:** Relatório de fechamento do caixa e saldo final.  
**Destino:** Banco de dados.  
**Ação:** Consolidação dos registros do turno e fechamento do caixa.  
**Pré-condição:** Caixa previamente aberto e operações registradas durante o turno.  
**Pós-condição:** Caixa fechado com saldo conciliado e relatório gerado.  
**Efeitos colaterais:** Geração de histórico financeiro para auditoria.

----------

### RF14 - Processar Pagamentos

**Descrição:** O sistema deve processar os pagamentos dos hóspedes de forma segura e integrada.  
**Entradas:** Dados do pagamento (método, valor, identificação do hóspede ou reserva). 
**Origem:** Tela de processamento de pagamento.  
**Saída:** Confirmação do pagamento ou mensagem de erro.  
**Destino:** Banco de dados.  
**Ação:** Validação e registro do pagamento, atualização do status da hospedagem.  
**Pré-condição:** Reserva ou hospedagem ativa com valores pendentes.
**Pós-condição:** Pagamento processado e registrado.  
**Efeitos colaterais:** Atualização do saldo financeiro e emissão de comprovantes.

----------

### RF15 - Emitir Notas Fiscais

**Descrição:** O sistema deve gerar e emitir notas fiscais eletrônicas para as transações financeiras.  
**Entradas:** Dados da transação (valor, identificação do cliente, dados da reserva).  
**Origem:** Tela de faturamento ou processamento financeiro.  
**Saída:** Nota fiscal eletrônica gerada.  
**Destino:** Banco de dados.  
**Ação:** Processamento dos dados e emissão da nota fiscal conforme legislação.  
**Pré-condição:** Pagamento registrado, dados do cliente completos e usuário com permissão.  
**Pós-condição:** Nota fiscal emitida e registrada no sistema.  
**Efeitos colaterais:** Armazenamento do documento fiscal para auditoria.

----------

### RF16 - Cadastrar Fornecedores

**Descrição:** O sistema deve permitir o cadastro de fornecedores para controle de compras e suprimentos.  
**Entradas:** Nome, CNPJ, contato e endereço do fornecedor.  
**Origem:** Tela de cadastro de fornecedores.  
**Saída:** Confirmação do cadastro ou mensagem de erro.  
**Destino:** Banco de dados.  
**Ação:** Registro dos dados do fornecedor.  
**Pré-condição:** Usuário autenticado com permissão para gerenciamento de fornecedores. 
**Pós-condição:** Fornecedor cadastrado e disponível para futuras transações.  
**Efeitos colaterais:** Atualização do cadastro para integração com o módulo de compras.

----------

### RF17 - Gerenciar Estoque

**Descrição:** O sistema deve controlar o estoque de produtos adquiridos e monitorar suas movimentações.  
**Entradas:** Dados de entrada e saída de produtos, quantidade, identificação do produto.  
**Origem:** Tela de gerenciamento de estoque. 
**Saída:** Confirmação das atualizações e relatório de estoque.  
**Destino:** Banco de dados.  
**Ação:** Registro das movimentações e atualização das quantidades disponíveis.  
**Pré-condição:** Produtos previamente cadastrados, usuário com permissão de gerenciamento de estoque. 
**Pós-condição:** Estoque atualizado e refletindo as movimentações ocorridas.  
**Efeitos colaterais:** Impacto no controle financeiro e na reposição de produtos.

----------

### RF18 - Gerar Relatórios

**Descrição:** O sistema deve permitir a geração de relatórios financeiros, de ocupação e de estoque.  
**Entradas:** Parâmetros para o relatório (intervalo de datas, tipo de relatório).  
**Origem:** Tela de relatórios.  
**Saída:** Relatório gerado em formato visual e/ou exportável em formato PDF.  
**Destino:** Interface do usuário e banco de dados.  
**Ação:** Consulta e consolidação dos dados conforme parâmetros informados.  
**Pré-condição:** Dados suficientes registrados no sistema para a geração do relatório e permissão do usuário.
**Pós-condição:** Relatório exibido e/ou exportado com sucesso.  
**Efeitos colaterais:** Utilização de recursos do sistema para processamento de dados.

----------

### RF19 - Agendar Manutenções

**Descrição:** O sistema deve permitir o agendamento e gerenciamento de manutenções preventivas e corretivas dos quartos.  
**Entradas:** Identificação do quarto, data e tipo de manutenção, responsável técnico.  
**Origem:** Tela de manutenção.  
**Saída:** Confirmação do agendamento e notificação para a equipe responsável.  
**Destino:** Banco de dados.  
**Ação:** Registro do agendamento e alteração temporária do status do quarto, se necessário.  
**Pré-condição:** Quarto cadastrado e disponível para manutenção, usuário com permissão para agendar manutenções.  
**Pós-condição:** Manutenção agendada e registrada no sistema.  
**Efeitos colaterais:** Quarto pode ficar indisponível durante o período de manutenção.

----------

### RF20 – Controle de Acesso e Segurança

**Descrição:** O sistema deve garantir a segurança dos dados e funcionalidades por meio de controle de acesso baseado em módulos de permissão.
**Entradas:** Usuário, senha, perfil de acesso, tentativas de login.  
**Origem:** Tela de login, módulo de administração de usuários.  
**Saída:** Confirmação de acesso autorizado ou mensagem de erro.  
**Destino:** Interface do usuário, banco de dados.  
**Ação:** Autentica o usuário e verifica permissões antes de permitir acesso às funcionalidades do sistema.  
**Pré-condição:** Usuário cadastrado e permissões configuradas corretamente.  
**Pós-condição:** Usuário autenticado e acessando apenas as funções autorizadas.  
**Efeitos colaterais:** Bloqueio de conta após múltiplas tentativas malsucedidas, monitoramento contínuo de acessos.

----------

### RF21 – Auditoria e Logs

**Descrição:** O sistema deve registrar todas as ações relevantes dos usuários e eventos críticos para auditoria e rastreabilidade.  
**Entradas:** Ações do usuário, alterações no banco de dados, tentativas de acesso e operações críticas.  
**Origem:** Todas as funcionalidades do sistema.  
**Saída:** Registros de logs e relatórios de auditoria.  
**Destino:** Banco de dados e interface de auditoria para administradores.  
**Ação:** Capturar e armazenar informações sobre cada operação relevante no sistema para fins de monitoramento e auditoria.  
**Pré-condição:** Sistema em operação e usuários autenticados.  
**Pós-condição:** Logs registrados e disponíveis para análise posterior.  
**Efeitos colaterais:** Aumento do consumo de armazenamento e possível impacto de performance se o volume de logs não for gerenciado adequadamente.

----------

### RF22 – Backup

**Descrição:** O sistema deve permitir a realização de backups periódicos para possível recuperação dos dados em caso de falhas ou perda de informação.  
**Entradas:** Dados do banco de dados, agendamento de backup, comandos de restauração.  
**Origem:** Módulo de administração do sistema ou agendador automático.  
**Saída:** Confirmação do backup concluído.  
**Destino:** Armazenamento seguro (local ou em nuvem) e banco de dados.  
**Ação:** Executar procedimentos de backup de dados conforme a configuração estabelecida.  
**Pré-condição:** Configuração adequada de armazenamento, permissões e agendamento dos backups.  
**Pós-condição:** Dados salvos e restauráveis, garantindo a continuidade do sistema.  
**Efeitos colaterais:** Uso adicional de recursos de processamento e armazenamento durante os processos de backup.

----------

### RF23 – Gerenciamento de Sessões

**Descrição:** O sistema deve gerenciar as sessões de usuários, implementando timeouts e encerramento automático após um período de inatividade para aumentar a segurança.  
**Entradas:** Dados de autenticação, atividade do usuário e tempo de inatividade.  
**Origem:** Sessão de usuário iniciada via tela de login.  
**Saída:** Notificação de expiração de sessão e encerramento automático da sessão.  
**Destino:** Interface do usuário e banco de dados.  
**Ação:** Monitorar a atividade do usuário e encerrar sessões inativas após o tempo limite configurado.  
**Pré-condição:** Usuário autenticado com sessão iniciada.  
**Pós-condição:** Sessões ativas somente para usuários que permanecem ativos; encerramento automático de sessões inativas.  
**Efeitos colaterais:** Necessidade de autenticar novamente após o timeout, o que pode afetar a experiência do usuário, mas aumenta a segurança.

----------

### RF24 – Notificações e Alertas

**Descrição:** O sistema deve emitir notificações e alertas para eventos críticos, tais como tentativas de acesso não autorizadas, erros no sistema e agendamentos de manutenções.  
**Entradas:** Eventos e ações do sistema, dados de erros, condições pré-definidas de alertas.  
**Origem:** Módulos de segurança, auditoria e manutenção.  
**Saída:** Notificações na interface do sistema, e-mails ou outros canais configurados para alertas.  
**Destino:** Administradores e equipe responsável pela manutenção e segurança.  
**Ação:** Monitorar eventos críticos e disparar alertas automaticamente conforme as regras configuradas.  
**Pré-condição:** Configuração adequada dos canais de notificação e regras de disparo definidas.  
**Pós-condição:** Alertas emitidos e registrados para análise e resposta imediata.  
**Efeitos colaterais:** Possível sobrecarga de notificações se não houver filtros e regras bem definidas, exigindo monitoramento contínuo dos alertas.
