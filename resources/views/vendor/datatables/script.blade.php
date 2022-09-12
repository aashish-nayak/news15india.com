$(function(){
    var selected = [];
    window.{{ config('datatables-html.namespace', 'LaravelDataTables') }}=window.{{ config('datatables-html.namespace', 'LaravelDataTables') }}||{};window.{{ config('datatables-html.namespace', 'LaravelDataTables') }}["%1$s"]=$("#%1$s").DataTable(%2$s);
    $(document).on('click', "#%1$s td.select-checkbox", function () {
        selected = [];
        $.each($("#%1$s tbody").find('tr.selected'), function (index, element) { 
            var id = $(element).attr('id');
            var index = $.inArray(id, selected);
            if ( index === -1 ) {
                selected.push( id );
            }
        });
        if(selected.length > 0){
            $('#bulkDelete').removeClass('d-none');
            $('#trash').addClass('d-none');
        }else{
            $('#bulkDelete').addClass('d-none');
            $('#trash').removeClass('d-none');
        }
    });
    $(".dt-buttons .buttons-reset").click(function (e) {
        $('.filters').find('input').val('');
        $('.filters').find('select').children().prop('selected',false);
        selected = [];
    });
});