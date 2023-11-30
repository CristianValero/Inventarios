
function toggleInformacion() {
    var informacion = document.getElementById("informacion");
    if (informacion.style.display === "none") {
        informacion.style.display = "block";
        mas_informacion.classList.toggle("show");
        mas_informacion.innerHTML="Menos"
    }
    else {
        informacion.style.display = "none";
        mas_informacion.innerHTML="Más"
    }
    
    
    
}
