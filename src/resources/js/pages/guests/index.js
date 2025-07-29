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
    const createGuestModalElement = document.getElementById("guest-modal");
    const GuestModal = new Modal(createGuestModalElement, overlayElement);

    // Button to enable create guest modal
    const createGuestButton = document.getElementById("create-guest-button");
    createGuestButton.addEventListener(
        "click",
        GuestModal.open.bind(GuestModal)
    );
    // Create guest modal

    // Table
    const tableElement = document.getElementById("table");
    const UsersTable = new Table(tableElement, "users");

    UsersTable.loadData();
});
