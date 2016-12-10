var modalView = (idActiveModal:string, idModal:string, idCloseModal:string)=>{
    let active      = document.querySelectorAll(idActiveModal),
        modal       = document.getElementById(idModal),
        close       = document.getElementById(idCloseModal);

    for(let ac of active){
        ac.addEventListener('click',function(e){
            e.preventDefault();
            modal.style.top = '0';
        });
    }
    close.addEventListener('click',function(){
        modal.style.top = '-150%';
    });
}


modalView('#ampaddPost','vmpaddPost','cmpaddPost')
