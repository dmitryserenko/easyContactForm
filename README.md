# easyContactForm

Simple contact form snippet for MODX Revolution 2.x.x

@author Dmitry Serenko
@copyright Copyright 2021, Dmitry Serenko


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


### Использование

Примеры быстрого использования сниппета
Форма обратной с вязи с полями: Контактное лицо, Email, Телефон, Сообщение

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

Форма заказа обратного звонка с полями: Контактное лицо, Телефон

```shell
[[!easyContactForm?
    &subject=`Обратный звонок с сайта [[++site_name]]`
    &to=`test@gmail.com`
    &headline=`Поступил заказ обратного звонка с сайта [[++site_name]]`
    &success=`Заявка успешно отправлена, наш менеджер перезвонит вам в ближайшее время`
    &input=`{"name":"Контактное лицо","phone":"Телефон"}`
]]
```

### Опции

Дополнительные опции для настройки сниппета с примерами использования

to - Основной Email для оправки формы [default=info@yourdomain.com]
```shell
&to=`test@gmail.com`
```
cc - Добавить получателей в копию (список адресов через запятую) [default=]
```shell
&cc=`test@gmail.com, test2@gmail.com`
```
bcc - Добавить получателей в скрытую копию (список адресов через запятую) [default=]
```shell
&bcc=`test@gmail.com, test2@gmail.com`
```
subject - Тема отправляемого сообщения [default=Feedback from the site yourdomain.com]
```shell
&subject=`Тема сообщения`
```
headline - Заголовок сообщения [default=You have received a new message from the site]
```shell
&headline=`Сообщение с сайта`
```
success - Текст после успешной отправки [default=Your message has been successfully sent]
```shell
&success=`Ваше сообщение успешно отправлено`
```
input - Список полей типа input (список полей в виде массива) [default={"name":"Contact person","email":"Email","phone":"Phone"}]
```shell
&input=``
```
textarea - Список полей типа input (список полей в виде массива) [default=]
```shell
&textarea=``
```

