/**
 * Created by Lazaro on 10/08/2015.
 */
var Search = function(form, controller) {
    this.form = form;
    this.controller = controller;
};
$(document).ready(function(){

    var search = new Search($('#ganti-search'), $('#ganti-search').data('target'));
    var base_url = search.form.attr('action');
    var url;

    $('#search').selectmenu({
        width: 200,
        icons: { button: 'ui-icon-circle-triangle-s'}
    });

    $('#datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    });

    $('#search').on("selectmenuselect", function(event, ui) {

        switch(ui.val())
        {
            case 0:
                search.form.find('#search-input').removeClass('.hidden');
                search.form.find('#search-date').addClass('hidden');
                url = base_url + '/' + search.controller + 'getByInvoice';
                search.form.attr('action', url);
        }
    });
});



