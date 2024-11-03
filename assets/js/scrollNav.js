let lastScrollTop = 0;
const nav = document.querySelector('nav');
const navHeight = nav.offsetHeight; // Lấy chiều cao của nav

window.addEventListener('scroll', function() {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
        // Cuộn xuống - Ẩn navbar bằng cách đẩy xuống ngoài màn hình
        nav.style.bottom = `-${navHeight}px`;
    } else {
        // Cuộn lên - Hiện navbar
        nav.style.bottom = '0';
    }
    lastScrollTop = scrollTop;
});