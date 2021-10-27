/**
 * Created by orlandolacerda on 08/07/15.
 */
//AJAX CORE
//


$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};


function appAjax(_method, _url, _data, _callbackSuccess, _callbackError){

    let _dataProcess = {};

    if(_method !== 'get') {
        _dataProcess._token = $('[name=_token]').val();
    }

    _dataProcess = $.extend(_data, _dataProcess);
    // console.log(_dataProcess);

    $.ajaxSetup({
        headers: {
            'Cookie': `${getCookie('XSRF-TOKEN')}; laravel_session=${getCookie('laravel_session')}`,
        }
    });

    return $.ajax({
        method: _method,
        url: 'http://127.0.0.1:8000' + _url,
        data: _dataProcess,
        // async: false,
        // success: _callbackSuccess,
        // error: _callbackError
    }).done(_callbackSuccess).fail(function (error) {
        if(error.statusText === 'Unauthorized') {
            window.location = '/login'
        }

        if (typeof _callbackError == 'function') {
            _callbackError(error);
        }
    });
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

//#get
function appGet(_url, _data, _callbackSuccess, _callbackError){
    return appAjax('GET', _url, _data, _callbackSuccess, _callbackError);
}

//#post
function appPost(_url, _data, _callbackSuccess, _callbackError){
    return appAjax('POST', _url, _data, _callbackSuccess, _callbackError);
}
//#put
function appPut(_url, _data, _callbackSuccess, _callbackError){
    return appAjax('PUT', _url, _data, _callbackSuccess, _callbackError);
}
//#delete
function appDelete(_url, _data, _callbackSuccess, _callbackError){
    return appAjax('DELETE', _url, _data, _callbackSuccess, _callbackError);
}
//#options
function appOptions(_url, _data, _callbackSuccess, _callbackError){
    return appAjax('OPTIONS', _url, _data, _callbackSuccess, _callbackError);
}
//#options
function appPatch(_url, _data, _callbackSuccess, _callbackError){
    return appAjax('PATCH', _url, _data, _callbackSuccess, _callbackError);
}


//INCLUDE JS
function jsView(file){
    file = file.replace('.', '/');
    $('head').append('<script type="text/javascript" src="/www/assets/js/Core/views/'+ file +'.js"></script>');
}