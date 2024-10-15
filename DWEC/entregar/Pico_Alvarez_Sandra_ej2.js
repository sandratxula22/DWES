let f4 = (string) => {
    let palabras = string.split(" ");
    let stringFinal = "";
    for(i=0;i<palabras.length;i++){
        stringFinal = stringFinal + palabras[i].charAt(0).toUpperCase() + palabras[i].slice(1);
    }

    return stringFinal;
}

let f5 = (string) => {
    let palabras = string.split(" ");
    let suma = 0;
    for(i=0;i<palabras.length;i++){
        suma += palabras[i].length;
    }
    let media = suma/palabras.length;
    return media;
}


let f6 = (string) => {
    let palabras = string.split(" ");
    let palabrasA = palabras.filter(x => x.includes("a"));
    let res = [];
    for(i=0;i<palabrasA.length;i++){
        res[i] = palabrasA[i].length;
    }
    return res;
}


let frase = "en un lugar de la mancha";
console.log("--PRUEBA F4--");
console.log(f4(frase));

console.log("--PRUEBA F5--");
console.log(f5(frase));

console.log("--PRUEBA F6--");
console.log(f6(frase));