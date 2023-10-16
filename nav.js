var menu=document.querySelector(".menu")
var options=document.querySelectorAll(".a")
console.log(options)
menu.addEventListener("click",()=>{
options.forEach(element => {
   element.classList.toggle("active")
});

})