import "./bootstrap";

/**
 * AlpineJS
 */
import Alpine from "alpinejs";
import UI from "@alpinejs/ui";
import Focus from "@alpinejs/focus";
import ToastComponent from "../../vendor/usernotnull/tall-toasts/resources/js/tall-toasts";

Alpine.plugin(UI);
Alpine.plugin(Focus);
Alpine.data("ToastComponent", ToastComponent);

window.Alpine = Alpine;
Alpine.start();

/**
 * Input Mask
 */
import Inputmask from "inputmask";

// Currency
Inputmask("currency", {
    prefix: "$",
    digits: 2,
    enforceDigitsOnBlur: true,
    positionCaretOnClick: "select",
    digitsOptional: true,
    rightAlign: false,
    clearMaskOnLostFocus: true,
    unmaskAsNumber: true,
}).mask(document.getElementsByClassName("mask-currency"));
