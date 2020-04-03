function setCreateBtnShow(){
    document.getElementById("creatVisitor").disabled = false;
}

function setCreateBtnHide(){
    document.getElementById("creatVisitor").disabled = true;
}

function checkActBarButtons(){
    userRole = document.getElementById('currUserRole').innerText;
    if(userRole == 'ADMIN'){
        document.getElementById('Visitor').style.display = '';
        document.getElementById('CreateVisitor').style.display = '';
        document.getElementById('Users').style.display = '';
        document.getElementById('Home').style.display = '';
    }else if(userRole == 'RECEPTION'){
        document.getElementById('Visitor').style.display = '';
        document.getElementById('CreateVisitor').style.display = '';
        document.getElementById('Users').style.display = 'none';
        document.getElementById('Home').style.display = '';        
    }else if(userRole == 'SECURITY'){
        document.getElementById('Visitor').style.display = '';
        document.getElementById('CreateVisitor').style.display = 'none';
        document.getElementById('Users').style.display = 'none';
        document.getElementById('Home').style.display = '';
    }else{
        document.getElementById('Visitor').style.display = 'none';
        document.getElementById('CreateVisitor').style.display = 'none';
        document.getElementById('Users').style.display = 'none';
        document.getElementById('Home').style.display = 'none';
    }
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
    document.getElementById('visitorIdDel').value = document.getElementById('visitorId').value;
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

function filterVisTable(){
    //Search Input
    let searchInputVisitor = document.getElementById('searchVisitor').value.toUpperCase();
    //Search table
    let table = document.getElementById('visitorList');
    //Get Rows
    let row = table.querySelectorAll("tr[data-vis]");

    for(let i=0; i<row.length; i++){

        let col= row[i].getElementsByTagName('td');

        if( searchInputVisitor == 'ARRIVED' || searchInputVisitor == 'NOT ARRIVED' ||
            searchInputVisitor == 'APPROVED' || searchInputVisitor == 'NOT APPROVED'){
            switch(searchInputVisitor){
                case 'ARRIVED':
                    if(col[5].innerHTML.toUpperCase() == 1){
                        row[i].style.display = '';
                    }else{
                        row[i].style.display = 'none';
                    }                       
                    break;
                case 'NOT ARRIVED':
                    if(col[5].innerHTML.toUpperCase() == 0){
                        row[i].style.display = '';
                    }else{
                        row[i].style.display = 'none';
                    }                    
                    break;
                case 'APPROVED':
                    if(col[6].innerHTML.toUpperCase() == 1){
                        row[i].style.display = '';
                    }else{
                        row[i].style.display = 'none';
                    }                    
                    break;
                case 'NOT APPROVED':
                    if(col[6].innerHTML.toUpperCase() == 0){
                        row[i].style.display = '';
                    }else{
                        row[i].style.display = 'none';
                    }                    
                    break;
            }         
        }else{
            if( col[1].innerHTML.toUpperCase().indexOf(searchInputVisitor) > -1 ||
                col[2].innerHTML.toUpperCase().indexOf(searchInputVisitor) > -1 ||
                col[3].innerHTML.toUpperCase().indexOf(searchInputVisitor) > -1 ||
                col[4].innerHTML.toUpperCase().indexOf(searchInputVisitor) > -1){
                row[i].style.display = '';
            }else{
                row[i].style.display = 'none';
            }
        }
    }
}

function filterUseTable(){
    //Search Input
    let searchInputVisitor = document.getElementById('searchUser').value.toUpperCase();
    //Search table
    let table = document.getElementById('userList');
    //Get Rows
    let row = table.querySelectorAll("tr[data-name]");

    for(let i=0; i<row.length; i++){

        let col= row[i].getElementsByTagName('td');

        if( searchInputVisitor == 'APPROVED' || searchInputVisitor == 'NOT APPROVED'){
            switch(searchInputVisitor){
                case 'APPROVED':
                    if(col[3].innerHTML.toUpperCase() == 1){
                        row[i].style.display = '';
                    }else{
                        row[i].style.display = 'none';
                    }                    
                    break;
                case 'NOT APPROVED':
                    if(col[3].innerHTML.toUpperCase() == 0){
                        row[i].style.display = '';
                    }else{
                        row[i].style.display = 'none';
                    }                    
                    break;
            }         
        }else{
            if( col[0].innerHTML.toUpperCase().indexOf(searchInputVisitor) > -1 ||
                col[1].innerHTML.toUpperCase().indexOf(searchInputVisitor) > -1 ||
                col[2].innerHTML.toUpperCase().indexOf(searchInputVisitor) > -1) {
                row[i].style.display = '';
            }else{
                row[i].style.display = 'none';
            }
        }
    }    
}