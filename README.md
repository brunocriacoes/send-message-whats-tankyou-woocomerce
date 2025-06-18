# Envio de Mensagens WhatsApp para WooCommerce

Este plugin adiciona a funcionalidade de enviar mensagens pelo WhatsApp para pedidos do WooCommerce utilizando a API `w-api.app`. Ele é configurado para enviar uma mensagem personalizada ao cliente após a finalização do pedido.

## Como Funciona

O plugin utiliza o hook `woocommerce_thankyou` para capturar o evento de finalização de um pedido no WooCommerce. Ele então envia uma mensagem detalhada para o número de telefone do cliente utilizando a API `w-api.app`.

### Configuração

1. **Obtenha as Credenciais da API**  
   Antes de usar o plugin, você precisa de um `instanceId` e um `token` da API `w-api.app`. Cadastre-se na plataforma para obter essas credenciais.

2. **Adicione o Código ao WordPress**  
   Use o plugin **Snippets** ou edite diretamente os arquivos do seu tema para adicionar o código fornecido.

3. **Personalize a Mensagem**  
   No código, você pode personalizar a mensagem enviada ao cliente. Por exemplo:
   ```php
   $mensagem = "
   Bem vindo ao THOMAS APP💡\n\n
   Voce acaba de efetuar uma compra no BEK BURITIS🛍🤠 \n\n
   Pedido: #".$order_id." \n
   Total: R$".$total." \n\n
   Retire suas fichas direto no Bek Buritis \n\n
   O BEK agradece.🥳\n
   https://bekburitis.com.br 📚
   ";
   ```

4. **Configure as Credenciais no Código**  
   Substitua os valores de `your_instance_id` e `your_token` no código pelas suas credenciais da API:
   ```php
   $instanceId = 'your_instance_id';
   $token = 'your_token';
   ```

5. **Teste o Plugin**  
   Finalize um pedido no WooCommerce e verifique se a mensagem foi enviada para o número de telefone do cliente.

## Uso Recomendado

É recomendável utilizar o plugin **Snippets** para adicionar ou modificar a funcionalidade fornecida por este plugin. O Snippets permite adicionar código PHP personalizado ao seu site WordPress de forma segura, sem a necessidade de modificar diretamente os arquivos de temas ou plugins, garantindo melhor manutenção e compatibilidade com atualizações.

### Sobre o Plugin Snippets

O plugin Snippets é uma ferramenta poderosa para WordPress que permite:

- Adicionar trechos de código PHP personalizados ao seu site.
- Gerenciar e organizar seus snippets de forma fácil.
- Evitar a edição direta de arquivos de temas ou plugins, reduzindo o risco de quebrar o site.

Com o uso do plugin Snippets, você pode estender ou personalizar o comportamento deste plugin para atender às suas necessidades específicas, como adaptá-lo para funcionar com uma API de WhatsApp diferente.