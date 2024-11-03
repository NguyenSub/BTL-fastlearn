const btnAddNoti = document.querySelector('.add-noti-js')
const CtnAddNoti = document.querySelector('.container-add-noti')
// const closeButtonAddUser =  document.querySelector('.closeButton-ctn-add-course-js')
var blackScreen = document.querySelector('.black-screen')

btnAddNoti.addEventListener('click', () => {
    CtnAddNoti.style.display = 'block'
    blackScreen.style.display = 'block'
    })  

// closeButtonAddUser.addEventListener('click', () => {
//     setTimeout(() => {
//         CtnAddNoti.style.display = 'none'
//         CtnAddNoti.style.animation = 'show .4s ease-in-out'
        
//     }, 300)
//     CtnAddNoti.style.animation = 'hide .4s ease-in-out'
//     blackScreen.style.display = 'none'
// })


blackScreen.addEventListener('click', () => {
    setTimeout(() => {
        CtnAddNoti.style.display = 'none'
        CtnAddNoti.style.animation = 'show .4s ease-in-out'
        
    }, 300)
    CtnAddNoti.style.animation = 'hide .4s ease-in-out'
    blackScreen.style.display = 'none'
})