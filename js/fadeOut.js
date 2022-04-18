$(document).ready(
    function main (event) {
      $(".close").click(function () {
         $(".wrapper").fadeOut("slow", function() {
             //Animation complete.
         })
      });
    }
  );