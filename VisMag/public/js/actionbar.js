function setCreateBtnShow(){
    document.getElementById("creatVisitor").disabled = false;
}

function setCreateBtnHide(){
    document.getElementById("creatVisitor").disabled = true;
}

function sidePanOpen(innerHtml){
    var param = innerHtml.split('<td>');    
    document.getElementById('userName').value = (param[1].split('</td>'))[0];    
    document.getElementById('userEmail').value = (param[2].split('</td>'))[0];
    document.getElementById('userRole').value = (param[3].split('</td>'))[0];  

    document.getElementById('userSidePan').style.display = 'block'
    document.getElementById('myOverlay').style.display = 'block'

    checkbox = document.getElementById('userApproved');

    if( checkbox){
        if((param[4].split('</td>'))[0] == 1){
            checkbox.checked = true;
        }else{
            checkbox.checked = false;
        }
    }
}

function sidePanClose(){
    document.getElementById('userSidePan').style.display = 'none'
    document.getElementById('visitorSidePan').style.display = 'none'    
    document.getElementById('myOverlay').style.display = 'none'
}

function sidePanOpenVisitor(innerHtml){
    var param = innerHtml.split('<td>');

    document.getElementById('visitorId').value = ((param[0].split('</td>'))[0]).split('<td hidden="hidden">')[1];
    document.getElementById('visitorName').value = (param[1].split('</td>'))[0];    
    document.getElementById('visitorNic').value = (param[2].split('</td>'))[0];
    document.getElementById('visitorVehicle').value = (param[3].split('</td>'))[0];  
    document.getElementById('visitorDate').value = (param[4].split('</td>'))[0]; 

    document.getElementById('visitorSidePan').style.display = 'block';
    document.getElementById('myOverlay').style.display = 'block';

    checkbox = document.getElementById('visitorArrived');

    if( checkbox){
        if((param[5].split('</td>'))[0] == 1){
            checkbox.checked = true;
        }else{
            checkbox.checked = false;
        }
    }
}