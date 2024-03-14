function validateForm() {
    
    var name = document.getElementById("user-name").value;
    var email = document.getElementById("user-email").value;
    var address = document.getElementById("user-address").value;

    if (!name.trim().length) {
        alert("Empty username..!!");
    }
    
    if (!email.trim().length) {
        alert("Empty email..!!");
    }
}
