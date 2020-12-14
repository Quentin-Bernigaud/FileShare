function onResize() {
  var hero = document.getElementById("hero");
  if (document.documentElement.clientWidth < 768) {
    hero.setAttribute("src", "assets/images/hero-mobile.svg")
  } else {
    hero.setAttribute("src", "assets/images/hero.svg")
  }
  console.log("hero = " + hero.getAttribute("src"))
}

window.addEventListener("resize", onResize)
window.addEventListener("DOMContentLoaded", (event) => {

  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()

  onResize()
});