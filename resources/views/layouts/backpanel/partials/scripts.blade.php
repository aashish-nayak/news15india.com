<script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<!--plugins-->
<script src="{{ asset('assets/js/jquery.min.js')}}"></script>

<script src="{{ asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('assets/plugins/datatable/js/datatable.server-side.js')}}"></script>

<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{ asset('assets/plugins/input-tags/js/tagsinput.js') }}"></script>

<!--app JS-->
@stack('plugin-scripts')
<script src="{{ asset('assets/js/app.js')}}"></script>
@stack('scripts')