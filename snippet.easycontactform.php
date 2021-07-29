<?php
/**
 * easyContactForm
 *
 * Simple ajax contact form snippet for MODX Revolution 2.x.x
 *
 * @author Dmitry Serenko
 * @copyright Copyright 2021, Dmitry Serenko
 *
 * https://github.com/dmitryserenko/easyContactForm
 * 
 * OPTIONS
 *
 * to - Primary email address for sending mail [default=info@yourdomain.com]
 * cc - Add carbon copy to header of the mail [default=]
 * bcc - Add blind carbon copy to header of the mail [default=]
 * subject - Subject of the mail [default=Feedback from the site yourdomain.com]
 * headline - Headline of the message [default=You have received a new message from the site]
 * success - [default=Your message has been successfully sent]
 * input - [default={"name":"Contact Person","email":"Email","phone":"Phone"}]
 * textarea - [default=]
 * placeholder - Display title as placeholder [default=false]
 *
 */
$input_list = isset($input) ? json_decode($input) : json_decode('{"name":"Contact Person","email":"Email","phone":"Phone"}');
$textarea_list = isset($textarea) ? json_decode($textarea) : array();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['token']) && $_POST['token'] === '4539a98cca0a2410551c04d1a0e3b753') {
    $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
    $headers .= isset($_POST['email']) ? 'Reply-To: ' . $_POST['email'] . "\r\n" : '';
    $to = isset($to) ? $to : 'info@' . $_SERVER['HTTP_HOST'];
    $headers .= isset($cc) ? 'Cc: ' . $cc . "\r\n" : '';
    $headers .= isset($bcc) ? 'Bcc: ' . $bcc . "\r\n" : '';
    $subject = isset($subject) ? $subject : 'Feedback from the site ' . $_SERVER['HTTP_HOST'];
    $message = isset($headline) ? $headline . "\r\n\r\n" : 'You have received a new message from the site' . "\r\n\r\n";
    $success = isset($success) ? $success : 'Your message has been successfully sent';
    $placeholder = isset($placeholder) && $placeholder == 'true' ? true : false;
    foreach ($input_list as $name => $title) {$message .= $title . ': ' . $_POST[$name] . "\r\n";}
    foreach ($textarea_list as $name => $title) {$message .= $title . ': ' . $_POST[$name] . "\r\n";}
    $message .= "\r\n" . '--' . "\r\n";
    $message .= 'The message was sent from ' . $_SERVER['HTTP_HOST'] . "\r\n";
    $message .= 'Sender IP ' . $_SERVER['REMOTE_ADDR'] . "\r\n";
    mail($to, $subject, $message, $headers);
    echo ('<div id="simpleсontactResult">' . $success . '<div>');
} else {
    $prefix = 'simpleсontact';
    foreach ($input_list as $name => $title) {
        if ($placeholder) {
            echo('<label><input type="text" class="form-control" name="simpleсontact_' . $name . '" placeholder="' . $title .'"></label>');
        } else {
            echo('<label>' . $title .'<input type="text" class="form-control" name="simpleсontact_' . $name . '"></label>');
        }
    }
    foreach ($textarea_list as $name => $title) {
        if ($placeholder) {
            echo('<label><textarea class="form-control" name="simpleсontact_' . $name . '" rows="6" placeholder="' . $title .'"></textarea></label>');
        } else {
            echo('<label>' . $title . '<textarea class="form-control" name="simpleсontact_' . $name . '" rows="6"></textarea></label>');
        }
    }
    
    echo('<div id="simpleсontactResult"><input type="button" class="simpleсontact_button button" value="Отправить" /></div>');
    echo('
    <style>
    .form-control {display: block;width: 100%;padding: .5rem;border: 1px dashed #a0a0a0;box-shadow: none;}
    .is-invalid-label {color: #dc3545;}
    .is-invalid-input {border-color: #dc3545;}
    </style>
    ');
    echo('
    <script>
    window.onload = function() {
        if (!window.jQuery) {alert(\'jQuery is not loaded. This library is needed for work the form\');}
    }
    $(\'#simpleсontactResult\').on(\'click\', \'.simpleсontact_button\', function() {
        var prefix = \'simpleсontact\';
        var token = \'' . md5($prefix) . '\';
    ');
    foreach ($input_list as $name => $title) {
        echo('
        var ' . $prefix . '_' . $name . ' = $(\'input[name="' . $prefix . '_' . $name . '"]\').val();
        if (' . $prefix . '_' . $name . '.length < 3) {
            $(\'input[name="' . $prefix . '_' . $name . '"]\').addClass(\'is-invalid-input\');
            $(\'input[name="' . $prefix . '_' . $name . '"]\').parent().addClass(\'is-invalid-label\');
        }
        ');
    }
    foreach ($textarea_list as $name => $title) {
        echo('
        var ' . $prefix . '_' . $name . ' = $(\'textarea[name="' . $prefix . '_' . $name . '"]\').val();
        if (' . $prefix . '_' . $name . '.length < 3) {
            $(\'textarea[name="' . $prefix . '_' . $name . '"]\').addClass(\'is-invalid-input\');
            $(\'textarea[name="' . $prefix . '_' . $name . '"]\').parent().addClass(\'is-invalid-label\');
        }
        ');
    }
    echo('
        if ($(\'.is-invalid-input\').length === 0) {
            $(\'input\').attr(\'disabled\', true);
            $(\'textarea\').attr(\'disabled\', true);
            $.post(window.location + \'?simpleсontact=ajax\', {token: \'4539a98cca0a2410551c04d1a0e3b753\', name: simpleсontact_name, email: simpleсontact_email, phone: simpleсontact_phone, text: simpleсontact_text})
                .done(function(resp) {
                    var result = $(resp).find(\'#simpleсontactResult\').html();
                    $(\'#simpleсontactResult\').html(result);
                })
                .fail(function() {
                    $(\'#simpleсontactResult\').html(\'Error\');
                });
        } else {$(\'#simpleсontactResult\').html(\'<input type="button" class="simpleсontact_button button" value="Отправить" disabled />\');}
    });
    $(\'label\').on(\'keypress keyup change\', \'input, textarea\', function() {
        if ($(this).val().length >= 5) {
            $(this).removeClass(\'is-invalid-input\');
            $(this).parent().removeClass(\'is-invalid-label\');
            $(\'input\').attr(\'disabled\', false);
        }
    });
    </script>');
}
