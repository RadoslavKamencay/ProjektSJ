// Alert Button
document.getElementById("myButton").addEventListener("click", function() {
  alert("Toto je alert!");
});

// Dark Mode
const darkModeToggle = document.getElementById('dark-mode-toggle');
const body = document.body;

darkModeToggle.addEventListener('click', () => {
    console.log('dark mode toggle clicked');
    body.classList.toggle('dark-mode');
});

