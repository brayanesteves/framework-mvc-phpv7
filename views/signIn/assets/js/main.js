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