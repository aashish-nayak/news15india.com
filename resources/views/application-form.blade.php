<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ setting('site_favicon') }}" type="image/png" />
    <!-- Meta Data  -->
    <link rel="stylesheet" href="{{ asset('front-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="{{ asset('front-assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/smart-wizard/css/smart_wizard_all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/dropify/css/dropify.css') }}" />
    @meta([
        'title' => 'Reporter Application Form - ' . setting('site_name'),
        'keywords' => setting('site_meta_keyword'),
        'description' => setting('site_meta_description'),
        'image' => setting('site_logo'),
        'type' => 'Form',
        'author' => setting('site_name'),
    ])
    <style>
        body {
            font-size: 16px;
            background-color: rgb(243 244 246 /1);
        }

        .form-control {
            font-size: 16px;
        }

        .btn {
            font-size: 16px;
        }

        .auto-height {
            height: auto !important;
        }

        span.text-danger {
            font-size: 20px
        }

        .dropify-wrapper:has(input[name='avatar']) {
            margin-top: 30px;
        }

        .sw-btn-group-extra,
        .sw-btn-prev,
        .sw-btn-next {
            background-color: #00a100 !important;
            border-color: #00a100 !important;
            font-weight: 600 !important;
            padding: 4px 10px !important;
        }

        .sw-btn-prev,
        .sw-btn-next {
            background-color: #0067d4 !important;
            border-color: #0067d4 !important;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center align-items-start" style="height: 100vh">
            <div class="col-12">
                <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                @includeIf('components.appform-wizard')
            </div>
        </div>
    </div>

    <script src="{{ asset('front-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script src="{{ asset('assets/plugins/smart-wizard/js/jquery.smartWizard.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropify/js/dropify.js') }}"></script>
    @includeIf('vendor.worlddata.ajax-script')
    <script>
        function dateToYears(that, changeInput = "#age") {
            let dob = new Date($(that).val());
            let today = new Date();
            let age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
            $(changeInput).val(age);
        }
        window.onbeforeunload = function() {
            var r = confirm("Are you sure you want to reload the page.");
            if (!r) {
                return false;
            }
        };
        $(function() {
            "use strict";
            $(document).ready(function() {
                $("input[name='is_journalist']").on('change', function() {
                    $("#reporter-experience").toggleClass('d-none', $(this).val());
                    $("#reporter-experience input[name='organization_name']").prop('required', (_,
                        attr) => attr == 1 ? 0 : 1);
                    $("#reporter-experience select[name='organization_type']").prop('required', (_,
                        attr) => attr == 1 ? 0 : 1);
                    $("#reporter-experience select[name='designation']").prop('required', (_,
                        attr) => attr == 1 ? 0 : 1);
                    $("#reporter-experience input[name='start_journalism']").prop('required', (_,
                        attr) => attr == 1 ? 0 : 1);
                });
                $("input[name='is_personal_office']").on('change', function() {
                    $("#reporter-office").toggleClass('d-none', $(this).val());
                    $("#reporter-office input[name='office_address']").prop('required', (_, attr) =>
                        attr == 1 ? 0 : 1);
                    $("#reporter-office input[name='office_tehsil_block']").prop('required', (_,
                        attr) => attr == 1 ? 0 : 1);
                    $("#reporter-office select[name='office_country_id']").prop('required', (_,
                        attr) => attr == 1 ? 0 : 1);
                    $("#reporter-office select[name='office_state_id']").prop('required', (_,
                        attr) => attr == 1 ? 0 : 1);
                    $("#reporter-office select[name='office_city_id']").prop('required', (_,
                        attr) => attr == 1 ? 0 : 1);
                    $("#reporter-office input[name='office_zip']").prop('required', (_, attr) =>
                        attr == 1 ? 0 : 1);
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
                // Toolbar extra buttons
                var btnFinish = $('<button></button>').attr('type', 'submit').html('<i class="fa fa-save"></i> Finish').addClass('btn sw-btn-group-extra d-none');
                $('#smartwizard').smartWizard({
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
                $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
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
                $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
                    if (!$("#reporter-form").valid()) {
                        return false;
                    }
                });
                $("#dob").on('change', function(e) {
                    dateToYears(this, '#age');
                });
                $("#Start-Journalism").on('change', function(e) {
                    dateToYears(this, '#Total-Experience');
                });
            });
        });
    </script>
</body>

</html>
