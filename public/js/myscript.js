function success(message) {
    new Audio("/sound/success.mp3").play();
    iziToast.success({ message: message, position: "topCenter" });
}


function error(message) {
    new Audio("/sound/error.mp3").play();
    iziToast.error({ message: message, position: "topCenter" });
}