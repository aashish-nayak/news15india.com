<script>
    $(document).ready(function () {
        $(document).on('click',".status",function () {
            var element = $(this);
            var id = $(this).val();
            var url = $(this).data('url');
            $.ajax({
                type: "GET",
                url: url,
                beforeSend: function() {
                    $(element).prop('disabled',true);
                },
                success: function(response) {
                    $(element).prop('disabled',false);
                    if(response.success){
                        if(response.status == 1){
                            $(element).next().text('Active');
                        }else{
                            $(element).next().text('Inactive');
                        }
                    }
                }
            });
        });
        $(document).on("click",".delete",function (e) {
            var url = $(this).attr("href");
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "{{$deleteMessage}}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{$deleteConfirmMessage}}",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
</script>