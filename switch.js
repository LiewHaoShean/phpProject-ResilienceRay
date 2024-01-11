
const container = document.getElementById('container');
const registerBtn = document.getElementById('user');
const loginBtn = document.getElementById('organization');

registerBtn.addEventListener('click', ()=> {
    container.classList.add("active");
});

loginBtn.addEventListener('click', ()=>{
    container.classList.remove("active");
})