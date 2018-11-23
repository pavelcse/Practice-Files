$(document).ready(function () {
    //tootip
    $('[data-toggle="tooltip"]').tooltip()

    //when click on edit icon
    $('.edit').click(function () {
        $(this).hide().parent().find('.supress_icon').show();
        var user_td = $(this).parent().siblings('.username');
        var mail_td = $(this).parent().siblings('.email');
        var username = user_td.text();
        var email = mail_td.text();
        var username_input = '<input class="form-control username_box" name="username" value="' + username + '"/>';
        var mail_input = '<input class="form-control email_box" name="email" value="' + email + '"/>';
        $(this).parent().find('.usernamed').val(username);
        $(this).parent().find('.maild').val(email);
        user_td.html(username_input);
        mail_td.html(mail_input);
    });

    $('.cancel').click(function () {
        $(this).parent().find('.supress_icon').hide();
        $(this).parent().find('.edit').show();
        var username = $(this).parent().find('.usernamed').val();
        var email = $(this).parent().find('.maild').val();
        var user_td = $(this).parent().siblings('.username');
        var mail_td = $(this).parent().siblings('.email');
        user_td.html(username);
        mail_td.html(email);
    });

    $('.save').click(function () {
        var base_url = $('#base_url').val();
        var site_url = $('#site_url').val();
        var username = $(this).parent().siblings('.username').find('.username_box').val();
        var email = $(this).parent().siblings('.email').find('.email_box').val();
        var user_id = $(this).parent().find('.user_id').val();
        $.ajax({
            context: this,
            url: site_url + '/users/save',
            type: 'post',
            dataType: 'text',
            data: {
                username: username,
                email: email,
                user_id: user_id
            },
            beforeSend: function () {
                $(this).parent().append('<img id="loader" src="' + base_url + 'assets/images/loader.gif" alt="loading"/>');
            },
            success: function (response) {
                if (response !== 'problem') {
                    var info = response.split('|');
                    $(this).parent().find('.supress_icon').hide();
                    $(this).parent().find('.edit').show();
                    var user_td = $(this).parent().siblings('.username');
                    var mail_td = $(this).parent().siblings('.email');
                    user_td.html(info[0]);
                    mail_td.html(info[1]);
                } else {
                    alert('There ais a problem');
                }
                $('#loader').remove();
            }
        });
    });
});