export default class Modal {
    #modalElement;
    #overlayElement;
    #closeElement;

    static #overlayHasClickEvent = false;
    static currentOpenedModal = null;

    constructor(modalElement, overlayElement) {
        this.#modalElement = modalElement;
        this.#overlayElement = overlayElement;
        this.#closeElement = this.#modalElement.querySelector("#close");

        this.#events();
    }

    close() {
        Modal.currentOpenedModal.#modalElement.classList.add("hidden");
        this.#overlayElement.classList.add("hidden");

        Modal.currentOpenedModal = null;
    }

    open() {
        this.#modalElement.classList.remove("hidden");
        this.#overlayElement.classList.remove("hidden");

        Modal.currentOpenedModal = this;
    }

    #whenCloseButtonClicked() {
        this.close();
    }

    #whenEscapeKeyPressed(event) {
        if (event.key !== "Escape") return;
        this.close();
    }

    #events() {
        this.#closeElement.addEventListener(
            "click",
            this.#whenCloseButtonClicked.bind(this)
        );

        if (!Modal.#overlayHasClickEvent) {
            this.#overlayElement.addEventListener(
                "click",
                this.close.bind(this)
            );
            Modal.#overlayHasClickEvent = true;

            document.addEventListener(
                "keydown",
                this.#whenEscapeKeyPressed.bind(this)
            );
        }
    }
}
