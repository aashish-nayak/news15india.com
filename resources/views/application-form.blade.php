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
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh">
            <div class="col-12">
                @includeIf('components.appform-wizard')
            </div>
        </div>
    </div>

    <script src="{{ asset('front-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/smart-wizard/js/jquery.smartWizard.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/dropify/js/dropify.js') }}"></script>
    @includeIf('vendor.worlddata.ajax-script')
    <script>
        $(function() {
            "use strict";
            $(document).ready(function() {
                $("input[name='is_journalism']").on('change',function () {
                    $("#reporter-experience").toggleClass('invisible', $(this).val());
                });
                $("input[name='is_office']").on('change',function () {
                    $("#reporter-office").toggleClass('invisible', $(this).val());
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
                var btnFinish = $('<button></button>').attr('type', 'submit').text('Finish').addClass(
                    'btn btn-info sw-btn-group-extra d-none').on('click', function() {
                    alert('Finish Clicked');
                });
                $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'arrows',
                    transition: {
                        animation: 'slide-horizontal',
                    },
                    toolbarSettings: {
                        toolbarPosition: "bottom",
                        toolbarExtraButtons: [btnFinish]
                    },
                });
                $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
                    if ($('button.sw-btn-next').hasClass('disabled')) {
                        $('button.sw-btn-next').hide();
                        $('.sw-btn-group-extra').removeClass('d-none');
                    } else {
                        $('button.sw-btn-next').show();
                        $('.sw-btn-group-extra').addClass('d-none');
                    }
                });
            });
        });
    </script>
</body>

</html>
