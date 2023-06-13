import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

const deleteButtons = document.querySelectorAll(".delete-button");

deleteButtons.forEach((button) => {
    button.addEventListener("click", (event) => {
        event.preventDefault();

        const comicData = button.getAttribute("data-item-title");

        console.log(comicData);

        const myModal = document.getElementById("deleteModal");

        const bootstrapModal = new bootstrap.Modal(myModal);

        bootstrapModal.show();

        const modalComicTitle = myModal.querySelector("#modal-item-title");

        modalComicTitle.textContent = comicData;

        const buttonDelete = myModal.querySelector("button.btn-danger");

        buttonDelete.addEventListener("click", () => {
            button.parentElement.submit();
        });
    });
});
