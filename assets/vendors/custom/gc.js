
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-center",
    "preventDuplicates": true,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "300",
    "timeOut": "1000",
    "extendedTimeOut": "500",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

function ajaxRequst(param = {}) {
    // link, data, callback, object_origin = false, swal_success = false
    // alert(Array.isArray(data) )
    mApp.blockPage({
        overlayColor: '#000000',
        type: 'v2',
        state: 'primary',
        message: 'Loading...'
    });
    $.ajax({
        url: param.link,
        method: 'POST',
        data: Array.isArray(param.data) ? param.data[0] : param.data,
        processData: Array.isArray(param.data) ? false : true,
        contentType: Array.isArray(param.data) ? false : "application/x-www-form-urlencoded; charset=UTF-8",
        dataType: 'json',
        success: function (resp) {
            if (resp.status) {
                if (param.swal_success) {
                    Swal.fire({
                        type: "success",
                        title: 'Success..!',
                        text: resp.msg,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
                if (param.callback) param.callback(param.object_origin, resp);
                mApp.unblockPage();
            } else {
                swal.fire('Upps..!', resp.msg, 'error');
                if (param.callback) param.callback(param.object_origin, resp);
                mApp.unblockPage();
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            swal.fire("Oops..!", "Gagal menghubungi server!", "error");
            resp = { status: false, data: false }
            if (param.callback) param.callback(param.object_origin, resp);
            mApp.unblockPage();
        }
    })
}


function swipeDiv(hide, show) {
    $('#' + hide).slideUp()
    $('#' + show).prop('hidden', false).slideDown()
}

$(document).on('click', '.copy', function () {
    let copyText = $(this).data('text')
    const cb = navigator.clipboard;
    cb.writeText(copyText)
    toastr.info("Copied to clipboard");
})

