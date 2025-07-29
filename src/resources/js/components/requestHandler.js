export default async function requestHandler(url, options) {
    let response = null;
    let data = null;

    try {
        response = await fetch(url, options);

        try {
            data = await response.json();
        } catch (error) {
            data = {
                message: "Algo deu errado",
            };
        }
    } catch (error) {
        console.error(`requestHandler: ${error}`);
    }

    return {
        response,
        data,
    };
}
