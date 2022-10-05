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
        $(ele).html(`<option disabled>Loading...</option>`);
        $.ajax({
            type: "GET",
            url: url,
            dataType: "JSON",
            success: function(response) {
                let html = "";
                let editSelected = '';
                if (response.length > 0) {
                    html += `<option disabled>Select a City</option>`;
                } else {
                    html += `<option disabled>Select State First</option>`;
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
                $(ele).trigger('change');
            }
        });
    }

    function states(ele, country_id) {
        let url = "{{ Route('states', ':id') }}";
        url = url.replace(':id', country_id);
        $(ele).html('<option disabled>Loading...</option>');
        $.ajax({
            type: "GET",
            url: url,
            dataType: "JSON",
            success: function(response) {
                let html = "";
                let editSelected = '';
                html += `<option disabled>Select a State</option>`;
                $.each(response, function(index, value) {
                    if($(ele).data('edit') != '' && $(ele).data('edit') == value['id']){
                        editSelected = 'selected';
                    }else{
                        editSelected = '';
                    }
                    html += '<option '+editSelected+' value="' + value['id'] + '">' + value['name'] + '</option>';
                });
                $(ele).html(html);
                $(ele).trigger('change');
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
                    html += '<option ' + ok + ' value="' + value['id'] + '">' + value['name'] + '</option>';
                });
                $(ele).html(html);
                $(ele).trigger('change');
            }
        });
    }

    $(document).ready(function () {
        if($(document).find(countryEle).length > 0){
            $(document).find(countryEle).html('<option>Select a Country</option>');
            if($(document).find(countryEle).data('edit') != ''){
                country(countryEle);
            }else{
                $(document).one("click", countryEle, function(e) {
                    country(countryEle);
                });
            }
            $(document).on('change', countryEle, function(e) {
                states(stateEle, $(this).val());
            });
            $(document).on('change', stateEle, function(e) {
                cities(cityEle, $(this).val());
            });
        }
        if($(document).find(countryEleId).length > 0){
            $(document).find(countryEleId).html('<option>Select a Country</option>');
            if($(document).find(countryEleId).data('edit') != ''){
                country(countryEleId);
            }else{
                $(document).one("click", countryEleId, function(e) {
                    country(countryEleId);
                });
            }
            $(document).on('change', countryEleId, function(e) {
                states(stateEleId, $(this).val());
            });
            $(document).on('change', stateEleId, function(e) {
                cities(cityEleId, $(this).val());
            });
        }
        if($(document).find(countryEleOffice).length > 0){
            $(document).find(countryEleOffice).html('<option>Select a Country</option>');
            if($(document).find(countryEleOffice).data('edit') != ''){
                country(countryEleOffice);
            }else{
                $(document).one("click", countryEleOffice, function(e) {
                    country(countryEleOffice);
                });
            }
            $(document).on('change', countryEleOffice, function(e) {
                states(stateEleOffice, $(this).val());
            });
            $(document).on('change', stateEleOffice, function(e) {
                cities(cityEleOffice, $(this).val());
            });
        }
    });
</script>
