<script>
    // $(window).on('load', function() {
    //     if (feather) {
    //         feather.replace({
    //             width: 14,
    //             height: 14
    //         });
    //     }
    // })


    // $(function() {

    //     @if (Session::has('success'))
    //         Swal.fire({
    //             icon: 'success',
    //             title: 'Great!',
    //             text: '{{ Session::get('success') }}'
    //         })
    //     @endif
    // });

    // @if (Session::has('error'))
    //     Swal.fire({
    //         icon: 'error',
    //         title: 'Oops...',
    //         text: '{{ Session::get('error') }}'
    //     })
    // @endif

    // @if (Session::has('warning'))
    //     Swal.fire({
    //         icon: 'warning',
    //         title: 'Oops...',
    //         text: '{{ Session::get('warning') }}'
    //     })
    // @endif




    // $(window).on('load', function() {
    //     if (feather) {
    //         feather.replace({
    //             width: 14,
    //             height: 10
    //         });
    //     }
    // })


    $(function() {

        @if (Session::has('success'))
            Swal.fire({
                icon: 'success',
                title: 'Great!',
                text: '{{ Session::get('success') }}'
            })
        @endif
    });

    @if (Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ Session::get('error') }}'
        })
    @endif

    @if (Session::has('warning'))
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: '{{ Session::get('warning') }}'
        })
    @endif







    //delete
    $(function() {
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");


            Swal.fire({
                title: 'Are you sure?',
                text: "To Deleted This Data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'No',
                confirmButtonText: 'Yes, Delete!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Data Has Been Deleted Successfully.',
                        'success'
                    )
                    window.location.href = link
                }
            });


        });




    });





    //toastr notification
    // window.addEventListener('alert', event => {
    //     toastr[event.detail.type](event.detail.message,
    //         event.detail.title ?? ''), toastr.options = {
    //         "closeButton": true,
    //         "progressBar": true,
    //     }
    // });



   

    // $(window).ready(function() {
    //     $("form").on("keypress", function(event) {
    //         var keyPressed = event.keyCode || event.which;
    //         if (keyPressed === 13) {
    //             event.preventDefault();
    //             return false;
    //         }
    //     });
    // });

    // window.addEventListener('alert', event => {
    //     toastr[event.detail.type](event.detail.message,
    //         event.detail.title ?? ''), toastr.options = {
    //         "closeButton": true,
    //         "progressBar": true,
    //     }
    // });



    // ClassicEditor
    //     .create(document.querySelector('#editor'))
    //     .then(editor => {
    //         console.log(editor);
    //     })
    //     .catch(error => {
    //         console.error(error);
    //     });

    // $(window).ready(function() {
    //     $("form").on("keypress", function(event) {
    //         var keyPressed = event.keyCode || event.which;
    //         if (keyPressed === 13) {
    //             event.preventDefault();
    //             return false;
    //         }
    //     });
    // });
</script>