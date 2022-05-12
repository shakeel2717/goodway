@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            swal("oops!", "{{ $error }}", "error");
        </script>
    @endforeach
@endif
@if (session('message'))
    <script>
        swal("Success!", "{{ session('message') }}", "success");
    </script>
@endif