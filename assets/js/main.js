const swal = $('.swal').data('swal')
if(swal) {
    Swal.fire({
        title:'Success',
        text: swal,
        icon : 'success'
    });
}

const error = $('.error').data('error');
if(error){
    Swal.fire({
        title:'Error',
        text:error,
        icon:'error'
    });
}

$(document).on('click','.btn-hapus', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    
    Swal.fire({
        title: "Apakah Kamu Yakin?",
        text: "Data Akan Terhapus Permanent",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus!",
    }).then((result) => {
        if(result.isConfirmed){
            document.location.href = href;;
        }
    })
});