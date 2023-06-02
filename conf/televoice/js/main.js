const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggle");
const newUserButton = document.querySelector(".new-user");
const trAddUser = document.querySelector(".tr-add-user");
const CancelAddUserButton = document.querySelector(".cancel-add");
const checkEditButton = document.querySelector(".check-edit");
const checkEditModal = document.querySelector(".check-edit-modal");
const CloseCheckEditButton = document.querySelector(".close-check-edit-modal");

const editButtons = new Array();


menuBtn.addEventListener('click', () => {
    sideMenu.style.display = 'block';
})

closeBtn.addEventListener('click', () => {
    sideMenu.style.display = 'none';
})

themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables');
    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
    
})
//conseguir numero de lineas por php

for (let index = 1; index <= numRows; index++) {
    editButtons.fill(index);
    let editButton = document.querySelector(".edit-" + index);
    let CancelButton = document.querySelector(".cancel-" + index);

    
    let nombreButton = document.querySelector(".nombre-" + index);
    let extenButton = document.querySelector(".exten-" + index);
    let secretButton = document.querySelector(".secret-" + index);
    let buttons = document.querySelector(".botones-edit-delete-" + index);
    
    let nombreInputButton = document.querySelector(".nombre-input-" + index);
    let extenInputButton = document.querySelector(".exten-input-" + index);
    let secretInputButton = document.querySelector(".secret-input-" + index);
    let buttons2 = document.querySelector(".botones-check-cancel-" + index);
    
    const ModalQr = document.querySelector(".qr-modal-" + index);
    const buttonShowModalQr = document.querySelector(".qr-" + index);
    const buttonCloseModalQr = document.querySelector(".close-qr-modal-" + index);
    
    buttonShowModalQr.addEventListener("click", () => {
        ModalQr.classList.remove("dnone");
    })
    buttonCloseModalQr.addEventListener("click", () => {
        ModalQr.classList.add("dnone");
    })
    
    //let buttons = document.querySelector(".botones-edit-delete-" + index);

    //let checkButton = document.querySelector(".check-" + index);
    editButton.addEventListener("click", () => {

        nombreButton.classList.add("dnone");
        extenButton.classList.add("dnone");
        secretButton.classList.add("dnone");
        buttons.classList.add("dnone");

        nombreInputButton.classList.remove("dnone");
        extenInputButton.classList.remove("dnone");
        secretInputButton.classList.remove("dnone");
        buttons2.classList.remove("dnone");
    })


    CancelButton.addEventListener("click", () => {

        nombreButton.classList.remove("dnone");
        extenButton.classList.remove("dnone");
        secretButton.classList.remove("dnone");
        buttons.classList.remove("dnone");

        nombreInputButton.classList.add("dnone");
        extenInputButton.classList.add("dnone");
        secretInputButton.classList.add("dnone");
        buttons2.classList.add("dnone");


    })



}

newUserButton.addEventListener("click", () => {
    trAddUser.classList.remove("dnone");
})

CancelAddUserButton.addEventListener("click", () => {
    trAddUser.classList.add("dnone");
})

