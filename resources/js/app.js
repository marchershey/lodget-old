import "./bootstrap";

import Alpine from "alpinejs";
import UI from "@alpinejs/ui";
import Focus from "@alpinejs/focus";
import ToastComponent from "../../vendor/usernotnull/tall-toasts/resources/js/tall-toasts";

Alpine.plugin(UI);
Alpine.plugin(Focus);
Alpine.data("ToastComponent", ToastComponent);

window.Alpine = Alpine;
Alpine.start();
