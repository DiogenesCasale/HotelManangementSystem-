function whenSidebarButtonClicked() {
    const sidebar = document.getElementById("sidebar");
    const navbar = document.getElementById("navbar");
    const app = document.getElementById("app");

    if (sidebar.classList.contains("w-64")) {
        sidebar.classList.remove("w-64");
        sidebar.classList.add("w-16");

        navbar.classList.remove("w-[calc(100%-16rem)]", "ml-64");
        navbar.classList.add("w-[calc(100%-4rem)]", "ml-16");
        app.classList.remove("ml-64");
        app.classList.add("ml-16");

        return;
    }

    sidebar.classList.remove("w-16");
    sidebar.classList.add("w-64");

    navbar.classList.add("w-[calc(100%-16rem)]", "ml-64");
    navbar.classList.remove("w-[calc(100%-4rem)]", "ml-16");

    app.classList.remove("ml-16");
    app.classList.add("ml-64");
}

document.addEventListener("DOMContentLoaded", function () {
    const sidebarButton = document.getElementById("navbar-sidebar-button");
    sidebarButton.addEventListener("click", whenSidebarButtonClicked);
});
