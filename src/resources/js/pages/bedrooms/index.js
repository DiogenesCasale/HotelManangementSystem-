import Modal from "../../components/modal/Modal.js";
import Table from "../../components/table/Table.js";

document.addEventListener("DOMContentLoaded", () => {
    // Filter modal
    const overlayElement = document.getElementById("overlay");
    const filterModalElement = document.getElementById("filter-modal");
    const FilterModal = new Modal(filterModalElement, overlayElement);

    // Button to enable filtro modal
    const filtersButton = document.getElementById("filters-button");
    filtersButton.addEventListener("click", FilterModal.open.bind(FilterModal));
    // Filter modal

    // Create bedroom modal
    const createBedroomModalElement = document.getElementById("bedroom-modal");
    const BedroomModal = new Modal(createBedroomModalElement, overlayElement);

    // Button to enable create bedroom modal
    const createBedroomButton = document.getElementById(
        "create-bedroom-button"
    );
    createBedroomButton.addEventListener(
        "click",
        BedroomModal.open.bind(BedroomModal)
    );
    // Create bedroom modal

    // Table
    const tableElement = document.getElementById("table");
    const UsersTable = new Table(tableElement, "users");

    UsersTable.loadData();
});
