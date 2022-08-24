let res = document.getElementById("resultaat");
$.ajax({
    type:    "GET",
    url:     "https://datausa.io/api/data?drilldowns=Nation&measures=Population",
    dataType: "JSON",
    success: function (lijstje) {
        /* TEST: */ console.log(lijstje);
        res.innerHtml = "info :<br/>";
        for (let i=0; i<lijstje['data'].length; i++)
        {
            let tekst = "info: " + lijstje['data'][i]['ID Nation'] + "<br/>";
            tekst += "Land: " + lijstje['data'][i].Nation + "<br/>";
            tekst += "Jaar: " + lijstje['data'][i]['Year'] + "<br/>";
            tekst += "ID jaar: " + lijstje['data'][i]['ID Year'] + "<br/>";
            tekst += "Slug nation: " + lijstje['data'][i]['Slug Nation'] + "<br/>";
            tekst += "<hr>";
        
            res.innerHTML += tekst;
        }
    },
    error: function (request, error) {
        console.log ("FOUT:" + error);
    }
});
