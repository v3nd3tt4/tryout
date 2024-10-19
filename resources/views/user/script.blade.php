<script>
    $(document).ready(function(){
        $('.dt').DataTable();

        $(document).on('click', '.btn-tambah', function(e){
            e.preventDefault();
            $('#modal-tambah').modal('show');
        });

        $(document).on('click', '.btn-hapus', function(e){
            e.preventDefault();
            $('#modal-hapus').modal('show');
            var id = $(this).attr('data-id');
            $('#id_hapus').val(id);
        });

        $(document).on('click', '.btn-edit', function(e){
            e.preventDefault();
            var id = $(this).attr('data-id');
            $('#modal-edit').modal('show');
            $('#id').val(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{url("user/show")}}',
                type: 'GET',
                data: {
                    "id": id
                },
                dataType: "JSON",
                success: function(msg) {
                    $('#name').val(msg.name);
                    $('#email').val(msg.email);
                    $('#role').val(msg.role);
                }
            });
        });

        $(document).on('submit', '#form-tambah', function(e) {
            e.preventDefault();
            var data = new FormData(document.getElementById('form-tambah'));
            $(':input[type="submit"]').prop('disabled', true);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: 'user',
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(msg) {
                    if (msg.status == 'success') {
                        Swal.fire({
                            title: "Sukses!",
                            text: "Data berhasil disimpan",
                            icon: "success",
                            confirmButtonColor: "#3051d3",
                        });                        
                        location.reload();
                    } else if (msg.status == 'failed') {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Data gagal disimpan",
                            icon: "error",
                            confirmButtonColor: "#3051d3",
                        });       
                        $(':input[type="submit"]').prop('disabled', false);
                    }
                }
            });
        });

        $(document).on('submit', '#form-edit', function(e) {
            e.preventDefault();
            var data = new FormData(document.getElementById('form-edit'));
            $(':input[type="submit"]').prop('disabled', true);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{url("user/update")}}',
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(msg) {
                    if (msg.status == 'success') {
                        Swal.fire({
                            title: "Sukses!",
                            text: "Data berhasil diedit",
                            icon: "success",
                            confirmButtonColor: "#3051d3",
                        });                        
                        location.reload();
                    } else if (msg.status == 'failed') {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Data gagal diedit",
                            icon: "error",
                            confirmButtonColor: "#3051d3",
                        });       
                        $(':input[type="submit"]').prop('disabled', false);
                    }
                }
            });
        });

        $(document).on('submit', '#form-hapus', function(e) {
            e.preventDefault();
            var data = new FormData(document.getElementById('form-hapus'));
            $(':input[type="submit"]').prop('disabled', true);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{url("user/destroy")}}',
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(msg) {
                    if (msg.status == 'success') {
                        Swal.fire({
                            title: "Sukses!",
                            text: "Data berhasil dihapus",
                            icon: "success",
                            confirmButtonColor: "#3051d3",
                        });                        
                        location.reload();
                    } else if (msg.status == 'failed') {
                        Swal.fire({
                            title: "Gagal!",
                            text: "Data gagal dihapus",
                            icon: "error",
                            confirmButtonColor: "#3051d3",
                        });       
                        $(':input[type="submit"]').prop('disabled', false);
                    }
                }
            });
        });
    });
</script>