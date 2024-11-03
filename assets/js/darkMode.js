// Lấy màu từ CSS
const darkColor1 = getComputedStyle(document.documentElement).getPropertyValue('--cl-dark-1');
const darkColor2 = getComputedStyle(document.documentElement).getPropertyValue('--cl-dark-2');
const lightColor1 = getComputedStyle(document.documentElement).getPropertyValue('--cl-light-1');
const lightColor2 = getComputedStyle(document.documentElement).getPropertyValue('--cl-light-2');
const darkBoxShadow1 = getComputedStyle(document.documentElement).getPropertyValue('--cl-dark-box-shadow');
const darkBoxShadow2 = getComputedStyle(document.documentElement).getPropertyValue('--cl-dark-box-shadow-2');

// Kiểm tra trạng thái darkMode từ localStorage khi tải trang
const isDarkMode = JSON.parse(localStorage.getItem('darkMode'));
if (isDarkMode) {
    // Nếu chế độ tối được bật, áp dụng các giá trị màu sắc
    document.documentElement.style.setProperty('--cl-light-1', 'rgb(49 49 49)');
    document.documentElement.style.setProperty('--cl-light-bg', '#222');
    document.documentElement.style.setProperty('--cl-light-2', 'rgb(49 49 49)');
    document.documentElement.style.setProperty('--cl-light-3', '#454545');
    document.documentElement.style.setProperty('--cl-light-4', 'rgb(80 80 80)');
    document.documentElement.style.setProperty('--cl-light-box-shadow', 'rgb(90 90 90 / 50%)');
    document.documentElement.style.setProperty('--cl-dark-1', lightColor1);
    document.documentElement.style.setProperty('--cl-dark-2', lightColor2);
} else {
    // Nếu không có chế độ tối, có thể thiết lập màu sắc mặc định
    document.documentElement.style.setProperty('--cl-light-1', lightColor1);
    document.documentElement.style.setProperty('--cl-dark-2', darkColor2);
}
