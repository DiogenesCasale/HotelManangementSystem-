## Requisitos Não Funcionais

### RNF01 - Usabilidade
	A interface do sistema de gerenciamento de hotel deve ser intuitiva e de fácil aprendizagem,
	garantindo que novos usuários consigam realizar as tarefas essenciais de forma eficiente e
	sem dificuldades. O tempo médio de treinamento para que os usuários aprendam as funções
	essenciais (cadastro de clientes, registro de quartos, check-in/out e reservas) deve ser
	igual ou inferior a 1 hora, incluindo um vídeo explicativo que demonstre as funcionalidades
	principais do sistema.
	Além disso, para melhorar a experiência do usuário e otimizar a navegação, o sistema adotará
	a utilização de modais (janelas pop-up) para as interações de cadastro. Ao centralizar essas
	interações em uma janela pop-up dentro da mesma tela, o sistema reduzirá o número de transições
	entre páginas, mantendo o contexto da ação e evitando que o usuário precise navegar para outras
	seções do sistema. Isso proporcionará uma navegação mais ágil e eficiente, além de uma experiência
	mais fluida e intuitiva.
	A interface será otimizada para ser utilizada em diferentes dispositivos, como desktops, tablets e
	smartphones, garantindo que a experiência de uso seja consistente e acessível em qualquer plataforma.
	O sistema fornecerá feedback visual claro e instantâneo para todas as ações do usuário, como confirmações
	de registro, erros de preenchimento ou ações incompletas. Isso ajudará o usuário a entender rapidamente
	se a operação foi bem-sucedida ou se há necessidade de correção.

### RNF02 - Portabilidade
	O banco de dados será implementado com o banco de dados MySQL dentro de um container Docker na versão 27.4.0,
	garantindo a portabilidade e consistência da configuração em diferentes ambientes. A aplicação será acessada
	via web e exigirá um navegador moderno, compatível com CSS3 e ECMAScript 2024, para oferecer uma experiência
	completa. O sistema será compatível com os principais sistemas operacionais como Windows, Linux e macOS, permitindo
	sua execução em máquinas locais ou remotas. A arquitetura baseada em containers Docker possibilitará
	fácil escalabilidade e adaptação a diferentes níveis de demanda, seja em ambientes de nuvem ou locais. O banco de
	dados MySQL permitirá backups simples e eficientes, com a possibilidade de migração de dados entre ambientes,
	facilitando a recuperação e manutenção do sistema.
	
### RNF03 - Performance
	As funcões do sistema devem ser realizadas em um tempo limite de 3 segundos, acessível em
	uma máquina com os seguintes requisitos mínimos de hardware: 
	Processador: Intel Core i3 (8ª geração) / Amd Ryzen 3
	Memória Ram: 4GB (mínimo), recomendado 8GB
	Armazenamento: SSD 128GB
	
### RNF04 - Confiabilidade
	O sistema deve possuir mecanismos de segurança para prevenir perda de dados e falhas no funcionamento.
	Uma das principais funcionalidades será a opção de backup do banco de dados, permitindo que os usuários
	realizem backups manuais sempre que necessário. Além disso, o sistema deve possibilitar o agendamento
	automático de backups, garantindo que cópias de segurança sejam feitas de forma periódica e sem a necessidade
	de intervenção do usuário, minimizando o risco de perda de dados importantes.
	O sistema também deverá incluir mecanismos de validação para garantir a integridade dos dados antes e após a
	realização de backups, evitando que dados corrompidos sejam armazenados. Para maior confiabilidade, a recuperação
	de dados também será facilitada, permitindo que os backups sejam restaurados rapidamente em caso de falha ou perda de dados.

### RNF05 - Segurança
	O sistema deve garantir a proteção dos dados pessoais dos hóspedes e das informações sensíveis do hotel, em conformidade com
	a Lei Geral de Proteção de Dados (LGPD). Todos os dados coletados, armazenados e processados pelo sistema deverão ser tratados
	de forma a garantir a privacidade e segurança, adotando práticas e tecnologias de proteção de dados, como criptografia em
	trânsito e em repouso.
	O acesso aos dados e funções do sistema será restrito e controlado, sendo permitido apenas a usuários autorizados com contas
	específicas para diferentes cargos e permissões. O sistema implementará um mecanismo de autenticação para garantir que apenas
	usuários autenticados e com privilégios adequados possam acessar funções sensíveis, como visualização e edição de dados dos
	hóspedes, reservas, informações financeiras e relatórios internos.	

### RNF06 - Flexibilidade
	A arquitetura do sistema deve permitir a modificação e adição de funcionalidades sem a
	necessidade de grandes mudanças no código fonte do produto. A interface será responsiva para
	uso em desktops, tablets e smartphones, permitindo acesso rápido sem necessidade de
	aplicativos móveis dedicados.
	
	
	
