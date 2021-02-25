function mo() {
    var myrequest = new XMLHttpRequest();
    
    myrequest.onreadystatechange = function () {
   
        if (this.readyState == 4 && this.status == 200) {
//            document.getElementById('ajax').innerHTML = myrequest.responseText;
            if(myrequest.responseText == '1')
                {
                    document.getElementById('ajax').className = 'fa fa-times error';  
                    document.getElementById('ajax').style = "color : red";
                }
            else if(myrequest.responseText == '2')
                {
                    document.getElementById('ajax').className = 'fa fa-check success';  
                    document.getElementById('ajax').style = "color : green";
                }
        }
    };
    myrequest.open("GET", 'http://www.mvcapp.com/emp/check', true);
    myrequest.send();
}