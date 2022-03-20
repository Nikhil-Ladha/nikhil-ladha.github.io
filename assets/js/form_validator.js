// Form Submit Confirmation/Error Message

const contactForm = document.getElementById("gform");
const responseMsg = document.querySelector(".form-response");

// TODO: Show error on failure
const responseError = document.querySelector(".form-response .error-message");

contactForm.addEventListener("submit", submitForm);

function submitForm() {
  contactForm.style.display = "none";
  responseMsg.style.display = "block";
}