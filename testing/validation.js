

function validarContrasena(contrasena) {
    // Expresión regular para verificar el patrón
    const patron = /^(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}$/;

    // Comprueba si la contraseña cumple con el patrón
    if (patron.test(contrasena)) {
        return true; // La contraseña es válida
    } else {
        return false; // La contraseña no cumple con los requisitos
    }
}

// Ejemplo de uso
const contrasena1 = "P@ssw0rd";
const contrasena2 = "clave";

console.log(validarContrasena(contrasena1)); // true
console.log(validarContrasena(contrasena2)); // false