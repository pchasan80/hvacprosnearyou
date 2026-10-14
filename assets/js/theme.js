/* ------------------------------------------------------- */
/* Global
/* ------------------------------------------------------- */

// jQuery
$(document).ready(function() {

  // Smooth Scrolling
  $('.emrg-btn').click(function(e) {
    var targetHref   = $(this).attr('href');
    $('html, body').animate({
      scrollTop: $(targetHref).offset().top + 50 // Add it to the calculation here
    }, 1000);
    e.preventDefault();
  });


  // Conditional Modal
  var w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
  if (w < 575) {
    $(".emrg-btn").removeAttr("data-target");
    $(".emrg-btn").removeAttr("data-toggle");
    $(".emrg-btn").attr("href", "#get-help");
  } else {
    $(".emrg-btn").attr("data-target");
    $(".emrg-btn").attr("data-toggle");
    $(".emrg-btn").attr("href", "#");
  }

})




// Pure JavaScript
// Sticky Call to Action
window.onscroll = function() {sticky_call();};
function sticky_call() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    $("#sticky-call").addClass("fixed");
    document.getElementById('sticky-footer-desktop').style.right = "5px";
  } else {
    $("#sticky-call").removeClass("fixed");
    document.getElementById('sticky-footer-desktop').style.right = "-480px";
  }
}





function callClose() {
  document.getElementById('call-req').style.display = "none";
}


// Phone Number should be start from +1
function modalPhoneFocus() {
  document.getElementById('modalPhone').placeholder = "";
  document.getElementById("ModalPhoneExt").style.color = "#333";
}
function modalPhoneBlur() {
  document.getElementById("ModalPhoneExt").style.color = "#fff";
  document.getElementById('modalPhone').placeholder = "+1323555666";
}
function callPhoneFocus() {
  document.getElementById('callPhone').placeholder = "";
  document.getElementById("callPhoneExt").style.color = "#333";
}
function callPhoneBlur() {
  document.getElementById("callPhoneExt").style.color = "#fff";
  document.getElementById('callPhone').placeholder = "+1323555666";
}
function isInputNumber(evt){
  var ch = String.fromCharCode(evt.which);
  if(!(/[0-9]/.test(ch))){
    evt.preventDefault();
  }
}

// Add the submit button listener only if the button exists on the page
const submitBtn = document.querySelector('.submit-btn');
if (submitBtn) {
    submitBtn.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Pass the current URL to the form
        document.querySelector('.current-url').value = window.location.href

        // User Agent
        function getDeviceDetails() {
            const userAgent = navigator.userAgent;
            let deviceType = "Computer"; // Default to computer

            if (/Android/i.test(userAgent)) {
                deviceType = "Android";
            } else if (/iPhone|iPad|iPod/i.test(userAgent)) {
                deviceType = "iOS";
            }

            return deviceType;
        }
        const deviceType = getDeviceDetails();
        document.querySelector('.user-agent').value = deviceType;

        // Display
        document.querySelector('.display').value = screen.width;

        submitForm(); // Trigger form submission from the separate submit button
    });
}

function submitForm() {
    let form = document.getElementById('contactForm');
    let formData = new FormData(form);
    let actionUrl = form.getAttribute('action'); // Retrieve the action attribute from the form
    let statusMessageDiv = document.getElementById('responseMsg');
    let submitButton = document.querySelector('.submit-btn'); // Adjust the selector if necessary

    submitButton.disabled = true;
    submitButton.innerHTML = '<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>';
    submitButton.classList.add('py-1');

    fetch(actionUrl, {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(text => {
        console.log(text); // Check what the actual full response text is
        return JSON.parse(text); // Then parse it manually
    })
    .then(data => {
        // Handle response here
        console.log(data);
        if (data.status === 'success') {
            submitButton.innerHTML = "Submit";
            submitButton.classList.remove('py-1');
            statusMessageDiv.innerHTML = '<div class="alert alert-success rounded-1" role="alert"><i class="bi bi-check-circle"></i> Your message has been sent successfully!</div>';

            // Reset the form
            form.reset();
            grecaptcha.reset(); // Reset the reCAPTCHA
        } else {
            submitButton.innerHTML = "Submit";
            submitButton.classList.remove('py-1');
            statusMessageDiv.innerHTML = `<div class="alert alert-danger rounded-1" role="alert"><i class="bi bi-exclamation-triangle"></i> Submission failed: ${data.message}</div>`;
        }
    })
    .catch(error => {
        console.log('Error:', error);
        submitButton.innerHTML = "Submit";
        submitButton.classList.remove('py-1');
        statusMessageDiv.innerHTML = `<div class="alert alert-danger rounded-1" role="alert"><i class="bi bi-exclamation-triangle"></i> Submission failed: ${error.message}</div>`;
    })
    .finally(() => {
        // Re-enable buttons
        submitButton.disabled = false;
    });
}