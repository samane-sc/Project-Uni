function changemycolor(elem,myid) {
    var items = document.getElementsByClassName('w3-padding');
    var box = document.getElementsByClassName('intendedrace');
    var length = items.length;
    var boxlength = box.length;
    for(var i=0;i<length;i++){
        items[i].classList.remove('w3-bar-block-active');
    }
    for(var i=0;i<boxlength;i++){
        box[i].style.display = "none";
    }
elem.classList.add('w3-bar-block-active');
    $("#"+myid).fadeIn();
}
