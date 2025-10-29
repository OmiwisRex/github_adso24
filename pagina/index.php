<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GitHub ADSO24</title>
    <style>
        body {
            background: black;
            color: white;
        }
        .vertical {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
            gap: 10px;
            padding: 10px;
        }
        .horizontal {
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-items: center;
            gap: 10px;
            padding: 10px;
        }
        textarea {
            width: 400px;
            height: 150px;
            resize: none;
            overflow: auto;
        }
    </style>
</head>
<body class="vertical">
    <h1>GitHub ADSO24</h1>
    <p>Ejemplo de uso de GitHub por parte del ADSO24</p>
    <div class="horizontal">
        <div class="vertical">
            <label>Número A</label>
            <input type="number" id="A">
        </div>
        <div class="vertical">
            <label>Número B</label>
            <input type="number" id="B">
        </div>
    </div>
    <div class="vertical">
        <label>Seleccione un Algoritmo</label>
        <select id="algoritmo">
            <?php
                $archivos = glob("../scripts/*.js");
                foreach ($archivos as $archivo) {
                    $nombre = basename($archivo, ".js");
                    $funcion = lcfirst($nombre);
                    echo "<option value='$funcion'>$nombre</option>";
                }
            ?>
        </select>
    </div>
    <div class="vertical">
        <button id="ejecutar">Ejecutar</button>
        <textarea id="resultado" readonly placeholder="Esperando ejecución..."></textarea>
    </div>
    <?php
        foreach ($archivos as $archivo) {
            $nombre = basename($archivo);
            echo "<script src='../scripts/$nombre'></script>";
        }
    ?>
    <script>
        const btn = document.getElementById("ejecutar");
        btn.addEventListener("click", async () => {
            const funcion = document.getElementById("algoritmo").value;
            const a = parseFloat(document.getElementById("A").value);
            const b = parseFloat(document.getElementById("B").value);
            if (isNaN(a) || isNaN(b)) {
                document.getElementById("resultado").value = "digite los números...";
            }
            else {
                try {
                    const resultado = window[funcion](a, b);
                    document.getElementById("resultado").value = resultado;
                }
                catch (error) {
                    document.getElementById("resultado").value = error.message;
                }
            }
        });
    </script>
</body>
</html>
