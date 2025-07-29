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

    // Create guest modal
    const createStorageModalElement = document.getElementById("storage-modal");
    const StorageModal = new Modal(createStorageModalElement, overlayElement);

    // Button to enable create guest modal
    const createStorageButton = document.getElementById(
        "create-storage-button"
    );
    createStorageButton.addEventListener(
        "click",
        StorageModal.open.bind(StorageModal)
    );
    // Create guest modal

    // Table
    const tableElement = document.getElementById("table");
    const UsersTable = new Table(tableElement, "users");

    UsersTable.loadData();
});
