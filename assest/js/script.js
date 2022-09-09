function volumeToggle(button) {
    var mute = $(".previewVideo").prop("muted");
    $(".previewVideo").prop("muted", !mute);

    $(button).find("i").toggleClass("fa-solid fa-volume-xmark");
    $(button).find("i").toggleClass("fa-solid fa-volume-high");

}
function previewEnded() {
    $(".previewVideo").toggle();
    $(".previewImage").toggle();
}
