import Modal from "../../components/modal/Modal.js";
import Table from "../../components/table/Table.js";

document.addEventListener("DOMContentLoaded", () => {
    // Filter modal
    const overlayElement = document.getElementById("overlay");
    const filterModalElement = document.getElementById("filter-modal");
    const FilterModal = new Modal(filterModalElement, overlayElement);

    // Button to enable filtr modal
    const filtersButton = document.getElementById("filters-button");
    filtersButton.addEventListener("click", FilterModal.open.bind(FilterModal));
    // Filter modal

    // Create user modal
    const createUserModalElement = document.getElementById("user-modal");
    const UserModal = new Modal(createUserModalElement, overlayElement);

    // Button to enable create user modal
    const createUserButton = document.getElementById("create-user-button");
    createUserButton.addEventListener("click", UserModal.open.bind(UserModal));
    // Create user modal

    // Table
    const tableElement = document.getElementById("table");
    const UsersTable = new Table(tableElement, "users");

    UsersTable.loadData();
});
