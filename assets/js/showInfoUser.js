const allBtnCardUser = document.querySelectorAll('.container-user .card.user')
const CtnInfoUser = document.querySelector('.container-info-user')
// const closeButtonAddUser =  document.querySelector('.closeButton-ctn-add-course-js')
var blackScreen = document.querySelector('.black-screen')

allBtnCardUser.forEach((card) => {
    card.addEventListener('click', () => {
        CtnInfoUser.style.display = 'block'
        blackScreen.style.display = 'block'
        })  
})
// closeButtonAddUser.addEventListener('click', () => {
//     setTimeout(() => {
//         CtnInfoUser.style.display = 'none'
//         CtnInfoUser.style.animation = 'show .4s ease-in-out'
        
//     }, 300)
//     CtnInfoUser.style.animation = 'hide .4s ease-in-out'
//     blackScreen.style.display = 'none'
// })


blackScreen.addEventListener('click', () => {
    setTimeout(() => {
        CtnInfoUser.style.display = 'none'
        CtnInfoUser.style.animation = 'show .4s ease-in-out'
        
    }, 300)
    CtnInfoUser.style.animation = 'hide .4s ease-in-out'
    blackScreen.style.display = 'none'
})