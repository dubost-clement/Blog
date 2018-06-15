const buttons = document.querySelectorAll(".btn-danger");
buttons.forEach(function(button){
    button.addEventListener("click", function(e){

        if(!confirm("voulez vous vraiment supprimer ce reportage ?")){
            e.preventDefault();
        } 
    
    });
});


