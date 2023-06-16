// datatable
$('.table-1').DataTable();

// modal
$("#change-password-admin").fireModal({
    title: 'Ubah Password',
    body: $("#page-change-password-admin"),
    footerClass: 'bg-whitesmoke',
    autoFocus: false,
    onFormSubmit: function(modal, e, form) {
        e.preventDefault()

        // Form Data
        let url = this.getAttribute('action');
        let password = $('#password').val()
        let password_confirmation = $('#password_confirmation').val()
        let username = $('#username').val()

        // DO AJAX HERE
        $.ajax({
            method: 'POST',
            url,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                password, password_confirmation, username
            },
            success:function(res){
                if(res.success){
                    form.stopProgress();
                    swal({
                        icon: 'success',
                        text: res.message
                    }).then(() => {
                        location.reload()
                    });
                }else{
                    form.stopProgress();
                    let errors = res.errors;
                    $.each(errors, function(prefix, val){
                    $('.' + prefix).addClass('is-invalid');
                    $('.messErr_' + prefix).text(val[0]);
                    })
                }
            },
            error:function(er){
                console.log(er);
            }
        })
        let fake_ajax = setTimeout(function() {
        form.stopProgress();
        // modal.find('.modal-body').prepend('<div class="alert alert-info">Please check your browser console</div>')

        clearInterval(fake_ajax);
        }, 1500);

        e.preventDefault();
    },
    shown: function(modal, form) {
        console.log(form)
    },
    buttons: [
        {
        text: 'Ubah',
        submit: true,
        class: 'btn btn-primary btn-shadow',
        handler: function(modal) {
        }
        }
    ]
});

// sweetalert
if($('.message').data('message') != null){
    swal({
        icon: 'success',
        text: $('.message').data('message')
    });
}

$('.not-link').click(function(e){
    e.preventDefault();
});
$(document).on('click', '.confirm-delete', function(){
    swal({
        title: 'Hapus?',
        text: 'Semua yang berkaitan dengan data ini akan hilang...',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $(this).prev().trigger('click');
        }
    });
})

$('#skep_pengangkatan').on('change', function(){
    var file = $('#skep_pengangkatan')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#skep_pangkat').on('change', function(){
    var file = $('#skep_pangkat')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#skep_pemberhentian').on('change', function(){
    var file = $('#skep_pemberhentian')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#dcpp').on('change', function(){
    var file = $('#dcpp')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#srt_nikah').on('change', function(){
    var file = $('#srt_nikah')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#skep_milsuk').on('change', function(){
    var file = $('#skep_milsuk')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#kpi').on('change', function(){
    var file = $('#kpi')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#akte').on('change', function(){
    var file = $('#akte')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#photo').on('change', function(){
    var file = $('#photo')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#sk_tanggungan_keluarga').on('change', function(){
    var file = $('#sk_tanggungan_keluarga')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#kta_asabri').on('change', function(){
    var file = $('#kta_asabri')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#npwp').on('change', function(){
    var file = $('#npwp')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#tanda_jasa').on('change', function(){
    var file = $('#tanda_jasa')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#sk_kuliah').on('change', function(){
    var file = $('#sk_kuliah')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#dpcp').on('change', function(){
    var file = $('#dpcp')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#kep_cpns').on('change', function(){
    var file = $('#kep_cpns')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#kep_pns').on('change', function(){
    var file = $('#kep_pns')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#kep_pangkat').on('change', function(){
    var file = $('#kep_pangkat')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#akte_nikah').on('change', function(){
    var file = $('#akte_nikah')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#akte_anak').on('change', function(){
    var file = $('#akte_anak')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#sp_hd').on('change', function(){
    var file = $('#sp_hd')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#sk_kematian').on('change', function(){
    var file = $('#sk_kematian')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#kk').on('change', function(){
    var file = $('#kk')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#kgb').on('change', function(){
    var file = $('#kgb')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
$('#ppk').on('change', function(){
    var file = $('#ppk')[0].files;
    var fileName = "";
    for(let i = 0; i < file.length; i++){
        fileName += file[i].name + ", ";
    }
    $(this).next().text(fileName);
})
