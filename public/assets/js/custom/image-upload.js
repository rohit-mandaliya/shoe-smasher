let uploadImage = document.getElementById("imageDisplay");
const fileUpload = document.querySelector("#imageUpload");

if (uploadImage) {
    const e = uploadImage.src;
    (fileUpload.onchange = () => {
        uploadImage.classList.remove('d-none');
        fileUpload.files[0] && (uploadImage.src = window.URL.createObjectURL(fileUpload.files[0]));
    });
}

$('.iconDisplay').click(function (e) {
    $('#imageUpload').val(null);
    $('.fileUpload').removeClass('d-none');
    $('#imageDisplay').addClass('d-none');
    $('.iconDisplay').addClass('d-none');
    e.stopImmediatePropagation();
})

function imageClick() {
    if ($('.iconDisplay').hasClass("d-none")) {
        document.getElementById('imageUpload').click();
    }
}

$('#imageUpload').change(function () {
    $('.fileUpload').addClass('d-none');
    $('#imageDisplay').removeClass('d-none');
    $('.iconDisplay').removeClass('d-none');
});
