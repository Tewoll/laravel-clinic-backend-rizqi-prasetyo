@if ($message = Session::get('success'))
    <div id="success-alert" class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            <p>{{ $message }}</p>
        </div>
    </div>
@endif

@push('scripts')
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#success-alert').addClass('d-none');
        }, 5000); // Menghilangkan pesan setelah 5 detik (5000 ms)
    });
</script>
@endpush

