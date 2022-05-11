function verif() 
{
    let o = document.forms["myForm"]["login"].value;
    let s = document.forms["myForm"]["pas"].value;

    let x = document.forms["myForm"]["nom"].value;
    let p = document.forms["myForm"]["prenom"].value;

    let m = document.forms["myForm"]["email"].value;

    let t = document.forms["myForm"]["tel"].value;
    let pass = document.forms["myForm"]["pass"].value;
  

    

    
  
  if(o =="" && s ==""){

    if (x == "") {
      alert("Name must be filled out");
      document.getElementById("erreur").innerHTML = "Saisir un nom slvp" ;
      return false;
    }
    
  

    else if (p == "") {
      alert("Prenom must be filled out");
      document.getElementById("erreurp").innerHTML = "Saisir un prenom slvp" ;
      return false;
    }

    else if (m == "") {
        alert("mail must be filled out");
        document.getElementById("erreure").innerHTML = "Saisir un mail slvp" ;
        return false;
      }

      else if (t == "") {
        alert("telephone must be filled out");
        document.getElementById("erreurt").innerHTML = "Saisir un numero slvp" ;
        return false;
      }

      else if (pass == "") {
        alert("password must be filled out");
        document.getElementById("erreurpa").innerHTML = "Saisir un prpasswordenom slvp" ;
        return false;
      }

    }
     

        }
        