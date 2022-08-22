<script>
    function country(ele) {
        $.ajax({
            type: "GET",
            url: "{{ route('countries') }}",
            dataType: "JSON",
            success: function(response) {
                if (response.countries.length > 0) {
                    let options = '<option disabled>Select a Country</option>';;
                    $.each(response.countries, function(index, value) {
                        let select = '';
                        if (value.id == 101){
                            select = 'selected';
                        }else{
                            select = '';
                        }
                        options += `<option ${select} value="${value.id}">${value.name}</option>`;
                    });
                    $(ele).html(options);
                    states("select[name='state']", $("select[name='country']").val());
                }
            }
        });
    }

    function states(ele, country_id) {
        let url = "{{ route('states', ':country') }}";
        url = url.replace(':country', country_id);
        $.ajax({
            type: "GET",
            url: url,
            dataType: "JSON",
            success: function(response) {
                if (response.states.length > 0) {
                    let options = '<option disabled>Select a State</option>';;
                    $.each(response.states, function(index, value) {
                        options += `<option value="${value.id}">${value.name}</option>`;
                    });
                    $(ele).html(options);
                    cities("select[name='city']", $("select[name='state']").val());
                }
            }
        });
    }

    function cities(ele, state_id) {
        let url = "{{ route('cities', ':state') }}";
        url = url.replace(':state', state_id);
        $.ajax({
            type: "GET",
            url: url,
            dataType: "JSON",
            success: function(response) {
                if (response.cities.length > 0) {
                    let options = '<option disabled>Select a City</option>';
                    $.each(response.cities, function(index, value) {
                        options += `<option value="${value.id}">${value.name}</option>`;
                    });
                    $(ele).html(options);
                }
            }
        });
    }

    $(document).ready(function() {
        if($(document).find("select[name='country']").length > 0){
            country("select[name='country']");
            $(document).on('change', "select[name='country']", function(e) {
                states("select[name='state']", $(this).val());
            });
            $(document).on('change', "select[name='state']", function(e) {
                cities("select[name='city']", $(this).val());
            });
        }
    });
</script>