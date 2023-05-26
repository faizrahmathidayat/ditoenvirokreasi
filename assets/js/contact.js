$(document).ready(function(){
    
    (function($) {
        "use strict";

    
    jQuery.validator.addMethod('answercheck', function (value, element) {
        return this.optional(element) || /^\bcat\b$/.test(value)
    }, "type the correct answer -_-");

    // validate contactForm form
    $(function() {
        $('#contactForm').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 2
                },
                subject: {
                    required: true,
                    minlength: 4
                },
                number: {
                    required: true,
                    minlength: 5
                },
                email: {
                    required: true,
                    email: true
                },
                message: {
                    required: true,
                    minlength: 20
                },
                bidang_usaha: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "<span style='color:red'>name is required</span>",
                    minlength: "your name must consist of at least 2 characters"
                },
                subject: {
                    required: "<span style='color:red'>subject is required</span>",
                    minlength: "your subject must consist of at least 4 characters"
                },
                number: {
                    required: "<span style='color:red'>number is required</span>",
                    minlength: "your Number must consist of at least 5 characters"
                },
                email: {
                    required: "<span style='color:red'>email is required</span>"
                },
                message: {
                    required: "<span style='color:red'>message is required</span>",
                    minlength: "thats all? really?"
                },
                bidang_usaha: {
                    required: "<span style='color:red'>Bidang Usaha is required</span>"
                }
            },
            submitHandler: function(form) {
                $(form).ajaxSubmit({
                    type:"POST",
                    data: $(form).serialize(),
                    url:"post_message",
                    success: function(response) {
                        if(response == 'true') {
                            $('#alert_pesan').removeClass('alert-danger');
                            $('#alert_pesan').addClass('alert-success');
                            $('#alert_pesan').html('Pesan berhasil dikrim.');
                            $('#alert_pesan').prop('hidden', false);
                        } else {
                            $('#alert_pesan').removeClass('alert-success');
                            $('#alert_pesan').addClass('alert-danger');
                            $('#alert_pesan').html('Pesan Gagal dikrim.');
                            $('#alert_pesan').prop('hidden', false);
                        }
                    },
                    error: function() {
                        $('#contactForm').fadeTo( "slow", 1, function() {
                            $('#error').fadeIn()
                            $('.modal').modal('hide');
		                	$('#error').modal('show');
                        })
                    }
                })
            }
        })
    })
        
 })(jQuery)
})