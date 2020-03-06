function form_done(){
    sessionStorage.form_done = 1;
}

function thanks(){
    if (sessionStorage.form_done == 1) {
        var paragraph = document.createElement("article");
        var text = document.createTextNode("Dziękuję za wypełnienie ankiety.");
        paragraph.appendChild(text);
        document.body.appendChild(paragraph);
    }
}

document.getElementById('change_background_button').addEventListener('click', function (){
    let lighterBackgroundEnabled = document.body.classList.toggle('lighter-background');
    localStorage.setItem('lighter-background-enabled', lighterBackgroundEnabled);
});
if(JSON.parse(localStorage.getItem('lighter-background-enabled'))){
    document.body.classList.add('lighter-background');
}