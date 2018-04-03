function validateInput()
{
    var pat =  /^[A-Za-z]+,[ ]?[A-Za-z]+{2,}$/;
    var check = document.getElementById("state_name").value;

    if(check.length == 0){

    }

    if(!check.match(/^[A-Za-z]+,[ ]?[A-Za-z]+{2,}$/)){
        errorMessage("Invalid City or state!","error_message","red");
        return false;
}

}

function errorMessage(message,promptLocation, color){
    document.getElementById(promptLocation).innerHTML = message;
    document.getElementById(promptLocation).style.color = color;
}
