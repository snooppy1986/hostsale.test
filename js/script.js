/*hide information block*/
$('.alert').hide();
/*hide user table*/
$('#users_table').hide();
$(document).ready(function () {
    /*Validate form from user side*/
    $('#user_form').validate({
        rules:{
            email:{
                required: true,
                email: true
            },
            password:{
                required: true
            },
            password_confirmation:{
                required: true,
                equalTo: '#password'
            }
        },
        messages:{
            email:{
                required:'Це поле є обов\'язковим',
                email:'Помилка. Поштова адреса має містити "@"'
            },
            password:{
                required:'Це поле є обов\'язковим'
            },
            password_confirmation: {
                required:'Це поле є обов\'язковим',
                equalTo:'Помилка підтвердження'
            }
        }
    })

    /*on click event send form to server*/
    $('#user_form').on('submit', function (e) {
        e.preventDefault();
        /*get form input data*/
        const data = Object.fromEntries(new FormData(e.target).entries());

        $('.alert').removeClass('alert-success alert-danger')
        $('.alert-heading').empty();
        $('.message').empty();
        $('small').empty();
        $('#email').removeClass('is-invalid');
        $('#password').removeClass('is-invalid');
        $('#password_confirmation').removeClass('is-invalid');

        $.ajax({
            method: "POST",
            url: "php/main.php",
            data: {data: data},
            success:function (res) {
                /*get server response */
                let result = jQuery.parseJSON(res);

                if(result.status){
                    /*hide user form*/
                    $('#user_form').hide();
                    /*show success information message*/
                    $('.alert').addClass('alert-success').show();
                    $('.alert-heading').append('Успіх!');
                    $('.message').append(result.message);
                    /*show user table*/
                    $('#users_table').show();
                    $('#users_table').DataTable({
                        data: result.users,
                        columns:[
                            {data: 'id'},
                            {data: 'name'},
                            {data: 'email'}
                        ],
                        paging: false,
                    })
                }else{
                    /*show error, if exists email error*/
                    if(result.hasOwnProperty('errors') && result.errors.email){
                        $('#email').after('<small class="form-text text-danger">'+result.errors.email+'</small>');
                        $('#email').addClass('is-invalid');
                    }
                    /*show error, if exists password error*/
                    if(result.hasOwnProperty('errors') && result.errors.password){
                        $('#password').after('<small class="form-text text-danger">'+result.errors.password+'</small>')
                        $('#password').addClass('is-invalid');
                    }
                    /*show error, if exists password_confirmation error*/
                    if(result.hasOwnProperty('errors') && result.errors.password_confirmation){
                        $('#password_confirmation').after('<small class="form-text text-danger">'+result.errors.password_confirmation+'</small>');
                        $('#password_confirmation').addClass('is-invalid');
                    }
                    /*show error information message*/
                    $('.alert').addClass('alert-danger').show();
                    $('.alert-heading').append('Помилка!');
                    $('.message').append(result.message);
                }
            }
        })
    })
})
