function setCreateBtnShow(){
    document.getElementById("creatVisitor").disabled = false;
}

function setCreateBtnHide(){
    document.getElementById("creatVisitor").disabled = true;
}

function sidePanOpen(){
    document.getElementById('userSidePan').style.display = 'block'
    document.getElementById('myOverlay').style.display = 'block'
}

function sidePanClose(){
    document.getElementById('userSidePan').style.display = 'none'
    document.getElementById('myOverlay').style.display = 'none'
}