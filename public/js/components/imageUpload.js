function mudarFotografia(event) {

    let imagem = document.getElementById("imagem");
    imagem.src = URL.createObjectURL(event.target.files[0]);

}
