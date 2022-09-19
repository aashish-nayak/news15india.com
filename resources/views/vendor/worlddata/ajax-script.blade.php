<script>
    var countryEle = `select[name='country']`;
    var stateEle = `select[name='state']`;
    var cityEle = `select[name='city']`;
    var countryEleId = `select[name='country_id']`;
    var stateEleId = `select[name='state_id']`;
    var cityEleId = `select[name='city_id']`;
    var countryEleOffice = `select[name='office_country_id']`;
    var stateEleOffice = `select[name='office_state_id']`;
    var cityEleOffice = `select[name='office_city_id']`;
    
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

    function states(ele, country_id,city="select[name='city']") {
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
                cities(city, $(ele).val());
            }
        });
    }

    function country(ele,state = "select[name='state']") {
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
                    html += '<option ' + ok + ' value="' + value['id'] + '">' + value['name'] + '</option>';
                });
                $(ele).html(html);
                states(state, $(ele).val());
            }
        });
    }

    $(document).ready(function () {
        if($(document).find(countryEle).length > 0){
            $(document).find(countryEle).html('<option>Select a Country</option>');
            if($(document).find(countryEle).data('edit') != ''){
                country(countryEle,stateEle);
            }else{
                $(document).one("click", countryEle, function(e) {
                    country(countryEle,stateEle);
                });
            }
            $(document).on('change', countryEle, function(e) {
                states(stateEle, $(this).val(),cityEle);
            });
            $(document).on('change', stateEle, function(e) {
                cities(cityEle, $(this).val());
            });
        }
        if($(document).find(countryEleId).length > 0){
            $(document).find(countryEleId).html('<option>Select a Country</option>');
            if($(document).find(countryEleId).data('edit') != ''){
                country(countryEleId,stateEleId);
            }else{
                $(document).one("click", countryEleId, function(e) {
                    country(countryEleId,stateEleId);
                });
            }
            $(document).on('change', countryEleId, function(e) {
                states(stateEleId, $(this).val(),cityEleId);
            });
            $(document).on('change', stateEleId, function(e) {
                cities(cityEleId, $(this).val());
            });
        }
        if($(document).find(countryEleOffice).length > 0){
            $(document).find(countryEleOffice).html('<option>Select a Country</option>');
            if($(document).find(countryEleOffice).data('edit') != ''){
                country(countryEleOffice,stateEleOffice);
            }else{
                $(document).one("click", countryEleOffice, function(e) {
                    country(countryEleOffice,stateEleOffice);
                });
            }
            $(document).on('change', countryEleOffice, function(e) {
                states(stateEleOffice, $(this).val(),cityEleOffice);
            });
            $(document).on('change', stateEleOffice, function(e) {
                cities(cityEleOffice, $(this).val());
            });
        }
    });
</script>
