import "./bootstrap";

// Windows Size Utility
// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
// Then we set the value in the --vh custom property to the root of the document
let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty("--vh", `${vh}px`);

/**
 * Plugins and Packages
 */

// Alpinejs & Tall Toasts
import {
    Livewire,
    Alpine,
} from "../../vendor/livewire/livewire/dist/livewire.esm";
import ToastComponent from "../../vendor/usernotnull/tall-toasts/resources/js/tall-toasts";
Alpine.plugin(ToastComponent);
Livewire.start();

// Fetcha (requirement for hotel datepicker)
import fecha from "fecha";
window.fecha = fecha;
// Hotel datepicker
import HotelDatepicker from "hotel-datepicker";
window.HotelDatepicker = HotelDatepicker;

// easepick - date range picker
import { easepick } from "@easepick/core";
import { RangePlugin } from "@easepick/range-plugin";
import { LockPlugin } from "@easepick/lock-plugin";
import { DateTime } from "@easepick/datetime";
window.easepick = easepick;
window.RangePlugin = RangePlugin;
window.LockPlugin = LockPlugin;
window.DateTime = DateTime;

// Full calendar
import { Calendar } from "@fullcalendar/core";
window.Calendar = Calendar;
import dayGridPlugin from "@fullcalendar/daygrid";
window.dayGridPlugin = dayGridPlugin;
import interaction from "@fullcalendar/interaction";
window.interaction = interaction;

// Splidejs
import Splide from "@splidejs/splide";
// import splideCss from "@splidejs/splide/dist/css/themes/splide-default.min.css";
window.Splide = Splide;
