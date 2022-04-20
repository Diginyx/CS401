$(document).ready(
    function main (event) {
      $(".close").click(function (e) {
         $(this).parent().fadeOut("slow", function() {
             //Animation complete.
         })
      });
    }
  );