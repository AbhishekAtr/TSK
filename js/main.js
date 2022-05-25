window.addEventListener("scroll", function () {
  var header = document.querySelector("header");
  header.classList.toggle("sticky", window.scrollY > 0);
})


/* Set the width of the side navigation to 250px */
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

function submitForm(formId) {

  try {

    if (!$("#" + formId).valid()) {
      return false
    }
    $("button").attr('disabled', true)
    var postData = $('#' + formId).serialize()
    debugger
    $.ajax({
      type: 'POST',
      url: "mail.php",
      data: postData,
      success: function (data) {
        $("button").attr('disabled', false)
        if (data == 1) {
          $(".loader").modal("show");
          $("#" + formId)[0].reset();
          var x = document.getElementById("snackbar");
          x.className = "show";
          setTimeout(function () {
            x.className = x.className.replace("show", "");
          }, 3000);
          setTimeout(function () {
            $(".loader").modal("hide");
            $("#myModal").modal("hide");
          }, 3000);

        } else {
          alert(data)
        }
      },
      error: function (error) {
        $("button").attr('disabled', false)
        alert("Something went wrong, please try again later")
      }
    });
  } catch (error) {
    console.log(error.message);

    $("button").attr('disabled', false)
    alert("Something went wrong, please try again later")
  }
}
$(document).ready(function () {
  $(".main_section").click(function () {
    $(".navbar-collapse").removeClass("show");
  });
});

$(document).ready(function() {
	$(".gallery").magnificPopup({
		delegate: "a",
		type: "image",
		tLoading: "Loading image #%curr%...",
		mainClass: "mfp-img-mobile",
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.'
		}
	});
});

