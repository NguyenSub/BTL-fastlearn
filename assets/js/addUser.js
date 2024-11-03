const btnAddUser = document.querySelector('.add-user-js')
const CtnAddUser = document.querySelector('.container-add-user')
const closeButtonAddUser =  document.querySelector('.closeButton-ctn-add-course-js')
var blackScreen = document.querySelector('.black-screen')

btnAddUser.addEventListener('click', () => {
    CtnAddUser.style.display = 'block'
    blackScreen.style.display = 'block'
    })  

// closeButtonAddUser.addEventListener('click', () => {
//     setTimeout(() => {
//         CtnAddUser.style.display = 'none'
//         CtnAddUser.style.animation = 'show .4s ease-in-out'
        
//     }, 300)
//     CtnAddUser.style.animation = 'hide .4s ease-in-out'
//     blackScreen.style.display = 'none'
// })


blackScreen.addEventListener('click', () => {
    setTimeout(() => {
        CtnAddUser.style.display = 'none'
        CtnAddUser.style.animation = 'show .4s ease-in-out'
        
    }, 300)
    CtnAddUser.style.animation = 'hide .4s ease-in-out'
    blackScreen.style.display = 'none'
})