function myModal(e) {
    let myDataset = e.dataset.target;
    console.log(myDataset)

    let myTarget = document.getElementById(myDataset);
    console.log(myTarget)
    myTarget.style.display = 'block';


    let closeBtn = myTarget.querySelector('.close')
    closeBtn.onclick = (e) => {
        myTarget.style.display = 'none';
    }
}


/*
myBtn.onclick = (e) => {
    console.log('test')

    let myDataset = e.target.dataset.target;
    let myTarget = document.getElementById(myDataset);
    

    myTarget.style.display = 'block';
}
*/