/**
 * Created by Lazaro on 10/08/2015.
 */
var Search = function (form, controller) {
    this.form = form;
    this.controller = controller;
};
$(document).ready(function () {

    var search = new Search($('#ganti-search'), $('#ganti-search').data('target'));
    var base_url = search.form.attr('action');
    var url;

    var select_search = $('#search').selectmenu({
        width: 200,
        icons: {button: 'ui-icon-circle-triangle-s'},
        create: function(event, ui) {
            search.form.find('#term').attr('disabled', true);
            search.form.find('#term').attr('placeholder', 'seleccione');
            search.form.find('#search-input').removeClass('hidden');
            search.form.find('#search-date').addClass('hidden');
            search.form.attr('action', '#');
        }
    });

    $('#datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    });

    select_search.on("selectmenuselect", function (event, ui) {

        switch (select_search.val()) {
            case 'null':
                search.form.find('#term').attr('disabled', true);
                search.form.find('#term').attr('placeholder', 'seleccione');
                search.form.find('#search-input').removeClass('hidden');
                search.form.find('#search-date').addClass('hidden');
                search.form.attr('action', '#');
                break;

            case 'fetchByInvoice':
                search.form.find('#search-input').removeClass('hidden');
                search.form.find('#term').attr('disabled', false);
                search.form.find('#term').attr('placeholder', '# Factura');
                search.form.find('#search-date').addClass('hidden');
                search.form.find('#datepicker').attr('disabled', true);
                url = base_url + search.controller + '/' +select_search.val();
                search.form.attr('action', url);
                break;

            case 'fetchByCard':
                search.form.find('#search-input').removeClass('hidden');
                search.form.find('#term').attr('disabled', false);
                search.form.find('#term').attr('placeholder', '4 digitos');
                search.form.find('#search-date').addClass('hidden');
                search.form.find('#datepicker').attr('disabled', true);
                url = base_url + search.controller + '/' +select_search.val();
                search.form.attr('action', url);
                break;

            case 'fetchByDate':
                search.form.find('#search-date').removeClass('hidden');
                search.form.find('#datepicker').attr('disabled', false);
                search.form.find('#datepicker').attr('placeholder', 'Fecha');
                search.form.find('#search-input').addClass('hidden');
                search.form.find('#term').attr('disabled', true);
                url = base_url + search.controller + '/' +select_search.val();
                search.form.attr('action', url);
                break;
        }
    });
});



