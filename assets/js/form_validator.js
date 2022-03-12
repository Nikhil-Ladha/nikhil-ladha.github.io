// Form Submit Confirmation/Error Message

const contact_form = document.getElementById("gform");
const response_msg = document.querySelector(".form-response");

// TODO: Show error on failure
const response_error = document.querySelector(".form-response .error-message");

contact_form.addEventListener("submit", submitForm);

function submitForm() {
  contact_form.style.display = "none";
  response_msg.style.display = "block";
}