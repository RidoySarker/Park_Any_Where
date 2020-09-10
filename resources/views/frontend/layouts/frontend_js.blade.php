    <!--===============================================================================================-->
    <script src="{{ asset('frontend_assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{asset('backend_assets/js/default-assets/jquey.tagsinput.min.js')}}"></script>
    <script src="{{ asset('frontend_assets/js/scripts.js') }}"></script>
    @yield('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="{{ asset('frontend_assets/js/scripts.js') }}"></script>
    <!--===============================================================================================-->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

	<script src="{{ asset('frontend_assets/js//jquery.datetimepicker.full.min.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>

    <script>

            $('#tags').tagsInput({
                'width': '100%',
                'height': '40%',
                'defaultText': 'Space'
            });

    </script>
</body>
</html>