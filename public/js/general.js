
function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }
    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function checkNum(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron= /^([0-9]+\.?[0-9]{0,2})$/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function filterFloat(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{
            return true;
        }
    }else{
        if(key == 8 || key == 13 || key == 0) {
            return true;
        }else if(key == 46){
            if(filter(tempValue)=== false){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
}
function filter(__val__){
    var preg = /^([0-9]+\.?[0-9]{0,2})$/;
    if(preg.test(__val__) === true){
        return true;
    }else{
        return false;
    }

}
function check_digit(e,obj,intsize,deczize) {
    var keycode;

    if (window.event) keycode = window.event.keyCode;
    else if (e) { keycode = e.which; }
    else { return true; }

    var fieldval= (obj.value),
        dots = fieldval.split(".").length;

    if(keycode == 46) {
        return dots <= 1;
    }
    if(keycode == 8 || keycode == 9 || keycode == 46 || keycode == 13 ) {
        // back space, tab, delete, enter
        return true;
    }
    if((keycode>=32 && keycode <=45) || keycode==47 || (keycode>=58 && keycode<=127)) {
        return false;
    }
    if(fieldval == "0" && keycode == 48 ) {
        return false;
    }
    if(fieldval.indexOf(".") != -1) {
        if(keycode == 46) {
            return false;
        }
        var splitfield = fieldval.split(".");
        if(splitfield[1].length >= deczize && keycode != 8 && keycode != 0 )
            return false;
    }else if(fieldval.length >= intsize && keycode != 46) {
        return false;
    }else {
        return true;
    }
}
const SwalModal = (icon, title, html) => {
    Swal.fire({
        icon,
        title,
        html
    })
}

const SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback) => {
    Swal.fire({
        icon,
        title,
        html,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText,
        reverseButtons: true,
    }).then(result => {
        if (result.value) {
            return livewire.emit(method, params)
        }

        if (callback) {
            return livewire.emit(callback)
        }
    })
}

const SwalAlert = (icon, title, timeout = 7000) => {
    const Toast = Swal.mixin({
        showConfirmButton: false,
        timer: timeout,
        didOpen: toast => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon,
        title
    })
}
$(document).ready(function() {


});
document.addEventListener('DOMContentLoaded', () => {

    this.livewire.on('swal:modal', data => {
        SwalModal(data.icon, data.title, data.text)
    })

    this.livewire.on('swal:confirm', data => {
        SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data.params, data.callback)
    })

    this.livewire.on('swal:alert', data => {
        SwalAlert(data.icon, data.title, data.timeout)
    })

    this.livewire.on('swal:list', data => {
        sweetAlertList(data)
    })
})

