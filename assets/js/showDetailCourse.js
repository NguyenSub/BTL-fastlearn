const detailCourse = document.querySelector('.detail-course')
const allCard = document.querySelectorAll('.card-course-js')
const closeButton =  document.querySelector('.closeButton-detailCourse-js')
var blackScreen = document.querySelector('.black-screen')
allCard.forEach( (card) => {
    card.addEventListener('click', () => {
        detailCourse.style.display = 'block'
        blackScreen.style.display = 'block'
    })  
})

closeButton.addEventListener('click', () => {
    setTimeout(() => {
        detailCourse.style.display = 'none'
        detailCourse.style.animation = 'show .4s ease-in-out'
        
    }, 300)
    detailCourse.style.animation = 'hide .4s ease-in-out'
    blackScreen.style.display = 'none'
})


blackScreen.addEventListener('click', () => {
    setTimeout(() => {
        detailCourse.style.display = 'none'
        detailCourse.style.animation = 'show .4s ease-in-out'
        
    }, 300)
    detailCourse.style.animation = 'hide .4s ease-in-out'
    blackScreen.style.display = 'none'
})