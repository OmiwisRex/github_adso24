function generarOpciones() {
    let opciones = [numeroAleatorio];

    while (opciones.length < 3) {
      let nuevo = Math.floor(Math.random() * 1000) + 1;
      if (!opciones.includes(nuevo)) {
        opciones.push(nuevo);
      }
    }

    opciones.sort(() => Math.random() - 0.5);

    document.getElementById("opcion1").innerText = opciones[0];
    document.getElementById("opcion2").innerText = opciones[1];
    document.getElementById("opcion3").innerText = opciones[2];
  }
  generarOpciones();