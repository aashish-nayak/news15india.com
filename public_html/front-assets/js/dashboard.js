function dateToYears(that, changeInput = "#age") {
    let dob = new Date($(that).val());
    let today = new Date();
    let age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
    $(changeInput).val(age);
}
function reloadPrevent() {
    window.onbeforeunload = function () {
        var r = confirm("Are you sure you want to reload the page.");
        if (r) {
            window.location.reload();
        } else {
            return false;
        }
    };
}
$(function () {
    "use strict";
    $(document).ready(function () {
        $("input[name='is_journalist']").on('change', function () {
            $("#reporter-experience").toggleClass('d-none', $(this).val());
            $("#reporter-experience input[name='organization_name']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
            $("#reporter-experience select[name='organization_type']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
            $("#reporter-experience select[name='designation']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
            $("#reporter-experience input[name='start_journalism']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
        });
        $("input[name='is_personal_office']").on('change', function () {
            $("#reporter-office").toggleClass('d-none', $(this).val());
            $("#reporter-office input[name='office_address']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
            $("#reporter-office input[name='office_tehsil_block']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
            $("#reporter-office select[name='office_country_id']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
            $("#reporter-office select[name='office_state_id']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
            $("#reporter-office select[name='office_city_id']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
            $("#reporter-office input[name='office_zip']").prop('required', (_, attr) => attr == 1 ? 0 : 1);
        });
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong appended.'
            },
            error: {
                'fileSize': 'The file size is too big (2M max).'
            },
        });
        $(document).find("#reporter-form").validate({
            errorElement: "span",
            rules: {
                aadhar_number: {
                    required: true,
                    number: true,
                    minlength: 12,
                    maxlength: 12,
                },
                pan_number: {
                    required: true,
                    alphanumeric: true,
                    minlength: 10,
                    maxlength: 10,
                }
            }
        });
        // Toolbar extra buttons
        var btnFinish = $('<button></button>').attr('type', 'submit').text('Finish').addClass(
            'btn btn-info sw-btn-group-extra d-none');
        $("#reporter-tab").click(function (e) {
            setTimeout(() => {
                $(document).find('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'arrows',
                    transition: {
                        animation: 'slide-horizontal',
                    },
                    toolbarSettings: {
                        toolbarPosition: "top",
                        toolbarExtraButtons: [btnFinish]
                    },
                });
            }, 500);
            reloadPrevent();
        });
        $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
            if ($('button.sw-btn-next').hasClass('disabled')) {
                $('button.sw-btn-next').hide();
                $('.sw-btn-group-extra').removeClass('d-none');
                $("#smartwizard .tab-content").addClass('auto-height');
            } else {
                $('button.sw-btn-next').show();
                $('.sw-btn-group-extra').addClass('d-none');
                $("#smartwizard .tab-content").removeClass('auto-height');
            }
        });
        $("#smartwizard").on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {
            if (!$("#reporter-form").valid()) {
                return false;
            }
        });
        $("#dob").on('change', function (e) {
            dateToYears(this, '#age')
        });
        $("#Start-Journalism").on('change', function (e) {
            dateToYears(this, '#Total-Experience')
        });
    });
});