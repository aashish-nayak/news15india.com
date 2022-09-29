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
                $('#bulkDelete .selectedCount').text(selected.length)
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
        Swal.fire({
            title: 'Are you sure?',
            text: "You Want to Move in Trash Bulk News!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Trash it!'
        }).then((result) => {
            if (result.isConfirmed) {
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
                            if($("#trash").length > 0){
                                $("#trash").removeClass('d-none');
                            }
                        }else{
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message
                            });
                        }
                    }
                });
            }
        })
    });
    if($(document).find('#filter').length > 0){
        $(document).on('click','#filter',function(e){
            e.preventDefault();
            $(document).find('.dt-buttons button.buttons-reload').trigger('click');
        });
    }
});