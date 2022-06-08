# Magic Channel Notifications

Utilizando o Magic Form para envio de mensagens através da API disponibilizada pela empresa

## Instalação

Utilizando o composer para instalação

``` bash
composer require samueletur/magic-channel-notification
```

## Configuração

Adicione o parametro `MM2_CODIGO` no arquivo .env com o token recebido

``` bash
MM2_CODIGO=XXX
```

Após gerar a notificação, especifique o canal de envio como *magic* na função via

``` php
public function via($notifiable)
{
    return ['magic'];
}
```

Configure os parametros de retorno na função `toArray``

``` php
    public function toArray($notifiable)
    {
        return [
            'template' => base64_encode($this->mailTemplate($notifiable)),
            'template_emails_to' => $notifiable->email,
            'mm2_assunto' => 'Novo arquivo compartilhado - Magic Files Exchange',
        ];
    }
```

## Template
Acrescente a função para enviar o template do e-mail

``` php
public function mailTemplate($notifiable)
{
    $template = get_class($this);

    return (new $template($this->groupFile))->toMail($notifiable)->render();
}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
composer test
```

## Créditos

- [Samuel Etur](https://github.com/samueletur)