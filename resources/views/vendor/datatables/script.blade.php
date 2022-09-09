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
    $(document).on('click','#bulkDelete',function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        let model = $(this).data('model');
        let $this = $(this);
        $.ajax({
            type: "POST",
            url: url,
            data: {
                "_token" : "{{ csrf_token() }}",
                "model" : model,
                "ids" : selected,
            },
            dataType: "json",
            success: function (response) {
                if(response.status == 'success'){
                    Swal.fire(
                        'Successful!',
                        response.message,
                        'success'
                    );
                    $(document).find('.buttons-reload').trigger('click');
                    $this.addClass('d-none');
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
            }
        });
    });
});