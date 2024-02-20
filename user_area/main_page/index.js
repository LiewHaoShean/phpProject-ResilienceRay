const content = document.querySelectorAll('.content');

const dot = document.querySelectorAll('.dot');

let counter = 1;
slidefun(counter);

let timer = setInterval(autoSlide, 8000);
function autoSlide(){
    counter += 1;
    slidefun(counter);
}

function plusSlides(n){
    counter += n;
    slidefun(counter);
    resetTimer();
}

function selectedSlide(n){
    counter = n;
    slidefun(counter);
    resetTimer();
}

function resetTimer(){
    clearInterval(timer);
    timer = setInterval(autoSlide, 8000);
}

function slidefun(n){

    let i;
    for(i = 0; i < content.length; i++){
        content[i].style.display = "none";
    }

    for(i = 0; i <dot.length; i++){
        dot[i].classList.remove('active');
    }

    if(n > content.length){
        counter = 1;
    }

    if(n < 1){
        counter = content.length;
    }

    content[counter - 1].style.display = "block";
    dot[counter - 1].classList.add('active');
}

