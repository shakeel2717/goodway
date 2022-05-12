$('#feel-the-wave').wavify({
    height: 100,
    bones: 3,
    amplitude: 90,
    color: 'rgba(72, 134, 255, 4)',
    speed: .25
});
$('#feel-the-wave-two').wavify({
    height: 70,
    bones: 5,
    amplitude: 60,
    color: 'rgba(72, 134, 255, .3)',
    speed: .35
});
$('#feel-the-wave-three').wavify({
    height: 50,
    bones: 4,
    amplitude: 50,
    color: 'rgba(72, 134, 255, .2)',
    speed: .45
});

function copyClipboard() {
    var copyText = document.getElementById("refer");
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    navigator.clipboard.writeText(copyText.value);
}