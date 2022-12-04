<script src="html2pdf.bundle.js"></script>
    var telecharger=document.querySelector(".telecharger");
    var elToDownload=document.querySelector(".container");
    telecharger.onclick=()=>{
        
html2pdf().from(elToDownload).save();
    }