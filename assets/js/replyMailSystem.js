const allBtnCardMail = document.querySelectorAll('.card.user')
const CtnReply = document.querySelector('.container-reply')
// const closeButtonAddUser =  document.querySelector('.closeButton-ctn-add-course-js')
var blackScreen = document.querySelector('.black-screen')

allBtnCardMail.forEach((card) => {
    card.addEventListener('click', () => {
        CtnReply.style.display = 'flex'
        blackScreen.style.display = 'block'
        })  
})
// closeButtonAddUser.addEventListener('click', () => {
//     setTimeout(() => {
//         CtnReply.style.display = 'none'
//         CtnReply.style.animation = 'show .4s ease-in-out'
        
//     }, 300)
//     CtnReply.style.animation = 'hide .4s ease-in-out'
//     blackScreen.style.display = 'none'
// })


blackScreen.addEventListener('click', () => {
    setTimeout(() => {
        CtnReply.style.display = 'none'
        CtnReply.style.animation = 'show .4s ease-in-out'
        
    }, 300)
    CtnReply.style.animation = 'hide .4s ease-in-out'
    blackScreen.style.display = 'none'
})