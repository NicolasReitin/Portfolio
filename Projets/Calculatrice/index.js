const buttons = document.querySelectorAll(".btn");
const result = document.getElementById("result");

buttons.forEach((button) => {
    button.addEventListener('click', (e) => {
        result.textContent += e.target.id;
    });
});

equal.addEventListener('click', () => { // equal (egal) n'est pas a déclarer dans les focntion car déjà reconnu
    result.textContent = eval(result.textContent);
})

clear.addEventListener('click', () => {  // Clear n'est pas a déclarer dans les focntion car déjà reconnu
    result.textContent = "";
})