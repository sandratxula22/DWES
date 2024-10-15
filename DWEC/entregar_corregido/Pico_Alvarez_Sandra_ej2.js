let f4 = (string) => {
    let palabras = string.split(" ").map(x => x.charAt(0).toUpperCase() + x.slice(1)).reduce((x, y) => (x + y));
    return palabras;
}

let f5 = (string) => {
    let palabras = string.split(" ");
    let suma = palabras.reduce((s, palabra) => (s + palabra.length), 0);
    let media = suma/palabras.length;
    return media;
}


let f6 = (string) => {
    let palabras = string.split(" ").filter(x => x.includes("a")).map(x => x.length);
    return palabras;
}


let frase = "en un lugar de la mancha";
console.log("--PRUEBA F4--");
console.log(f4(frase));

console.log("--PRUEBA F5--");
console.log(f5(frase));

console.log("--PRUEBA F6--");
console.log(f6(frase));