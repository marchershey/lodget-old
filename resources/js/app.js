/**
 * Utility scripts
 */

window.addEventListener("scroll", (event) => {
    window.scrollTo({ top: 0, behavior: "smooth" });
});

/**
 * Alpine JS
 * https://alpinejs.dev - version ###
 */
import Alpine from "alpinejs";
window.Alpine = Alpine;

/**
 * TallToasts
 * https://github.com/usernotnull/tall-toasts
 */
import ToastComponent from "../../vendor/usernotnull/tall-toasts/resources/js/tall-toasts";
Alpine.data("ToastComponent", ToastComponent);
Alpine.start();
