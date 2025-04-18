

const formToDisplay = document.getElementById("AddForm")

showForm = () => {

    formToDisplay.classList.remove("d-none");

    formToDisplay.classList.add("d-block")
}

closeForm = () => {

    formToDisplay.classList.remove("d-block");

    formToDisplay.classList.add("d-none")
}