<script>
    var bannerid = [];
    var bannerlink = [];
    function fetch_data(page) {
        $.ajax({
            url: "{{ route('admin.pages.media') }}" + "?page=" + page,
            success: function(data) {
                $('#media-row').html(data);
                $("#media-row").find(".file").each(function () {
                    if(files.includes($(this).data('id')) == true){
                        $(this).addClass("file-selected");
                    }
                });
            }
        });
    }
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    });
    $(document).on('click', ".file", function() {
        if($(document).find("#insert").length > 0){
            $(this).toggleClass("file-selected");
        }else{
            $(document).find(".file").removeClass("file-selected");
            $(this).toggleClass("file-selected");
        }
    });
    $(document).on("click",'.remove-img',function () {  
        let id = $(this).data('id');
        let index = files.indexOf(id);
        files.splice(index,1);
        let img = $(this).parent().parent().find("img").attr("src");
        let indeximg = filelink.indexOf(img);
        filelink.splice(indeximg,1);
        $("#gallery-data").val(files);
        $(this).parent().parent().parent().remove();
    });
    $("#banner-img").on('click',function() {
        $("#insert").attr('id','insert-banner');
        $("#media-box").modal("show");
        $("#media-box").find('.file').removeClass("file-selected");
        $("#media-box").find('.file').each(function () {
            if(bannerid.includes($(this).data('id')) == true){
                $(this).addClass("file-selected");
            }
        });
    });
    $(document).on('click','#insert-banner',function () {
        let selected = $(document).find(".file-selected");
        let id = $(selected).data('id');
        let img = $(selected).data('path');
        bannerid = [];
        bannerlink = [];
        bannerid.push(id)
        bannerlink.push(img)
        $("#banner_data").val(bannerid[0]);
        $("#banner-img-id").data('id',bannerid[0]);
        $("#banner-preview").attr('src',bannerlink[0]);
        $("#media-box").modal("hide");
    });
    $("#banner-img-id").on("click",function () {
        bannerid = [];
        bannerlink = [];
        $("#banner_data").val('');
        $("#banner-img-id").data('id','');
        $("#banner-preview").attr('src','https://cms.botble.com/vendor/core/core/base/images/placeholder.png');
    });
</script>