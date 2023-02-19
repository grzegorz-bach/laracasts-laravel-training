import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    document
        .getElementById("category-select")
        .addEventListener("change", function (e) {
            const value =  e.target.value;
            if(!value) {
                window.location.pathname = '/posts';
                return;
            }
            window.location.pathname=`/categories/${value}`;
        });

    document
        .getElementById("author-select")
        .addEventListener("change", function (e) {
            const value =  e.target.value;
            console.log({value});
            if(!value) {
                window.location.pathname = '/posts';
                return;
            }
            window.location.pathname=`/authors/${value}`;
        });
});
