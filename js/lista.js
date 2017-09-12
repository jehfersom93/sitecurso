$(document).ready(function () {
    $('.select2 span').addClass('needsclick');
    $("#listagem").select2({
        placeholder: "Selecione um site",
        width: '100%'
    });
});

var acessarSite = function () {
    if ($("#listagem").val() == null) {
        alert("Selecione um site na lista!");
    } else {
        window.location = $("#listagem").val();
    }
}