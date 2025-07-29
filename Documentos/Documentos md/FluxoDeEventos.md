# Fluxos de Eventos – Sistema de Hotel

---

## RF01 – Entrar no Sistema
**Ator primário:** Usuário  
**Pré-condições:** Sistema disponível; usuário cadastrado  
**Pós-condições:** Sessão de usuário iniciada

### Fluxo Principal
1. Usuário acessa a tela de login.  
2. Usuário insere nome de usuário e senha.  
3. Sistema valida formato das credenciais.  
4. Sistema consulta repositório de usuários.  
5. Se credenciais corretas, sistema inicia sessão e redireciona para dashboard.  
6. Sistema registra log de acesso.

### Fluxos Alternativos
 **A1: Credenciais inválidas**  
  1. Sistema detecta usuário ou senha incorretos.  
  2. Exibe mensagem de erro “Usuário ou senha inválidos”.  
  3. Usuário pode tentar novamente.

 **A2: Conta bloqueada**  
  1. Sistema verifica status da conta e encontra bloqueio.  
  2. Exibe “Conta bloqueada. Contate o administrador.”

---

## RF02 – Cadastrar Usuários
**Ator primário:** Administrador  
**Pré-condições:** Administrador autenticado  
**Pós-condições:** Novo usuário persistido

### Fluxo Principal
1. Administrador seleciona “Cadastrar Usuário”.  
2. Sistema exibe formulário de cadastro.  
3. Administrador preenche nome, e-mail, perfil de acesso.  
4. Sistema valida dados obrigatórios e formato de e-mail.  
5. Sistema grava novo usuário no banco.  
6. Sistema registra log de auditoria.  
7. Sistema exibe confirmação de sucesso.

### Fluxos Alternativos
 **A1: Dados inválidos**  
  1. Sistema identifica campos obrigatórios faltando ou formato incorreto.  
  2. Destaca campos com erro e exibe mensagens apropriadas.

 **A2: Erro de persistência**  
  1. Falha ao gravar no banco.  
  2. Sistema registra erro em log.  
  3. Exibe “Erro ao cadastrar usuário. Tente novamente.”

---

## RF03 – Manter Usuário
**Ator primário:** Administrador  
**Pré-condições:** Administrador autenticado; usuário existente selecionado  
**Pós-condições:** Dados do usuário atualizados ou excluídos

### Fluxo Principal
1. Administrador acessa lista de usuários.  
2. Seleciona usuário e escolhe “Editar” ou “Excluir”.  
3. **Editar:** sistema exibe formulário com dados atuais.  
4. Administrador altera campos e confirma.  
5. Sistema valida e grava alterações.  
6. Sistema registra log.  
7. Exibe mensagem de sucesso.

### Fluxos Alternativos
 **A1: Exclusão com dependências**  
  1. Sistema detecta referências (reservas, logs).  
  2. Exibe aviso e impede exclusão.

 **A2: Erro de validação ou persistência** (semelhante a RF02).

---

## RF04 – Cadastrar Quartos
**Ator primário:** Administrador  
**Pré-condições:** Administrador autenticado  
**Pós-condições:** Novo quarto cadastrado

### Fluxo Principal
1. Administrador escolhe “Gerenciar Quartos” → “Cadastrar Quarto”.  
2. Sistema exibe formulário (número, categoria, tarifa).  
3. Administrador preenche dados.  
4. Sistema valida unicidade do número e formatos.  
5. Sistema grava quarto no BD.  
6. Sistema registra log.  
7. Exibe confirmação.

### Fluxos Alternativos
 **A1: Número já existe**  
  1. Sistema detecta duplicidade.  
  2. Exibe “Número de quarto já cadastrado”.

 **A2: Erro de persistência**  
  1. Falha ao gravar.  
  2. Log de erro e mensagem de falha.

---

## RF05 – Gerenciar Quartos
**Ator primário:** Administrador  
**Pré-condições:** Administrador autenticado  
**Pós-condições:** Quarto adicionado, editado ou removido

### Fluxo Principal
1. Administrador acessa “Gerenciar Quartos”.  
2. Sistema lista todos os quartos com status e tarifas.  
3. Administrador escolhe “Editar”, “Excluir” ou “Cadastrar” (invoca RF04).  
4. Sistema segue fluxo de edição/exclusão ou redireciona para RF04.

### Fluxos Alternativos
 **A1: Exclusão com reservas ativas**  
  1. Sistema impede exclusão e exibe aviso.

---

## RF06 – Adicionar Hóspedes
**Ator primário:** Recepcionista  
**Pré-condições:** Recepcionista autenticada  
**Pós-condições:** Hóspede cadastrado

### Fluxo Principal
1. Recepcionista seleciona “Adicionar Hóspede”.  
2. Sistema exibe formulário de dados pessoais.  
3. Recepcionista preenche e confirma.  
4. Sistema valida CPF/RG e grava no BD.  
5. Log de auditoria.  
6. Exibe confirmação.

### Fluxos Alternativos
 **A1: CPF já cadastrado**  
  1. Sistema exibe mensagem de duplicidade.

---

## RF07 – Atualizar Hóspedes
**Ator primário:** Recepcionista  
**Pré-condições:** Hóspede existente selecionado  
**Pós-condições:** Dados atualizados

### Fluxo Principal
1. Recepcionista acessa lista de hóspedes.  
2. Seleciona “Editar”.  
3. Sistema exibe formulário com dados atuais.  
4. Recepcionista altera e confirma.  
5. Sistema valida e grava.  
6. Log de auditoria.  
7. Exibe confirmação.

---

## RF09 – Atualizar Reservas
**Ator primário:** Recepcionista  
**Pré-condições:** Reserva existente selecionada  
**Pós-condições:** Reserva modificada

### Fluxo Principal
1. Recepcionista acessa lista de reservas.  
2. Seleciona reserva e clica em “Editar”.  
3. Sistema exibe formulário com dados atuais.  
4. Alterações (datas, quarto, hóspede) e confirmação.  
5. Sistema valida disponibilidade no novo período.  
6. Em transação, atualiza reserva e status de quarto.  
7. Log de alteração.  
8. Exibe confirmação.

### Fluxos Alternativos
 **A1: Novo período indisponível** → similar a A1 de RF08.

---

## RF10 – Realizar Check‑in
**Ator primário:** Recepcionista  
**Pré-condições:** Reserva confirmada e data de início válida  
**Pós-condições:** Status do hóspede e quarto atualizados

### Fluxo Principal
1. Recepcionista seleciona “Check‑in”.  
2. Sistema solicita número de reserva.  
3. Sistema valida existência e data.  
4. Em transação, atualiza status da reserva para “Em Andamento” e status do quarto para “Ocupado”.  
5. Gera chave/cartão e registra em log.  
6. Exibe confirmação.

### Fluxos Alternativos
 **A1: Reserva não encontrada ou data inválida**  
  1. Exibe erro e permite nova busca.

---

## RF11 – Realizar Check‑out
**Ator primário:** Recepcionista  
**Pré-condições:** Hóspede em quarto ocupado  
**Pós-condições:** Quarto liberado; reserva finalizada

### Fluxo Principal
1. Recepcionista seleciona “Check‑out”.  
2. Informa número de reserva.  
3. Sistema calcula valor final (diárias, extras, impostos).  
4. Em transação, atualiza status da reserva para “Finalizada” e quarto para “Livre”.  
5. Gera fatura e registra log.  
6. Exibe total e solicita pagamento (invoca RF14).

### Fluxos Alternativos
 **A1: Reserva inválida** → erro e retorno ao menu.

---

## RF12 – Abrir Caixa
**Ator primário:** Recepcionista  
**Pré-condições:** Dia de trabalho iniciado  
**Pós-condições:** Caixa aberto com saldo inicial

### Fluxo Principal
1. Recepcionista acessa “Abrir Caixa”.  
2. Insere valor inicial.  
3. Sistema valida valor e grava abertura.  
4. Log de operação.  
5. Exibe status do caixa.

### Fluxos Alternativos
 **A1: Caixa já aberto** → exibe mensagem e impede nova abertura.

---

## RF13 – Manter Caixa
**Ator primário:** Recepcionista  
**Pré-condições:** Caixa aberto  
**Pós-condições:** Movimentações registradas

### Fluxo Principal
1. Recepcionista registra entrada ou saída de valores.  
2. Sistema valida categoria e valor.  
3. Grava transação no caixa.  
4. Atualiza saldo atual.  
5. Log de movimentação.  
6. Exibe saldo atualizado.

### Fluxos Alternativos
 **A1: Caixa fechado** → impede movimentações.

---

## RF14 – Processar Pagamentos
**Ator primário:** Recepcionista  
**Pré-condições:** Valor a pagar definido (check‑out ou reserva antecipada)  
**Pós-condições:** Pagamento registrado

### Fluxo Principal
1. Recepcionista seleciona método de pagamento (dinheiro, cartão, etc.).  
2. Sistema exibe formulário de pagamento.  
3. Recepcionista insere dados e confirma.  
4. Sistema valida dados do cartão ou valor em dinheiro.  
5. Em transação, registra pagamento.  
6. Sistema invoca RF15 – Emitir Notas Fiscais.  
7. Log de pagamento.  
8. Exibe recibo.

### Fluxos Alternativos
 **A1: Falha na autorização de cartão** → exibe erro e permite novo método.  
 **A2: Dados inválidos** → destaca campos e solicita correção.

---

## RF15 – Emitir Notas Fiscais
**Ator primário:** Sistema (invocado por RF14)  
**Pré-condições:** Pagamento confirmado  
**Pós-condições:** Nota fiscal gerada e armazenada

### Fluxo Principal
1. Gera dados fiscais (impostos, valores).
2. Em transação, grava nota no BD.  
3. Envia nota ao cliente (e-mail).  
4. Log de emissão.

### Fluxos Alternativos
 **A1: Erro na geração de nota** → registra erro e notifica suporte.

---

## RF16 – Cadastrar Fornecedores
**Ator primário:** Administrador  
**Pré-condições:** Administrador autenticado  
**Pós-condições:** Fornecedor cadastrado

### Fluxo Principal
1. Administrador seleciona “Cadastrar Fornecedor”.  
2. Sistema exibe formulário.  
3. Preenche dados (nome, contato, categoria).  
4. Valida unicidade e formatos.  
5. Grava no BD e registra log.  
6. Exibe confirmação.

### Fluxos Alternativos
 **A1: Duplicidade** → mensagem de fornecedor já cadastrado.

---

## RF17 – Gerenciar Estoque
**Ator primário:** Administrador  
**Pré-condições:** Administrador autenticado  
**Pós-condições:** Itens ajustados

### Fluxo Principal
1. Administrador acessa “Gerenciar Estoque”.  
2. Sistema lista itens com quantidades.  
3. Escolhe “Adicionar”, “Remover” ou “Ajustar”.  
4. Em cada ação, sistema valida valores e atualiza quantidades.  
5. Grava movimentação e registra log.  
6. Invoca RF18 – Gerar Relatórios (include) se solicitado.

### Fluxos Alternativos
 **A1: Quantidade insuficiente** → impede retirada e exibe aviso.

---

## RF18 – Gerar Relatórios
**Ator primário:** Administrador  
**Pré-condições:** Dados disponíveis  
**Pós-condições:** Relatório disponibilizado

### Fluxo Principal
1. Administrador escolhe tipo de relatório (vendas, estoque).  
2. Sistema solicita parâmetros (período, categoria).  
3. Sistema coleta dados em transação de leitura.  
4. Gera relatório (PDF/CSV).  
5. Registra log.  
6. Exibe ou envia relatório.

### Fluxos Alternativos
 **A1: Falha na geração** → notifica erro e sugere tentar novamente.  
 **A2: Backup e Recuperação (include RF23)** → antes de gerar, permite restaurar dados de backup.

---

## RF19 – Agendar Manutenções
**Ator primário:** Administrador  
**Pré-condições:** Administrador autenticado  
**Pós-condições:** Manutenção registrada

### Fluxo Principal
1. Administrador seleciona “Agendar Manutenção”.  
2. Sistema exibe formulário (quarto, data, tipo).  
3. Valida disponibilidade de agenda.  
4. Grava no BD e registra log.  
5. Exibe confirmação.

### Fluxos Alternativos
 **A1: Conflito de agenda** → exibe datas alternativas.

---

## RF20 – API de Integração
**Ator primário:** SistemaExterno  
**Pré-condições:** Chave de API válida  
**Pós-condições:** Dados integrados

### Fluxo Principal
1. SistemaExterno faz requisição REST (GET/POST).  
2. Sistema autentica token.  
3. Valida permissão e formato de payload.  
4. Processa solicitação via camada de serviço.  
5. Retorna resposta JSON com status.  
6. Log de integração.

### Fluxos Alternativos
 **A1: Token inválido** → HTTP 401 Unauthorized.  
 **A2: Dados inválidos** → HTTP 400 Bad Request.

---

## RF21 – Controle de Acesso e Segurança
**Ator primário:** Administrador / Sistema  
**Pré-condições:** Módulo habilitado  
**Pós-condições:** Acesso registrado

### Fluxo Principal
1. Para cada requisição, sistema verifica perfil de acesso.  
2. Permite ou nega acesso.  
3. Em caso de negação, retorna HTTP 403 ou exibe tela de acesso negado.  
4. Log de tentativas.

---

## RF22 – Auditoria e Logs
**Ator primário:** Sistema  
**Pré-condições:** Eventos ocorrendo  
**Pós-condições:** Logs persistidos

### Fluxo Principal
1. Cada operação crítica envia evento ao módulo de auditoria.  
2. Sistema grava detalhes (usuário, ação, timestamp).  
3. Logs armazenados em repositório separado.  
4. Administrador pode consultar relatórios de auditoria.

---

## RF23 – Backup e Recuperação
**Ator primário:** Administrador / Sistema  
**Pré-condições:** Agenda de backup configurada  
**Pós-condições:** Backup ou recuperação concluída

### Fluxo Principal
1. Agendador dispara rotina de backup.  
2. Sistema exporta dados para storage.  
3. Valida integridade do arquivo.  
4. Registra log.  
5. Para recuperação, administrador seleciona ponto de restauração.  
6. Sistema importa dados e registra log.

---

## RF24 – Gerenciamento de Sessões
**Ator primário:** Sistema  
**Pré-condições:** Usuário logado  
**Pós-condições:** Sessão ativa ou encerrada

### Fluxo Principal
1. Ao login, sistema gera token de sessão.  
2. Armazena token e expiração.  
3. Em cada requisição, valida token.  
4. Se inativo, expira sessão e redireciona ao login.  
5. Logout remove token e registra log.

---

## RF25 – Notificações e Alertas
**Ator primário:** Sistema  
**Pré-condições:** Eventos configurados  
**Pós-condições:** Notificações enviadas

### Fluxo Principal
1. Evento relevante ocorre (reserva, check‑in etc.).  
2. Sistema seleciona canal (e‑mail).  
3. Prepara mensagem com template.  
4. Envia via serviço de notificações.  
5. Registra log de envio.

### Fluxos Alternativos
 **A1: Falha no envio** → registra falha e notifica suporte.

---
