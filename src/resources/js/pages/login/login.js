import Form from "../../components/form/Form.js";
import Toast from "../../components/toast/Toast.js";
import Auth from "../../services/Auth.js";

let ToastManager = null;
function afterSubmit({ response, data }) {
    if (response.ok) {
        ToastManager.success(
            "Logado com sucesso!",
            "Você será redirecionado em breve."
        );

        setTimeout(() => {
            window.location.href = '/dashboard'
        }, 1000);
        return;
    } 

    ToastManager.error(
        "Login malsucedido!",
        data.message
    );


}

document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("login-form");

    new Form(form, Auth.login, {
        submitLoading: true,
        afterSubmit: afterSubmit,
    });

    const toastContainer = document.getElementById("toast-container");
    ToastManager = new Toast(toastContainer);
});
