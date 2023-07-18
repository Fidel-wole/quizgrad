const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themetoggler = document.querySelector(".theme-toggle")
const date = document.querySelector("#date");
const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
const day = new Date();
let currentday = days[day.getDay()];
menuBtn.addEventListener('click', ()=>{
    sideMenu.style.display='block';
})
closeBtn.addEventListener('click', ()=>{
    sideMenu.style.display='none'
})

// themetoggler.addEventListener("click", ()=>{
//     document.body.classList.toggle("dark-theme");
//      themetoggler.querySelector("span:nth-child(1)").classList.toggle('active');
//      themetoggler.querySelector("span:nth-child(2)").classList.toggle('active');
//     })


// Retrieve the dark mode preference from client-side storage
const isDarkMode = localStorage.getItem("darkMode") === "true";

// Apply the stored dark mode preference when the page loads
applyDarkMode(isDarkMode);

// Add event listener to the theme toggler button
themetoggler.addEventListener("click", () => {
  // Toggle the dark mode preference
  const newMode = !isDarkMode;
  localStorage.setItem("darkMode", newMode);
  applyDarkMode(newMode);
});

// Apply the dark mode styles to the page
function applyDarkMode(isDarkMode) {
  // Toggle the dark-theme class on the body element
  document.body.classList.toggle("dark-theme", isDarkMode);

  // Toggle the active class on the theme toggler icons
  themetoggler.querySelector("span:nth-child(1)").classList.toggle("active", !isDarkMode);
  themetoggler.querySelector("span:nth-child(2)").classList.toggle("active", isDarkMode);
 
}
document.body.offsetHeight;
date.value="Happy " +  currentday;