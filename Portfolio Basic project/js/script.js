/*******************************
 * Circular Progress Bars
 *******************************/

// ===== HTML/CSS Progress Bar =====
let htmlProgress = document.querySelector(".html-css"), // Circular progress element
  htmlValue = document.querySelector(".html-progress"); // Percentage text inside circle

let htmlStartValue = 0, // Start percentage
  htmlEndValue = 90,    // Target percentage
  htmlspeed = 30;       // Speed in milliseconds for each increment

// Interval to gradually increase progress
let progresshtml = setInterval(() => {
  htmlStartValue++; // Increase progress by 1%

  // Update percentage text
  htmlValue.textContent = `${htmlStartValue}%`;

  // Update circular progress background using conic-gradient
  htmlProgress.style.background = `conic-gradient(#fca61f ${
    htmlStartValue * 3.6 // Multiply by 3.6 to convert percentage to degrees
  }deg, #ededed 0deg)`;

  // Stop when target is reached
  if (htmlStartValue == htmlEndValue) {
    clearInterval(progresshtml);
  }
}, htmlspeed);


// ===== JavaScript Progress Bar =====
let javascriptProgress = document.querySelector(".javascript"),
  javascriptValue = document.querySelector(".javascript-progress");

let javascriptStartValue = 0,
  javascriptEndValue = 75,
  jsspeed = 30;

let progressjs = setInterval(() => {
  javascriptStartValue++;

  javascriptValue.textContent = `${javascriptStartValue}%`;
  javascriptProgress.style.background = `conic-gradient(#7d2ae8 ${
    javascriptStartValue * 3.6
  }deg, #ededed 0deg)`;

  if (javascriptStartValue == javascriptEndValue) {
    clearInterval(progressjs);
  }
}, jsspeed);


// ===== PHP Progress Bar =====
let phpProgress = document.querySelector(".php"),
  phpValue = document.querySelector(".php-progress");

let phpStartValue = 0,
  phpEndValue = 80,
  phpspeed = 30;

let progressphp = setInterval(() => {
  phpStartValue++;

  phpValue.textContent = `${phpStartValue}%`;
  phpProgress.style.background = `conic-gradient(#20c997 ${
    phpStartValue * 3.6
  }deg, #ededed 0deg)`;

  if (phpStartValue == phpEndValue) {
    clearInterval(progressphp);
  }
}, phpspeed);


// ===== ReactJS Progress Bar =====
let reactProgress = document.querySelector(".reactjs"),
  reactValue = document.querySelector(".reactjs-progress");

let reactStartValue = 0,
  reactEndValue = 30,
  rjsspeed = 30;

let progressreact = setInterval(() => {
  reactStartValue++;

  reactValue.textContent = `${reactStartValue}%`;
  reactProgress.style.background = `conic-gradient(#3f396d ${
    reactStartValue * 3.6
  }deg, #ededed 0deg)`;

  if (reactStartValue == reactEndValue) {
    clearInterval(progressreact);
  }
}, rjsspeed);


/*******************************
 * Portfolio Filter using jQuery
 *******************************/
$(document).ready(function () {
  $(".filter-item").click(function () {
    const value = $(this).attr("data-filter"); // Get filter category (e.g. 'all', 'web', 'design')

    if (value == "all") {
      $(".post").show("1000"); // Show all posts
    } else {
      $(".post")
        .not("." + value) // Hide posts not matching filter
        .hide("1000");
      $(".post")
        .filter("." + value) // Show only matching posts
        .show("1000");
    }
  });
});


/*******************************
 * Sticky Navbar on Scroll
 *******************************/
document.addEventListener("DOMContentLoaded", function(){
  window.addEventListener('scroll', function() {
      if (window.scrollY > 50) { // If scrolled more than 50px
        document.getElementById('navbar-top').classList.add('fixed-top'); // Add sticky class

        // Add padding-top to prevent content from jumping up
        let navbar_height = document.querySelector('.navbar').offsetHeight;
        document.body.style.paddingTop = navbar_height + 'px';
      } else {
        // Remove sticky navbar
        document.getElementById('navbar-top').classList.remove('fixed-top');

        // Remove extra padding
        document.body.style.paddingTop = '0';
      } 
  });
}); 


/*******************************
 * Back to Top Button
 *******************************/

// Get the back-to-top button element
let mybutton = document.getElementById("btn-back-to-top");

// Show button when user scrolls down 20px from top
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 || // For Safari
    document.documentElement.scrollTop > 20 // For Chrome/Firefox/Edge
  ) {
    mybutton.style.display = "block"; // Show button
  } else {
    mybutton.style.display = "none"; // Hide button
  }
}

// Scroll to top when button is clicked
mybutton.addEventListener("click",function(){
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome/Firefox/Edge
});
