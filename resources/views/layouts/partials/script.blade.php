<script src="{{ asset ('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset ('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('dist/js/adminlte.min.js') }}"></script>

<script type="text/javascript" src="{{ asset ('plugins/toastr/toastr.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        flatpickr(".date", {
            "locale": "es"
        });

        $('.select2').select2();
    })
</script>
<script>
    $(document).ready(function (){
        toastr.options = {
            "progressBar": true,
        }

        window.addEventListener('hide-form', event => {
            $('#form').modal('hide');
            toastr.success(event.detail.message, 'Success!');
        })
    });
</script>

<script type="module">
    const addModal = new bootstrap.Modal('#createDataModal');
    const editModal = new bootstrap.Modal('#updateDataModal');
    window.addEventListener('closeModal', () => {
        addModal.hide();
        editModal.hide();
    })
</script>

<script>
    window.addEventListener('show-form', event => {
        $('#form').modal('show');
    })

    window.addEventListener('show-delete-modal', event =>{
        $('#confirmationModal').modal('show');
    })

    window.addEventListener('hide-delete-modal', event =>{
        $('#confirmationModal').modal('hide');
        toastr.success(event.detail.message, 'Success!');
    })
</script>
