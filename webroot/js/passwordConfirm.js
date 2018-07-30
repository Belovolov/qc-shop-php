$(document).ready(function() {
    $("select[name=PhoneType]").selectmenu({
        change: function (event, data) {
            let pi = $('input#phonenumber')
            switch ($(this).val()) {
                case "work":
                    pi.attr('placeholder','Work number');
                    pi.attr('name','WorkNumber')
                    break;
                case "home":
                    pi.attr('placeholder','Home number');
                    pi.attr('name','HomeNumber')
                    break;
                case "mobile": default:
                    pi.attr('placeholder','Mobile number');
                    pi.attr('name','MobileNumber')
                    break;
            }
        }

    })
    
    $('input[name=PasswordHash]').keyup(checkMatch)
    $('input[name=PasswordConfirm]').focus(checkMatch)
    $('input[name=PasswordConfirm]').keyup(checkMatch)   
})
function checkMatch(e) {
    let password = $('input[name=PasswordHash]').val();
    let conf_input =  $('input[name=PasswordConfirm]')
    if ($(conf_input).val()==password) {
        $(conf_input).css('background-color','#cbf2cb');
    }
    else {
        $(conf_input).css('background-color','#f7d2d2');
    }
} 