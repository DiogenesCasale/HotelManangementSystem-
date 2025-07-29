import Modal from "../../../components/modal/Modal.js";
import Table from "../../../components/table/Table.js";

document.addEventListener("DOMContentLoaded", () => {
    // Filter modal
    const overlayElement = document.getElementById("overlay");
    const filterModalElement = document.getElementById("filter-modal");
    const FilterModal = new Modal(filterModalElement, overlayElement);

    // Button to enable filter modal
    const filtersButton = document.getElementById("filters-button");
    filtersButton.addEventListener("click", FilterModal.open.bind(FilterModal));
    // Filter modal

    // Table
    const tableElement = document.getElementById("table");
    const MovementsTable = new Table(tableElement, "movements");

    MovementsTable.loadData();
});
