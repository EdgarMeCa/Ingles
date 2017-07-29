//Functions that hides and displays elements by Id
function esconde_div(hideScreen){
    var elemento = document.getElementById(hideScreen);
    elemento.style.display = 'none';
}
function visible_div(showScreen){
    var elemento = document.getElementById(showScreen);
    elemento.style.display = 'block';
}

//Function that hides and displays the screens based on the task to perform on the page
function logicScreens(openScreen){
    switch(openScreen) {
        case 'studentPay': 
            visible_div("studentPay");
            esconde_div("teacherPay");
            break;
        case 'teacherPay':
            visible_div("teacherPay");
            esconde_div("studentPay");
            break;
        default: 
            
    }
    
}