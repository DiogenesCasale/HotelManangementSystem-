export default class Table {
    #tableElement;
    #headerElement;
    #bodyElement;
    #notFoundTemplate;
    #serviceHandler;
    #loadingSkeleton;
    #options;

    constructor(tableElement, serviceHandler, options = {}) {
        this.#tableElement = tableElement;

        this.#headerElement = this.#tableElement.querySelector("#header");
        this.#bodyElement = this.#tableElement.querySelector("#body");
        this.#notFoundTemplate = this.#tableElement
            .querySelector("#empty-template")
            .content.cloneNode(true);

        this.#serviceHandler = serviceHandler;
        this.#options = options;

        this.#loadingSkeleton = this.#getSkeletonTemplate();
    }

    #getColumnsQuantity() {
        const tr = this.#headerElement.querySelectorAll("th");

        return tr.length;
    }

    #getSkeletonTemplate() {
        const tr = document.createElement("tr");

        for (let i = 0; i < this.#getColumnsQuantity(); i++) {
            const td = document.createElement("td");
            td.classList.add("p-2");

            const skeleton = document.createElement("div");
            skeleton.classList.add(
                "bg-gray-200",
                "w-full",
                "h-6",
                "rounded-md",
                "animate-pulse"
            );

            td.appendChild(skeleton);
            tr.appendChild(td);
        }

        return tr;
    }

    loadSkeleton() {
        this.#bodyElement.appendChild(this.#loadingSkeleton);
    }

    removeSkeleton() {
        this.#bodyElement.removeChild(this.#loadingSkeleton);
    }

    notFound() {
        this.#bodyElement.appendChild(this.#notFoundTemplate);
    }

    removeNotFound() {
        this.#bodyElement.removeChild(this.#notFoundTemplate);
    }

    async loadData(data = new FormData()) {
        try {
            this.loadSkeleton();

            const response = await this.#serviceHandler(data);
        } catch (error) {
            this.removeSkeleton();
            this.#bodyElement.appendChild(this.#notFoundTemplate);

            if (Object.hasOwn(this.#options, "whenLoadDataError"))
                this.#options.errorCallback(error, data);

            console.error(`Table(loadData): ${error}`);
        }
    }
}
