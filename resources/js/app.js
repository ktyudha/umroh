// import "./bootstrap";

import "flowbite";

import Alpine from "alpinejs";
import persist from "@alpinejs/persist";

Alpine.plugin(persist);
window.Alpine = Alpine;

Alpine.start();
