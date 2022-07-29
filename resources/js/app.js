import "./bootstrap";

// Windows Size Utility
// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
// Then we set the value in the --vh custom property to the root of the document
let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty("--vh", `${vh}px`);

/**
 * Plugins and Packages
 */

// Fetcha (requirement for hotel datepicker)
import fecha from "fecha";
window.fecha = fecha;

// Hotel datepicker
import HotelDatepicker from "./hotel-datepicker";
window.HotelDatepicker = HotelDatepicker;

// Alpinejs & Tall Toasts
import Alpine from "alpinejs";
import ToastComponent from "../../vendor/usernotnull/tall-toasts/dist/js/tall-toasts";
Alpine.data("ToastComponent", ToastComponent);
window.Alpine = Alpine;
Alpine.start();

// Full calendar
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
window.Calendar = Calendar;
window.dayGridPlugin = dayGridPlugin;

// Splidejs
import Splide from "@splidejs/splide";
import splideCss from "@splidejs/splide/dist/css/themes/splide-default.min.css";
window.Splide = Splide;
