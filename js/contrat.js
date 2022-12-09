function run() {

    // var info = document.getElementsByClassName("form-select formselect classe");
    // var infos =[] 
    // info.forEach(element => {
    //     infos.append(element.value)
    // });
        var info = document.getElementById("2").value;
        var xhr1=new XMLHttpRequest();
        var valeur="contrat_post.php?val="+info;
            xhr1.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        // resultats
                        var  reponse=JSON.parse(this.responseText);
                        var ueFormSelect=document.querySelector(".ueFormSelect");
                        var valeurFinal;
                        reponse.forEach(element => {
                            var contenant=document.createElement('option');
                            contenant.innerHTML=element.nom;
                            contenant.setAttribute('value',element.id)
                            valeurFinal=valeurFinal+contenant.outerHTML;
                        });
                        
                        ueFormSelect.innerHTML=valeurFinal; 
                        run2();
                        }
            }
        xhr1.open("GET",valeur, true);
        xhr1.send();

    }

function run2() {
    
     // je selectionne la partie du selecte pour la matiere   
     var ueFormSelect=document.querySelector(".ueFormSelect");
     var ecueFormSelect=document.querySelector(".ecueFormSelect");
         var info=ueFormSelect.value;
         var xhr2=new XMLHttpRequest();
         var valeur="contrat_post.php?val2="+info;
         xhr2.onreadystatechange = function(){

                 if(this.readyState == 4 && this.status == 200){
                     // resultats
                    
                     var  reponse=JSON.parse(this.responseText);
                     var valeurFinal; 
                     reponse.forEach(element => {
                       var contenant=document.createElement('option');
                          contenant.innerHTML=element.nom;
                          contenant.setAttribute('value',element.id)
                          valeurFinal=valeurFinal+contenant.outerHTML;

                     });

                     ecueFormSelect.innerHTML=valeurFinal; 
                 }
         }
     xhr2.open("GET",valeur, true);
     xhr2.send();

}
   