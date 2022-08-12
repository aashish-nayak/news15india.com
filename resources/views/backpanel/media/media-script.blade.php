<script type="text/x-custom-template" id="loader">
    <div class="loading-wrapper">
        <div class="showbox">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
                </svg>
            </div>
        </div>
    </div>
</script>
<script>
    function copy() {
        var copyText = document.getElementById("input-path");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        $('#copied-success').fadeIn(800);
        $('#copied-success').fadeOut(800);
    }
    $(document).ready(function() {   
        var lastChecked = null; 
        function sidebarState(that = '') {
            let name = (that != '') ? $(that).data('name') : 'File';
            let dimen = (that != '') ? $(that).data('dimen') : 'Alt Name';
            let size = (that != '') ? $(that).data('size') : '100x100';
            let type = (that != '') ? $(that).data('type') : 'File Type';
            let createdby = (that != '') ? $(that).data('createdby') : 'Admin';
            let createdat = (that != '') ? $(that).data('createdat') : '00 00 0000';
            let updatedat = (that != '') ? $(that).data('updatedat') : '00 00 0000';
            let alt = (that != '') ? $(that).data('alt') : '';
            let path = (that != '') ? $(that).data('path') : '';
            let sidebarPreview = '';
            if(type.indexOf('image/') != -1) {
                sidebarPreview = '<img src="'+$(that).data('path')+'" alt="'+alt+'" class="img-fluid">';
            } else if(type.indexOf('application/') != -1) {
                sidebarPreview = '<i class="bx bx-file" style="font-size:80px"></i>';
            }else if(type.indexOf('audio/') != -1) {
                sidebarPreview = '<i class="bx bx-volume-full" style="font-size:80px"></i>';
            }else if(type.indexOf('video/') != -1) {
                sidebarPreview = '<i class="bx bx-film" style="font-size:80px"></i>';
            }else{
                sidebarPreview =  '<img src="'+$("#SideBarImage").data('placeholder-image')+'" class="img-fluid">';
            }
            $("#SideBarImage").html(sidebarPreview);
            $("#SideBarName").html(name);
            $("#SideBarDimension").html(dimen);
            $("#SideBarSize").html(size);
            $("#SideBarType").html(type);
            $("#SideBarCreatedBy").html(createdby);
            $("#SideBarCreated").html(createdat);
            $("#SideBarUpdated").html(updatedat);
            $("#SideBarAlt").html(alt);
            $("#input-path").val(path);
        }
        function ajaxMediaLoader(loaderStart = true) {
            if(loaderStart == true){
                $('.media-main').addClass('on-loading bb-loading');
                $('.media-main').append($('#loader').html());
            }else{
                $('.media-main').removeClass('on-loading bb-loading');
                $(document).find('.media-main .loading-wrapper').remove();
            }
        }
        function fetch_data(params = {}) {
            if(localStorage.getItem('view') == null){
                localStorage.setItem('view', 'grid');
            }
            if(localStorage.getItem('filter') == null){
                localStorage.setItem('filter', 'all');
            }
            if(localStorage.getItem('sort') == null){
                localStorage.setItem('sort', 'created_at,desc');
            }
            let skip = (params.skip !== undefined) ? params.skip : 0,
            loadType = (params.loadType !== undefined) ? params.loadType : 'refresh',
            filter = localStorage.getItem('filter'),
            sort = localStorage.getItem('sort'),
            view = localStorage.getItem('view');

            $(".file-view[data-view='"+view+"']").addClass('active');
            $(".filter[data-filter='"+filter+"']").addClass('active');
            $("#filter").html($(".filter[data-filter='"+filter+"']").html());
            $(".sort[data-sort='"+sort+"']").addClass('active');

            let requestData = {
                "_token": "{{ csrf_token() }}",
                skip : skip,
                view : view,
                filter : filter,
                sort : sort
            };
            $.ajax({
                url: "{{ route('admin.media.fetch') }}",
                type: 'POST',
                data : requestData,
                beforeSend: function() {
                    ajaxMediaLoader();
                },
                success: function(response) {
                    ajaxMediaLoader(false);
                    sidebarState();
                    if(loadType == 'loadmore'){
                        $('#MediaList').append(response);
                    }else{
                        $('#MediaList').html(response);
                    }
                    
                    let loaded = $('#MediaList').find('.file').length;
                    $("#loadedItems").text(loaded);
                    $("#totalItems").text($(document).find("#loadMoreBtn").data('total'));
                    let gap = (localStorage.getItem('view') == 'grid') ? 'g-2' : '';
                    $('#MediaList').removeClass('g-2');
                    $('#MediaList').addClass(gap);
                }
            });
        }
        function countChecked(){
            let selected = $(document).find(".file .checkbox:checked").length;
            $("#selectedFiles").text((selected > 1) ? selected : '');
            return selected;
        }
        function checkedIds(){
            let allCheckedBox = $(document).find(".file .checkbox:checked");
            let ids = [];
            allCheckedBox.each(function(index, el) {
                ids.push($(el).val());
            });
            return ids;
        }
        function setFileSelectedClass() {
            $(document).find(".file").removeClass("file-selected");
            $(document).find(".file input[type='checkbox']:checked").closest('.file').addClass("file-selected");
        }
        fetch_data();
        $(".file-view").on('click',function () {
            localStorage.setItem('view',$(this).data('view'));
            $(".file-view").removeClass('active');
            $(this).addClass('active');
            fetch_data();
            lastChecked = null;
            $(document).find(".file input[type='checkbox']").prop('checked',false);
            countChecked();
        });
        $(".filter").on('click',function () {
            localStorage.setItem('filter',$(this).data('filter'));
            $(".filter").removeClass('active');
            $(this).addClass('active');
            fetch_data();
            lastChecked = null;
            $(document).find(".file input[type='checkbox']").prop('checked',false);
            countChecked();
        });
        $(".sort").on('click',function () {
            localStorage.setItem('sort',$(this).data('sort'));
            $(".sort").removeClass('active');
            $(this).addClass('active');
            fetch_data();
            lastChecked = null;
            $(document).find(".file input[type='checkbox']").prop('checked',false);
            countChecked();
        });
        $(".action-moveToTrash").click(function () {
            let Ids = checkedIds();
            Swal.fire({
                title: 'Are you sure?',
                text: "You Want to Bulk Delete Files!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{route('admin.media.delete')}}";
                    let data = {
                        "_token": "{{ csrf_token() }}",
                        ids: Ids
                    };
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: data,
                        beforeSend: function() {
                            ajaxMediaLoader();
                        },
                        success: function(response) {
                            ajaxMediaLoader(false);
                            if(response.status == 'success'){
                                fetch_data();
                                Swal.fire(
                                    'Successful!',
                                    response.message,
                                    'success'
                                );
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message,
                                })
                            }
                        }
                    });
                }
            })

        });
        $(".action-preview").click(function () {
            let gallary = [];
            $.each($(document).find('.file.file-selected'), function (key, value) { 
                gallary.push({
                    src  : $(value).data('path'),
                });
            });
            $.fancybox.open(gallary,{
                toolbar: "auto",
                defaultType: "image",
                arrows: true,
                buttons : [
                    'zoom',
                    'fullScreen',
                    "slideShow",
                    'download',
                    'close',
                ]
            });
        });
        $(".action-copy").click(function () {
            let links = '',
            elements = $(document).find('.file.file-selected');
            $.each(elements, function (key, value) {
                let prefix = (key !== (elements.length -1 )) ? ', \n' : '';
                links += $(value).data('path')+prefix;
            });
            var inp = document.createElement('input');
            document.body.appendChild(inp);
            inp.value = links;
            inp.select();
            inp.setSelectionRange(0, 99999);
            document.execCommand("copy");
            $('#copied-success').fadeIn(800);
            $('#copied-success').fadeOut(800);
        });
        $(".action-download").click(function () {
            elements = $(document).find('.file.file-selected');
            $.each(elements, function (key, value) {
                var a = $("<a>")
                    .attr("href", $(value).data('path'))
                    .attr("download", $(value).data('name'))
                    .appendTo("body");
    
                a[0].click();
                a.remove();
            });
        });
        $(".action-rename").click(function () {
            elements = $(document).find('.file.file-selected');
            let inputs = '';
            $.each(elements, function (key, value) {
                inputs += `<input type="text" required name="filename[${$(value).data('id')}]" value="${$(value).data('name')}" class="form-control form-control-sm mb-3 rounded-0" placeholder="Rename here">`;
            });
            $("#renameInputsWrapper").html(inputs);
            $("#renameModal").modal("show");
        });
        $("#refreshMedia").on('click',function () {
            fetch_data();
        });
        $("#renameForm").submit(function (e) {
            e.preventDefault();
            $("#renameFormSubmit").prop("disabled",true);
            let form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: "POST",
                data: form.serialize(),
                dataType: "json",
                success: function(response) {
                    $("#renameFormSubmit").prop("disabled",false);
                    $("#renameModal").modal("hide");
                    if (response.status == "success") {
                        fetch_data(1);
                        Swal.fire(
                            'Successful!',
                            response.message,
                            'success'
                        );
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error !',
                            text: response.message,
                        })
                    }
                }
            });
        });
        $("#downloadForm").submit(function (e) {
            e.preventDefault();
            let form = $(this);
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: form.serialize(),
                dataType: "json",
                beforeSend: function() {
                    ajaxMediaLoader();
                    $("#downloadFormSubmit").prop("disabled",true);
                    $("#downloadFormSubmit").html(`<span class="spinner-border spinner-border-sm"></span> Downloading`);
                },
                success: function(response) {
                    $("#downloadModal").modal("hide");
                    $("#downloadForm").trigger("reset");
                    $("#downloadFormSubmit").prop("disabled",false);
                    $("#downloadFormSubmit").html(`Download`);
                    ajaxMediaLoader(false);
                    if (response.status == "success") {
                        fetch_data(1);
                        Swal.fire(
                            'Successful!',
                            response.message,
                            'success'
                        );
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error !',
                            text: response.message,
                        })
                    }
                }
            });
        });
        $(".downloadModalClose").click(()=>{
            $("#downloadModal").modal('hide');
            $("#downloadModal").removeClass('show');
        });
        $(".renameModalClose").click(()=>{
            $("#renameModal").modal('hide');
            $("#renameModal").removeClass('show');
        });
        $("#uploadBtn").click(()=>$("#uploader").trigger('click'));
        $("#uploader").change(()=>$("#upload-form").trigger('submit'));
        $("#upload-form").on('submit',function (e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false,
                beforeSend: function() {
                    ajaxMediaLoader();
                    $("#uploader").prop("disabled",true);
                },
                success: function(response) {
                    ajaxMediaLoader(false);
                    $("#uploader").prop("disabled",false);
                    if(response.status == 'success'){
                        fetch_data();
                        Swal.fire(
                            'Successful!',
                            response.message,
                            'success'
                        );
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                        })
                    }
                }
            });
        });
        $(document).on('click',"#loadMoreBtn",function () {
            let skip = $(this).data("skip");
            fetch_data({
                skip : skip,
                loadType : 'loadmore'
            });
            $(this).closest('.loadmore-wrapper').remove();
        });
        $(document).on('click', ".file", function(e) {
            let thisCheckBoxElement = $(document).find(".file input[value="+$(this).data('id')+"]");
            let allCheckBoxElements = $(document).find(".file input[type='checkbox']");
            if(!lastChecked) {
                lastChecked = thisCheckBoxElement;
                return;
            }
            if(e.ctrlKey){
                thisCheckBoxElement.prop('checked',!$(thisCheckBoxElement).is(':checked'));
            }else if(e.shiftKey){
                var from = allCheckBoxElements.index(thisCheckBoxElement);
                var to = allCheckBoxElements.index(lastChecked);
                var start = Math.min(from, to);
                var end = Math.max(from, to) + 1;

                allCheckBoxElements.slice(start, end)
                    .filter(':not(:disabled)')
                    .prop('checked', true);
            }else{
                allCheckBoxElements.prop('checked',false);
                thisCheckBoxElement.prop('checked',true);
            }
            lastChecked = thisCheckBoxElement;
            setFileSelectedClass();
            countChecked();
            sidebarState(this);
        });
    });
</script>