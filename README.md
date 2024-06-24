# Projeto de Teste para eSales
Este é um projeto de teste para a aplicação eSales. Ele utiliza PHP 8.1 com o servidor Apache e é configurado para ser executado em um ambiente Docker.
## Configurações de Ambiente
 - PHP: Versão 8.1
 - Servidor Web: Apache
 - Ambiente: Docker

 ## Requisitos

  Para executar este projeto em seu ambiente local, você precisará ter instalado:

  - Docker
  - Docker Compose
   
## Instruções de Instalação:

1. **Clone o Projeto:**
   ```bash
   git clone https://github.com/linsmarcruz/esale.git

2. **Acesse o Diretório do Projeto:**
   ```bash
   cd esale

3. **Suba os Containers:**
   ```bash
   docker-compose up -d

4. **Acesse a Aplicação:** 
 
Abra o navegador e acesse `http://localhost:8080`.

## Observações
- Certifique-se de ter o Docker instalado em sua máquina.
- Este projeto é apenas para fins de teste e demonstração.


## Soluções Aplicadas:

1. **Desafio 1: Otimização de Rota de Entrega**
   - Para resolver o problema, implementei uma abordagem de força bruta. Utilizei uma função recursiva para explorar todas as combinações possíveis, evitando recálculos. Durante a execução, marco cada ponto como visitado e atualizo o custo da rota, calculando todas as permutações para identificar a rota mais curta.

2. **Desafio 2: Rastreamento de Inventário**
   - Para resolver este desafio, implementei uma função que, ao receber operações de entrada, adiciona a quantidade informada ao item correspondente da tupla e armazena no atributo inventory, simulando um banco de dados. Além disso, ao receber operações de saída, a função executa a subtração da quantidade do item.

3. **Desafio 3: Planejamento de Carga de Veículos**
   - Neste desafio, utilizei uma abordagem de programação dinâmica para otimizar a carga do veículo. Comecei com uma lista de produtos e seus pesos, além da capacidade máxima do veículo. Criei uma matriz de capacidade para armazenar os pesos máximos possíveis para cada subproblema, decidindo se incluir ou não cada produto. No final, reconstruí a lista de produtos com a carga máxima sem ultrapassar a capacidade.

4. **Desafio 4: Alocação de Veículos**
   - Na solução deste desafio para otimizar a alocação de veículos de entrega. Primeiro, ordenei os pedidos e veículos em ordem decrescente de peso e capacidade, respectivamente. Em seguida, para cada veículo, aloquei os pedidos maiores até que a capacidade do veículo fosse atingida. A função retorna uma lista de alocações com os IDs dos veículos e os pedidos correspondentes, priorizando a utilização da capacidade máxima dos veículos.

5. **Desafio 5: Previsão de Demanda**
   - Para resolver este desafio utilizei a abordagem de calcular a média com base em dados históricos, para estimar as vendas futuras. 
Na implementação, calculei a média dos últimos períodos. Verifiquei se havia dados suficientes e, se sim, a média é obtida somando as quantidades vendidas e dividindo pelo número de períodos.

