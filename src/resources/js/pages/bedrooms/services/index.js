import Modal from "../../../components/modal/Modal.js";
import Table from "../../../components/table/Table.js";
document.addEventListener("DOMContentLoaded", () => {
    // Filter modal
    const overlayElement = document.getElementById("overlay");
    const filterModalElement = document.getElementById("filter-modal");
    const FilterModal = new Modal(filterModalElement, overlayElement);

    // Button to enable filtro modal
    const filtersButton = document.getElementById("filters-button");
    filtersButton.addEventListener("click", FilterModal.open.bind(FilterModal));
    // Filter modal

    // Create service modal
    const createServiceModalElement = document.getElementById("services-modal");
    const ServiceModal = new Modal(createServiceModalElement, overlayElement);

    // Button to enable create service modal
    const createServiceButton = document.getElementById(
        "create-services-button"
    );
    createServiceButton.addEventListener(
        "click",
        ServiceModal.open.bind(ServiceModal)
    );
    // Create service modal

    // Table
    const tableElement = document.getElementById("table");
    const UsersTable = new Table(tableElement, "users");

    UsersTable.loadData();
});
