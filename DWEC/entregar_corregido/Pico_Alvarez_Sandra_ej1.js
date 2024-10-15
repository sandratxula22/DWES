// a = [1, 2, 3, 4]
let f1 = (array) => {
    return array.map(x => x*3).filter(x => (x%4 !== 0));
}

let f2 = (array) => {
    console.log(array.filter(x => (x%2 != 0)));
}

let f3 = (array) => {
    let sol = array.filter((x, i) => (i%2 == 0)).reduce((y, z) => (y + z));
    return sol;
}


let array = [1, 2, 3, 4];
console.log("--PRUEBA F1--");
console.log(f1(array));

console.log("--PRUEBA F2--");
f2(array);

console.log("--PRUEBA F3--");
console.log(f3(array));
