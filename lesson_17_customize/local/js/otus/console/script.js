console.log('Hi, from Otus.');

let OtusJsExt = BX.namespace('OtusJsExt');

OtusJsExt.helloWorld = function(mess = BX.message('OTUSJSEXT_HELLO_WORLD')) {
    alert(mess);
};
