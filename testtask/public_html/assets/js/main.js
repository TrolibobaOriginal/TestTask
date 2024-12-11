if(sessionStorage.getItem("access_token") === null){
    document.getElementById("form_block").className += ' invisible';
    document.getElementById("description_block").className += ' invisible';
}else{
    document.getElementById("notice_block").className += ' invisible';
    document.getElementById("token").value = sessionStorage.getItem("access_token");
}

function userTime(){
    document.getElementById("time_check").setAttribute('checked', '');
}

setTimeout(userTime, 30000);

let phoneInput = document.getElementById('phone');
let phoneMask = IMask(phoneInput, {
    mask: '+{7} (000) 000-00-00'
});
let emailInput = document.getElementById('email');
let emailMask = IMask(emailInput, {
    mask: /^\S*@?\S*$/
});