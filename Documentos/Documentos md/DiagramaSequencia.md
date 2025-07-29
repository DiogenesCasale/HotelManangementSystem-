```mermaid
sequenceDiagram
    participant At as Atendente
    participant UI as Interface
    participant RC as ReservationController
    participant RS as ReservationService
    participant AV as AvailabilityService
    participant DB as BancoDeDados
    participant NS as NotificationService
    participant ES as EmailService

    At->>UI: Clicar "Nova Reserva"
    UI->>RC: obterFormularioReserva()
    RC-->>UI: exibirFormulario()

    At->>UI: preencher dados (hóspede, datas, categoria)
    UI->>RC: enviarFormularioReserva(idHospede, dataCheckIn, dataCheckOut, categoria)

    RC->>RS: validarHospede(idHospede)
    RS->>DB: SELECT * FROM Hospedes WHERE id = idHospede
    DB-->>RS: dadosHospede
    RS-->>RC: hospedeValidado

    RC->>AV: verificarDisponibilidade(categoria, dataCheckIn, dataCheckOut)
    AV->>DB: SELECT quartos disponíveis...
    DB-->>AV: listaQuartos
    AV-->>RC: listaQuartos

    alt Quartos disponíveis
        RC-->>UI: exibirQuartosDisponiveis(listaQuartos)
        At->>UI: selecionarQuarto(idQuarto)
        UI->>RC: selecionarQuarto(idQuarto)

        RC->>RS: calcularPreco(idQuarto, dataCheckIn, dataCheckOut)
        RS-->>RC: precoTotal
        RC-->>UI: exibirPreco(precoTotal)

        At->>UI: confirmarReserva()
        UI->>RC: confirmarReserva(detalhes)

        RC->>RS: criarReserva(detalhes)
        RS->>DB: BEGIN TRANSACTION
        RS->>DB: INSERT INTO Reservas (...)
        RS->>DB: UPDATE Quartos SET status = 'Reservado'
        RS->>DB: COMMIT
        RS->>RS: registrarOperacao("criarReserva", usuario, timestamp)

        RC->>NS: enviarConfirmacao(contatoHospede, detalhesReserva)
        NS->>ES: enviarEmail(emailHospede, conteudo)
        ES-->>NS: emailEnviado
        NS-->>RC: confirmacaoEnviada

        RC-->>UI: exibirSucesso(numeroReserva)
    else Sem quartos disponíveis
        RC-->>UI: exibirErro("Nenhum quarto disponível")
    end

    opt Falha no banco de dados
        RC-->>UI: exibirErro("Erro ao cadastrar reserva. Tente novamente.")
    end
