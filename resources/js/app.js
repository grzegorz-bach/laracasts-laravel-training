import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("category-select")
        .addEventListener("change", function (e) {
            const value = e.target.value;
            const params = new URLSearchParams(window.location.search);

            if(params.has('category')){
                params.delete('category');
            }

            if (!value) {
                window.location.search = params.toString();
                return;
            }

            params.append('category', value);
            window.location.search = params.toString();
        });

    document
        .getElementById("author-select")
        .addEventListener("change", function (e) {
            const value = e.target.value;
            const params = new URLSearchParams(window.location.search);

            if(params.has('author')){
                params.delete('author');
            }

            if (!value) {
                window.location.search = params.toString();
                return;
            }

            params.append('author', value);
            window.location.search = params.toString();
        });
});
