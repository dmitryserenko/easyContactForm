# easyContactForm

Simple contact form snippet for MODX Revolution 2.x.x

@author Dmitry Serenko
@copyright Copyright 2021, Dmitry Serenko

## Использование

```shell
[[!easyContactForm?
    &subject=`Сообщение с сайта [[++site_name]]`
    &to=`test@gmail.com`
    &headline=`Поступило новое сообщение с сайта [[++site_name]]`
    &success=`Ваше сообщение успешно отправлено`
    &input=`{"name":"Контактное лицо","email":"Email","phone":"Телефон"}`
    &textarea=`{"text":"Сообщение","message":"Дополнительная информация"}`
]]
```

OPTIONS

* to - Primary email address for sending mail [default=info@yourdomain.com]
* cc - Add carbon copy to header of the mail [default=]
* bcc - Add blind carbon copy to header of the mail [default=]
* subject - Subject of the mail [default=Feedback from the site yourdomain.com]
* headline - Headline of the message [default=You have received a new message from the site]
* success - [default=Your message has been successfully sent]
* input - [default={"name":"Contact person","email":"Email","phone":"Phone"}]
* textarea - [default={"text":"Your message"}]
