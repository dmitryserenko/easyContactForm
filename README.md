# easyContactForm

Simple contact form snippet for MODX Revolution 2.x.x

@author Dmitry Serenko
@copyright Copyright 2021, Dmitry Serenko

### Использование

Пример быстрого использования сниппета

```shell
[[!easyContactForm?
    &subject=`Сообщение с сайта [[++site_name]]`
    &to=`test@gmail.com`
    &headline=`Поступило новое сообщение с сайта [[++site_name]]`
    &success=`Ваше сообщение успешно отправлено`
    &input=`{"name":"Контактное лицо","email":"Email","phone":"Телефон"}`
    &textarea=`{"text":"Сообщение"}`
]]
```

### Options

Additional options for customizing snippet

to - Primary email address for sending mail [default=info@yourdomain.com]
```shell
&to=`test@gmail.com`
```
cc - Add carbon copy to header of the mail [default=]
```shell
&cc=`test@gmail.com, test2@gmail.com`
```
bcc - Add blind carbon copy to header of the mail [default=]
```shell
&bcc=`test@gmail.com, test2@gmail.com`
```
subject - Subject of the mail [default=Feedback from the site yourdomain.com]
```shell
&subject=``
```
headline - Headline of the message [default=You have received a new message from the site]
```shell
&headline=``
```
success - [default=Your message has been successfully sent]
```shell
&success=``
```
input - [default={"name":"Contact person","email":"Email","phone":"Phone"}]
```shell
&input=``
```
textarea - [default={"text":"Your message"}]
```shell
&textarea=``
```

## Опции

Дополнительные опции для настройки сниппета с примерами использования

to - Основной Email для оправки формы [default=info@yourdomain.com]
```shell
&to=`test@gmail.com`
```
cc - Добавить получателей в копию [default=]
```shell
&cc=`test@gmail.com, test2@gmail.com`
```
bcc - Добавить получателей в скрытую копию [default=]
```shell
&bcc=`test@gmail.com, test2@gmail.com`
```
subject - Subject of the mail [default=Feedback from the site yourdomain.com]
```shell
&subject=``
```
headline - Headline of the message [default=You have received a new message from the site]
```shell
&headline=``
```
success - [default=Your message has been successfully sent]
```shell
&success=``
```
input - [default={"name":"Contact person","email":"Email","phone":"Phone"}]
```shell
&input=``
```
textarea - [default={"text":"Your message"}]
```shell
&textarea=``
```

