import requestHandler from "../components/requestHandler.js";

export default class Auth {
    static endpoint = "/api/auth";

    static async login(data) {
        
        const response = await requestHandler(`${Auth.endpoint}/login`, {
            method: "POST",
            body: data,
        });

        return response;
    }
}
