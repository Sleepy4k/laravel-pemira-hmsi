import axios from "axios";

window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
window.axios.defaults.withCredentials = true;

const token =
    document.head
        .querySelector('meta[property="csrf-token"]')
        ?.getAttribute("content") || null;
if (token) {
    window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token;
}

document.addEventListener("DOMContentLoaded", function () {
    const tokenInput = document.getElementById("tokenInput");
    const verifyBtn = document.getElementById("verifyBtn");
    const errorMessage = document.getElementById("errorMessage");

    verifyBtn.addEventListener("click", function () {
        const token = tokenInput.value.trim().toUpperCase();

        if (token === "") {
            tokenInput.classList.add("error");
            errorMessage.innerHTML =
                '<box-icon name="error-circle" type="solid" color="#e74c3c"></box-icon> Token tidak boleh kosong!';
            errorMessage.classList.add("show");
            return;
        }

        verifyBtn.disabled = true;
        verifyBtn.innerText = "Memverifikasi...";
        const verifyUrl = verifyBtn.getAttribute("data-verify-url") || "/vote/verify";

        window.axios
            .post(verifyUrl, { token: token })
            .then(function (response) {
                if (response.data.status === "success") {
                    window.location.href = response.data.redirect_url;
                } else {
                    tokenInput.classList.add("error");
                    errorMessage.innerHTML =
                        '<box-icon name="error-circle" type="solid" color="#e74c3c"></box-icon> ' +
                        response.data.message;
                    errorMessage.classList.add("show");
                }
            })
            .catch(function (error) {
                const message = error.response?.data?.message || "Terjadi kesalahan tak terduga.";
                tokenInput.classList.add("error");
                errorMessage.innerHTML =
                    '<box-icon name="error-circle" type="solid" color="#e74c3c"></box-icon> ' + message;
                errorMessage.classList.add("show");
            })
            .finally(function () {
                verifyBtn.disabled = false;
                verifyBtn.innerText = "Verifikasi Token";
            });
    });

    tokenInput.addEventListener("keypress", function (e) {
        if (e.key === "Enter") {
            verifyBtn.click();
        }
    });

    tokenInput.addEventListener("input", function () {
        tokenInput.classList.remove("error");
        errorMessage.classList.remove("show");
    });
});
