$(function () {
    var ajaxOption = {};
    ajaxOption.url = '/menuList';
    ajaxOption.dataType = 'JSON';
    ajaxOption.type = 'GET';
    ajaxOption.success = function (data) {

    }
    ajaxOption.error = function (err) {

    }
    $.ajax(ajaxOption);
});