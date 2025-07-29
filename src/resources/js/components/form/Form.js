export default class Form {
    #formElement;
    #service;
    #options;

    #loadingIcon = '<i class="fa fa-spinner animate-spin text-lg"></i>';

    constructor(
        formElement,
        service,
        options = {
            submitLoading: true,
            beforeSubmit: null,
            afterSubmit: null,
        }
    ) {
        this.#formElement = formElement;

        if (typeof service !== "function")
            return console.error(
                "Form(Constructor): service must be a function"
            );

        this.#service = service;
        this.#options = options;
        this.#events();
    }

    #setErrors(errors) {
        for (const [key, value] of Object.entries(errors)) {
            const input = document.getElementById(key);
            const error = document.getElementById(`${key}-error`);

            input.classList.add("border-red-500");
            error.textContent = value;
        }
    }

    #handleSubmit = async (event) => {
        event.preventDefault();

        event.submitter.setAttribute("disabled", true);

        const oldSubmitContent = event.submitter.textContent;
        event.submitter.innerHTML = this.#loadingIcon;

        const data = new FormData(this.#formElement);
        for (const [key, value] of data) {
            data.set(key, value);
        }

        const result = await this.#service(data);

        if (!result.response.ok)
            if (result.response.status === 422)
                this.#setErrors(result.data.errors);

        event.submitter.removeAttribute("disabled");
        event.submitter.innerHTML = oldSubmitContent;

        if (this.#options.afterSubmit) this.#options.afterSubmit(result);
    };

    #removeErrors = (event) => {
        const input = event.target;
        const span = document.getElementById(`${input.name}-error`);

        if (!input.classList.contains("border-red-500")) return;

        input.classList.remove("border-red-500");
        span.textContent = "";
    };

    #events() {
        this.#formElement.addEventListener("submit", this.#handleSubmit);

        this.#formElement.addEventListener("input", this.#removeErrors);
    }
}
