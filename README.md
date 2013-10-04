MagentoNet_Cielo
================

Novo módulo da cielo em desenvolvimento



Projeto Inicial
===============

1 -  Autorização

      -> automática após a compra
         
         Sucesso: O usuário é redirecionado para a página de sucesso do magento(à definir, porque pode ser que seja necessário exibir alguns dados adicionais)
         Erro:    O usuário é redirecionado para uma página do módulo onde será exibido o código de erro, e ele poderá fazer uma nova tentativa de pagamento. Essa página também poderá ser acessada do painel do cliente.
     
2 -  Captura

     -> Total automática após a compra 
     -> Parcial Posterior pelo admin
     -> Total posteriormente pelo admin


3 -  Cancelamento

     -> Parcial após a compra
     -> Total após a compra
     -> Cancelamento total automático se o pedido for cancelado(Somente se o pedido tiver menos de 90 dias para crédito).

4 - Autenticação

     -> somente para débito, no momento da compra
     
        Sucesso: O sistema tentara a autorização da transação, no passo 1.
        Erro:    O sistema redirecionará o cliente para uma página personalizada, informando o erro. Ele poderá fazer uma nova tentativa de pagamento. É a mesma página do passo 1.




Fluxo de dados
==============

      function assignData($data)
      
          O módulo salva os dados do cliente no banco de dados para obte-los na autorização
          Nesta estapa, todos os dados do cartão são salvos em um array com no máximo 2 itens. Isso foi feito para facilitar o pagamento por dois cartões no futuro. A chave do array deve ser sempre o id do cadastro do cartão (1 ou 2).
          
        
      
      function autorize()
      
          Débito, se for, envia o cliente para a página de autenticação, depois ela será redirecionada para o controller "retornoCielo", onde o sistema tentará autorizar a transação e redirecionará a pessoa para página de sucesso ou erro.
          Crédito, o sistema faz uma chamada para tentar autorizar a transação e depois redireciona o cliente para sucesso ou erro.
             Se o pagamento por crédito for feito por token, será retornado um erro, o sistema deve identificar e enviar uma nova solicitação de autorização com o novo token.
             Se o pagamento for feito sem token, o sistema deve gerar um token e salva-lo no atributo token_cielo do cliente. Também é preciso salvar os 4 ultimos numeros do cartao deste token no atributo cclast4_cielo do cliente.




      
      

