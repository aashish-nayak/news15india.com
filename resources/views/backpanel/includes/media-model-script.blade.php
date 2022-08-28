@includeIf('backpanel.media.media-script')
@if(!isset($module_script))
<script>
    $(document).ready(function() {
        function insertImage() {
            let selected = $(document).find("#MediaList .file-selected")[0];
            let id = $(selected).data('id');
            let img = $(selected).data('path');
            $("#bannerId").val(id);
            $("#bannerPreview").attr('src',img);
            $("#media-box").modal("hide");
        }
        $(document).on('click','#insert',insertImage);
        $(document).on('dblclick','.file',function () {
            insertImage();
        });
        $("#removeBanner").on("click",function () {
            $("#bannerId").val('');
            $("#bannerPreview").attr('src','https://cms.botble.com/vendor/core/core/base/images/placeholder.png');
        });
    });
</script>
@endif