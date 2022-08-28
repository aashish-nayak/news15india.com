<script>
    function cities(ele, state_id) {
        let url = "{{ Route('cities', ':id') }}";
        url = url.replace(':id', state_id);
        $(ele).html(`<option selected disabled>Loading...</option>`);
        $.ajax({
            type: "GET",
            url: url,
            dataType: "JSON",
            success: function(response) {
                let html = "";
                let editSelected = '';
                if (response.length > 0) {
                    html += `<option selected disabled>Select a City</option>`;
                } else {
                    html += `<option selected disabled>Select State First</option>`;
                }
                $.each(response, function(index, value) {
                    if($(ele).data('edit') != '' && $(ele).data('edit') == value['id']){
                        editSelected = 'selected';
                    }else{
                        editSelected = '';
                    }
                    html += '<option '+editSelected+' value="' + value['id'] + '">' + value['name'] + '</option>';
                });
                $(ele).html(html);
            }
        });
    }

    function states(ele, country_id) {
        let url = "{{ Route('states', ':id') }}";
        url = url.replace(':id', country_id);
        $(ele).html('<option selected disabled>Loading...</option>');
        $.ajax({
            type: "GET",
            url: url,
            dataType: "JSON",
            success: function(response) {
                let html = "";
                let editSelected = '';
                html += `<option selected disabled>Select a State</option>`;
                $.each(response, function(index, value) {
                    if($(ele).data('edit') != '' && $(ele).data('edit') == value['id']){
                        editSelected = 'selected';
                    }else{
                        editSelected = '';
                    }
                    html += '<option '+editSelected+' value="' + value['id'] + '">' + value['name'] + '</option>';
                });
                $(ele).html(html);
                cities("select[name='city']", $("select[name='state']").val());
            }
        });
    }

    function country(ele) {
        $.ajax({
            url: "{{ Route('countries') }}",
            type: "GET",
            dataType: "JSON",
            success: function(response) {
                let html = "";
                $.each(response, function(index, value) {
                    let ok = "";
                    if($(ele).data('edit') != '' && $(ele).data('edit') == value['id']){
                        ok = 'selected';
                    }else if (value['id'] == "101") {
                        ok = "selected";
                    } else {
                        ok = "";
                    }
                    html += '<option ' + ok + ' value="' + value['id'] + '">' + value['name'] +
                        '</option>';
                });
                $(ele).html(html);
                states("select[name='state']", $("select[name='country']").val());
            }
        });
    }

    $(document).ready(function () {
        if($(document).find("select[name='country']").length > 0){
            $(document).find("select[name='country']").html('<option>Select a Country</option>');
            if($(document).find("select[name='country']").data('edit') != ''){
                country("select[name='country']");
            }else{
                $(document).one("click", "select[name='country']", function(e) {
                    country("select[name='country']");
                });
            }
            $(document).on('change', "select[name='country']", function(e) {
                states("select[name='state']", $(this).val());
            });
            $(document).on('change', "select[name='state']", function(e) {
                cities("select[name='city']", $(this).val());
            });
        }
    });
</script>
