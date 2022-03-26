// Select The Elements
var toggle_btn;
var big_wrapper;
var hamburger_menu;

function declare() {
  if (!document.querySelector(".toggle-btn") == null) {
    toggle_btn = document.querySelector(".toggle-btn");
  }
  big_wrapper = document.querySelector(".big-wrapper");
  hamburger_menu = document.querySelector(".hamburger-menu");
}

const main = document.querySelector("main");

declare();

let dark = false;

function toggleAnimation() {
  // Clone the wrapper
  dark = !dark;
  let clone = big_wrapper.cloneNode(true);
  if (dark) {
    clone.classList.remove("light");
    clone.classList.add("dark");
  } else {
    clone.classList.remove("dark");
    clone.classList.add("light");
  }
  clone.classList.add("copy");
  main.appendChild(clone);

  document.body.classList.add("stop-scrolling");

  clone.addEventListener("animationend", () => {
    document.body.classList.remove("stop-scrolling");
    big_wrapper.remove();
    clone.classList.remove("copy");
    // Reset Variables
    declare();
    events();
  });
}

function events() {
  if (toggle_btn !== undefined) {
    toggle_btn.addEventListener("click", toggleAnimation);
    hamburger_menu.addEventListener("click", () => {
      big_wrapper.classList.toggle("active");
    });    
  }
}

events();

/**
 *  ==================================================
 * | Check Internet Connection Status With Javascript |
 *  ==================================================
 */
let message = document.getElementById("message-connect-internet");
let messageOnline = () => {
  message.textContent = "Internet Connection Available";
  message.style.cssText = "background-color: #e7f6d5; color: #689f38";
};
let messageOffline = () => {
  message.textContent = "No Internet Connection";
  message.style.cssText = "background-color: #ffdde0; color: #d32f2f";
};
if (window.navigator.onLine) {
  messageOnline();
} else {
  messageOffline();
}
window.addEventListener("online", messageOnline);
window.addEventListener("offline", messageOffline);

/**
 *  ==================================================
 * |           Sliding Toast Notification             |
 *  ==================================================
 */
let x;
let toast = document.getElementById("toast");
let toastError = document.getElementById("toast-error");
function closeToast(){
  toast.style.transform = "translateX(400px)";
}
function closeToastError() {  
  toastError.style.display = "none";
}