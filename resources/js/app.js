import "./bootstrap";

// Windows Size Utility
// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
// Then we set the value in the --vh custom property to the root of the document
let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty("--vh", `${vh}px`);

/**
 * Plugins and Packages
 */

// Alpinejs
import Alpine from "alpinejs";
window.Alpine = Alpine;
Alpine.start();
