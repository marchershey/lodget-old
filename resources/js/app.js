import "./bootstrap";

/**
 * Livewire & AlpineJS
 */
import {
    Livewire,
    Alpine,
} from "../../vendor/livewire/livewire/dist/livewire.esm";
import UI from "@alpinejs/ui";
import ToastComponent from "../../vendor/usernotnull/tall-toasts/resources/js/tall-toasts";

Alpine.plugin(UI);
Alpine.plugin(ToastComponent);

Livewire.start();

/**
 * Input Mask
 */
import Inputmask from "inputmask";

// Currency
Inputmask("currency", {
    prefix: "$",
    digits: 2,
    positionCaretOnClick: "select",
    digitsOptional: false,
    rightAlign: false,
    clearMaskOnLostFocus: true,
    unmaskAsNumber: true,
}).mask(document.getElementsByClassName("mask-currency"));

// Zip Code
Inputmask("99999", {
    digits: 5,
    enforceDigitsOnBlur: true,
    positionCaretOnClick: "select",
    digitsOptional: true,
    rightAlign: false,
    clearMaskOnLostFocus: true,
    unmaskAsNumber: true,
}).mask(document.getElementsByClassName("mask-zip"));
