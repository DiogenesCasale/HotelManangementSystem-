export default class Toast {
    #containerElement;
    #successToastTemplate;
    #errorToastTemplate;
    #infoToastTemplate;

    constructor(containerElement) {
        this.#containerElement = containerElement;

        this.#successToastTemplate = document.getElementById("success-toast");
        this.#errorToastTemplate = document.getElementById("error-toast");
        this.#infoToastTemplate = document.getElementById("info-toast");
    }

    #close = (event) => {
        const toast = event.currentTarget.closest("div");
        toast.classList.remove("animate-fade-up");
        toast.classList.add(
            "animate-duration-500",
            "animate-reverse",
            "animate-fade"
        );

        toast.addEventListener("animationend", () => {
            toast.remove();
        });
    };

    #createSuccessToast(title, message) {
        const template = this.#successToastTemplate.content.cloneNode(true);
        const titleElement = template.querySelector("#title");
        const messageElement = template.querySelector("#description");
        const closeButton = template.querySelector("#close");

        titleElement.textContent = title;
        messageElement.textContent = message;

        closeButton.addEventListener("click", this.#close);
        setTimeout(() => closeButton.click(), 4000);

        return template;
    }

    #createInfoToast(title, message) {
        const template = this.#infoToastTemplate.content.cloneNode(true);
        const titleElement = template.querySelector("#title");
        const messageElement = template.querySelector("#description");
        const closeButton = template.querySelector("#close");

        titleElement.textContent = title;
        messageElement.textContent = message;

        closeButton.addEventListener("click", this.#close);
        setTimeout(() => closeButton.click(), 4000);

        return template;
    }

    #createErrorToast(title, message) {
        const template = this.#errorToastTemplate.content.cloneNode(true);
        const titleElement = template.querySelector("#title");
        const messageElement = template.querySelector("#description");
        const closeButton = template.querySelector("#close");

        titleElement.textContent = title;
        messageElement.textContent = message;

        closeButton.addEventListener("click", this.#close);
        setTimeout(() => closeButton.click(), 4000);

        return template;
    }

    #createToast(title, message, type) {
        let toast = null;

        switch (type) {
            case "success":
                toast = this.#createSuccessToast(title, message);
                break;
            case "error":
                toast = this.#createErrorToast(title, message);
                break;
            case "info":
                toast = this.#createInfoToast(title, message);
                break;
            default:
                console.error("Toast(createToast): Invalid type");
                break;
        }

        if (toast !== null) this.#containerElement.appendChild(toast);
    }

    success(title, message) {
        this.#createToast(title, message, "success");
    }

    error(title, message) {
        this.#createToast(title, message, "error");
    }
}
