const btnAddCourse = document.querySelector('.add-course-js')
const CtnAddCourse = document.querySelector('.container-add-course')
const closeButtonAddCourse =  document.querySelector('.closeButton-ctn-add-course-js')
var blackScreen = document.querySelector('.black-screen')

btnAddCourse.addEventListener('click', () => {
    CtnAddCourse.style.display = 'block'
    blackScreen.style.display = 'block'
    })  

closeButtonAddCourse.addEventListener('click', () => {
    setTimeout(() => {
        CtnAddCourse.style.display = 'none'
        CtnAddCourse.style.animation = 'show .4s ease-in-out'
        
    }, 300)
    CtnAddCourse.style.animation = 'hide .4s ease-in-out'
    blackScreen.style.display = 'none'
})


blackScreen.addEventListener('click', () => {
    setTimeout(() => {
        CtnAddCourse.style.display = 'none'
        CtnAddCourse.style.animation = 'show .4s ease-in-out'
        
    }, 300)
    CtnAddCourse.style.animation = 'hide .4s ease-in-out'
    blackScreen.style.display = 'none'
})