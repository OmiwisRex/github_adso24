function omar(width, height) {
    if (width <= 0 || height <= 0 || width > 1000 || height > 1000) {
        return "digita valores entre 1 y 1000";
    }
    matrix = "";
    for (let y = 0; y < height; y++) {
        for (let x = 0; x < width; x++) {
            if (Math.random() < 0.333) {
                matrix += "1";
            }
            else {
                matrix += "0";
            }
        }
        matrix += "\n";
    }
    return "Matrix por Omar Jordan Jordan\n\n" + matrix;
}
