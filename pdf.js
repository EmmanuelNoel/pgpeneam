var telecharger = document.querySelector(".telecharger");
var elToDownload = document.querySelector(".container");

telecharger.onclick = () => {
    opt = {
        margin: [0.6, 0.6, 0.7, 0.7],
        filename: 'contrat.pdf',
        image: { type: 'jpeg', quality: 1 },
        htlm2canvas: { scale: 1 },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' },
    }

    html2pdf().from(elToDownload).set(opt).save();
}