$(document).ready(function () {
    var unlocked = window.unlocked
    var baseUrl = $('base').attr('href');
    if (unlocked) {
        switchToEdit()                
    }
    $("button#edit").click(switchToEdit)
    $("button#cancel").click(function () {
        location.href = baseUrl + "account/profile";
    })
    function switchToEdit() {
        $("#details input[type!=hidden]").removeAttr("readonly");
        $("button#cancel").removeAttr("hidden")
        $("button#save").removeAttr("hidden")
        $("button#edit").attr("hidden", "hidden")
    }
})